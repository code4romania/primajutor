<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\County;
use App\Models\Course;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        return view('courses.index', [
            'counties' => County::all(),
        ]);
    }

    public function search(County $county, ?City $city = null): JsonResponse
    {
        return response()->json([
            'content' => view(
                'courses.search',
                [
                    'courses' => Course::query()
                        ->when(
                            $city === null,
                            fn (Builder $query) => $query->where('county_id', $county->id),
                            fn (Builder $query) => $query->where('city_id', $city->id),
                        )
                        ->latest()
                        ->get(),
                ]
            )->render(),
        ]);
    }
}
