<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\County;
use App\Models\HelpCourse;
use App\Models\HelpPoint;
use App\Models\HelpTopic;
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

        HelpTopic::factory()
            ->count(50)
            ->create();

        County::query()
            ->with('cities:id,county_id')
            ->get('id')
            ->each(function (County $county) {
                HelpCourse::factory()
                    ->count(5)
                    ->recycle($county)
                    ->recycle($county->cities)
                    ->create();

                HelpPoint::factory()
                    ->count(50)
                    ->recycle($county)
                    ->recycle($county->cities)
                    ->create();
            });
    }
}
