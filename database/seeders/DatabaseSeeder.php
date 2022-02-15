<?php

namespace Database\Seeders;

use App\Models\Advertiser;
use App\Models\Campaign;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(UserSeeder::class);
        // \App\Models\User::factory(10)->create();
        $user = User::create([
            'name' => 'Phil Tune',
            'email' => 'phillip_tune@discovery.com',
            'password' => Hash::make('bV@MUHl58c*^'),
            'email_verified_at' => now()
        ]);
        $advertiser = Advertiser::create([
            'name' => 'Arm & Hammer'
        ]);
        $campaign = $advertiser->campaigns()->create([
            'name' => 'Puppy Bowl XVIII',
        ]);
        $campaign->projects()->create([
            'name' => 'Flex Ad',
            'created_by' => $user->id
        ]);
    }
}
