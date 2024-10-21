<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create 3 defined books
        Book::create(["title" => "HTML5", "author" => "J. Smith", "year" => 2022, "rating" => 3.0, "description" => "The Definitive Guide to HTML5 provides the breadth of information you'll need to start creating the next generation of HTML5 websites. It covers all the base knowledge required for standards-compliant, semantic, modern website creation"]);
        Book::create(["title" => "CSS3", "author" => "A. Other", "year" => 2022, "rating" => 3.0, "description" => "CSS3 is full of …"]);
        Book::create(["title" => "PHP8", "author" => "J. Smith", "year" => 2023, "rating" => 4.5, "description" => "Learn how to…"]);

        // create 10 random books via factory
        Book::factory(10)->create();
    }
}
