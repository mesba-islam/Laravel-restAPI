<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogs')->truncate();

        // Generate fake data using factory
        Blog::factory(20)->create();
    }
}
