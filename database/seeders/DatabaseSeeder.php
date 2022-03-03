<?php

namespace Database\Seeders;

use App\Models\Advertiser;
use App\Models\Project;
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
        // \App\Models\User::factory(10)->create();
        $user = User::create([
            'name'              => 'Phil Tune',
            'email'             => 'phillip_tune@discovery.com',
            'password'          => Hash::make('bV@MUHl58c*^'),
            'email_verified_at' => now()
        ]);
        /** @var Project $project */
        $project = Project::create([
            'name'        => 'Flex Ad',
//            'campaign_id' => 1,
            'user_id'     => $user->id
        ]);
        $project
            ->attachTag('Arm & Hammer', 'advertiser')
            ->attachTag('Puppy Bowl XVIII', 'campaign');


//        $advertiser = Advertiser::create([
//            'name' => 'Arm & Hammer'
//        ]);
//        $campaign = $advertiser->campaigns()->create([
//            'name'    => 'Puppy Bowl XVIII',
//            'user_id' => $user->id
//        ]);
//        $campaign->projects()->create([
//            'name'        => 'Flex Ad',
//            'campaign_id' => 1,
//            'user_id'     => $user->id
//        ]);

        $this->call(ImageSeeder::class);
    }
}
