<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(10)->create();
        \App\Models\User::factory(10)->create();
        $blogs= Blog ::factory(10)->create();
        $books= Book ::factory(10)->create();
        $imageUrl = 'api.lorem.space/image/drink?w=600&h=600';
        foreach ($blogs as $blog) {
            $blog->addMediaFromUrl('https://' . $imageUrl)->toMediaCollection('image');
        }
        foreach ($books as $book) {
            $book->addMediaFromUrl('https://' . $imageUrl)->toMediaCollection('image');
        }
       
    }
}
