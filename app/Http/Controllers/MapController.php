<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\County;
use App\Models\Point;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MapController extends Controller
{
    public function show(): View
    {
        return view('map.show', [
            'counties' => County::all(),
            'points'   => Point::all(),
        ]);
    }

    public function localize(Request $request): View
    {
        return view('map.localize', [
            'lat' => $request->float('lat'),
            'lng' => $request->float('lng'),
        ]);
    }

    public function points(Request $request): JsonResponse
    {
        $lat = $request->float('lat');
        $lng = $request->float('lng');

        $lat1 = $lat;
        $lng1 = $lng;

        $points = [];

        Point::chunk(100, function ($chunk) use ($lat1, $lng1, &$points) {
            foreach ($chunk as $point) {
                $lat2 = (float) $point->lat;
                $lng2 = (float) $point->lng;

                $d = self::haversineGreatCircleDistance($lat1, $lng1, $lat2, $lng2);
                if ($d < 3) { // points in radius distance within 3km
                    $points[] = [
                        'd' => $d,
                        'point' => $point,
                    ];
                }
            }
        });

        usort($points, function ($a, $b) {
            return $a['d'] > $b['d'];
        });

        return response()->json([
            'points' => $points,
            'content' => view('points.localize', compact('points'))->render(),
        ]);
    }

    private static function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371)
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

    public function pointsSearch(County $county, ?City $city = null): JsonResponse
    {
        $points = Point::query()
            ->when(
                $city === null,
                fn (Builder $query) => $query->where('county_id', $county->id),
                fn (Builder $query) => $query->where('city_id', $city->id),
            )
            ->latest()
            ->get();

        return response()->json([
            'points' => $points,
            'content' => view('points.search', ['points' => $points])->render(),
        ]);
    }

    public function citiesInCounty(County $county): JsonResponse
    {
        return response()->json(
            $county->cities->pluck('name', 'id'),
        );
    }
}
