<?php

namespace Database\Seeders;

use App\Models\Advertiser;
use App\Models\Image;
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
            'name'              => 'Phil Tune',
            'email'             => 'phillip_tune@discovery.com',
            'password'          => Hash::make('bV@MUHl58c*^'),
            'email_verified_at' => now()
        ]);
        $advertiser = Advertiser::create([
            'name' => 'Arm & Hammer'
        ]);
        $campaign = $advertiser->campaigns()->create([
            'name'    => 'Puppy Bowl XVIII',
            'user_id' => $user->id
        ]);
        $campaign->projects()->create([
            'name'        => 'Flex Ad',
            'campaign_id' => 1,
            'user_id'     => $user->id
        ]);
        Image::create([
            'project_id' => 1,
            'path'       => 'rjD0qfwvRVr6gTnzjkUSA0JYpDAz2onreZJpJPx7.png',
            'thumb_path' => 'H1Q7LXPdAgkFgNVgXiis0cZUPl1o85abPIZdMkrU.png',
            'ord'        => 0,
            'user_id'    => 1
        ]);
        Image::create([
            'project_id' => 1,
            'path'       => 'G9X9c0Ig9thm6DrejFjAUwHqL8YbD1gyoX3DmtDX.png',
            'thumb_path' => 'fx5nmeBxRPzXaDmaFEAhHErevBVG6bZf4cUlixri.png',
            'ord'        => 1,
            'user_id'    => $user->id
        ]);
    }
}
