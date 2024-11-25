<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $c1 = Category::create(['name' => "Technology"]);
        $c2 = Category::create(['name' => "Science"]);
        $c3 = Category::create(['name' => "Programming"]);
        $c4 = Category::create(['name' => "Physics"]);
        $c5 = Category::create(['name' => "Maths"]);

        // create 3 defined books
        Book::create([
            "title" => "HTML5",
            "author" => "J. Smith",
            "year" => 2022,
            "rating" => 3.0,
            'category_id' => $c1->id,
            "description" => "The Definitive Guide to HTML5 provides the breadth of information you'll need to start creating the next generation of HTML5 websites. It covers all the base knowledge required for standards-compliant, semantic, modern website creation"
        ])->reviews()->saveMany(Review::factory()->count(fake()->numberBetween(0, 20))->make());

        Book::create([
            "title" => "CSS3",
            "author" => "A. Other",
            "year" => 2022,
            "rating" => 3.0,
            'category_id' => $c1->id,
            "description" => "CSS3 is full of …"
        ])->reviews()->saveMany(Review::factory()->count(fake()->numberBetween(0, 20))->make());

        Book::create([
            "title" => "PHP8",
            "author" => "J. Smith",
            "year" => 2023,
            "rating" => 4.5,
            'category_id' => $c1->id,
            "description" => "Learn how to…"
        ])->reviews()->saveMany(Review::factory()->count(fake()->numberBetween(0, 20))->make());

        // create 10 random books via factory and associate a random category
        Book::factory(10)->create(
            ['category_id' => fake()->randomElement(Category::all())->id]
        );
    }
}
