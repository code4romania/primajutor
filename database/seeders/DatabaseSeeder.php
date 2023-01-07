<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\County;
use App\Models\Course;
use App\Models\Guide;
use App\Models\GuideStep;
use App\Models\Point;
use App\Models\User;
use BezhanSalleh\FilamentShield\Commands\MakeShieldGenerateCommand;
use BezhanSalleh\FilamentShield\Commands\MakeShieldSuperAdminCommand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call(MakeShieldGenerateCommand::class, [
            '--all' => true,
        ]);

        $user = User::factory(['email' => 'admin@example.com'])
            ->create();

        Artisan::call(MakeShieldSuperAdminCommand::class, [
            '--user' => $user->id,
        ]);

        Guide::factory()
            ->count(50)
            ->has(GuideStep::factory(fake()->randomDigitNotZero()), 'steps')
            ->create();

        County::query()
            ->with('cities:id,county_id')
            ->get('id')
            ->each(function (County $county) {
                Course::factory()
                    ->count(5)
                    ->recycle($county)
                    ->recycle($county->cities)
                    ->create();

                Point::factory()
                    ->count(50)
                    ->recycle($county)
                    ->recycle($county->cities)
                    ->create();
            });
    }
}
