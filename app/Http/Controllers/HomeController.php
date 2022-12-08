<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\County;
use App\Models\Guide;
use App\Models\HelpCourse;
use App\Models\HelpPoint;
use App\Models\Point;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home', [
            'guides' => Guide::all(),
            'points' => Point::all(['title', 'lat', 'lng']),
        ]);
    }

    public function mapSection()
    {
        $counties = County::get();
        $helpPoints = HelpPoint::get();
        return view('map', compact('counties', 'helpPoints'));
    }

    public function coursesSection()
    {
        $counties = County::get();
        return view('courses', compact('counties'));
    }

    public function localizeLatLng()
    {
        $lat = request()->input('lat');
        $lng = request()->input('lng');

        return view('localize', compact( 'lat', 'lng'));
    }

    public function localizeLatLngPoints()
    {
        $lat = (float) request()->input('lat');
        $lng = (float) request()->input('lng');

        $lat1 = $lat;
        $lng1 = $lng;

        $points = [];
        HelpPoint::chunk(100, function($helpPoints) use($lat1, $lng1, &$points)
        {
            foreach ($helpPoints as $point){
                $lat2 = (float) $point->lat;
                $lng2 = (float) $point->lng;

                $d = self::haversineGreatCircleDistance($lat1, $lng1, $lat2, $lng2);
                if($d < 3) { // points in radius distance within 3km
                    $points[] = [
                        'd' => $d,
                        'point' => $point
                    ];
                }
            }
        });

        usort($points, function($a, $b) {
            return $a['d'] > $b['d'];
        });

        return response()->json([
            "points" => $points,
            "content" => View::make('components.helpPointLocalizeList', compact('points'))->render()
        ]);
    }

    public function citiesByCounty($countyId)
    {
        $cities = City::where('county_id', $countyId)->pluck('name', 'id');

        return response()->json($cities);
    }

    public function helpPoints($countyId, $cityId = null)
    {
        $helpPoints = HelpPoint::where('county_id', $countyId);

        if($cityId){
            $helpPoints->where('city_id', $cityId);
        }
        $helpPoints = $helpPoints->get();

        return response()->json([
                                    "points" => $helpPoints,
                                    "content" => View::make('components.helpPointList', compact('helpPoints'))->render()
                                ]);
    }

    public function coursesList($countyId, $cityId = null)
    {
        $helpCourses = HelpCourse::where('county_id', $countyId);

        if($cityId){
            $helpCourses->where('city_id', $cityId);
        }
        $helpCourses = $helpCourses->limit(50)->latest()->get();

        return response()->json([
            "content" => View::make('components.helpCourses', compact('helpCourses'))->render()
        ]);
    }

    public static function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371)
    {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                               cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
    }

    public function setLocale($lang)
    {
        if (in_array($lang, ['en', 'ro'])) {
            App::setLocale($lang);
            session()->put('locale', $lang);
        } else {
            App::setLocale('ro');
            session()->put('locale', 'ro');
        }
        return back();
    }

}
