<?php

use Acme\Tickets\Tag;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();

        foreach (['Critic', 'Suggestion', 'Problem'] as $tag_name)
        {
            Tag::create([
                'name' => $tag_name
            ]);
        }
    }
} 