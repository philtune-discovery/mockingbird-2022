<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            'user_id'    => 1
        ]);
    }
}
