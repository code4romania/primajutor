<?php

declare(strict_types=1);

namespace Database\Seeders;

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
    }
}
