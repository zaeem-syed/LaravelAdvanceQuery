<?php

namespace Database\Seeders;

use App\Models\comment;
use Database\Factories\CommentFactory;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        comment::factory()->count(12)->create();
    }
}
