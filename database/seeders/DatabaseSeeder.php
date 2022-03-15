<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Tags\Tag;

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
        array_map(function (array $item) use ($user) {
            /** @var Project $project */
            $project = Project::create([
                'name'    => $item['name'],
                'user_id' => $user->id
            ]);
            $project
                ->attachTag($item['advertiser'], 'advertiser')
                ->attachTag($item['campaign'], 'campaign');
        }, [
            [
                'name'       => 'Flex Ad',
                'advertiser' => 'Arm & Hammer',
                'campaign'   => 'Puppy Bowl XVIII',
            ],
            [
                'name'       => 'Smart Home 2022 Flex Ad',
                'advertiser' => 'Petsmart',
                'campaign'   => '2022'
            ],
        ]);

        Tag::findOrCreate([
            'Airwick',
            'Animal Planet',
            'Audible',
            'Airbnb',
            'Applebees',
            'Angel Soft',
            'Absolut',
            'Alfa Romeo',
            'American Family Insurance',
            'Apple Music',
            'Ashley Furniture',
            'American Signature Furniture',
            'Sleep Number',
            'Travel Texas',
            'Dairy Queen',
        ], 'advertiser');

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
