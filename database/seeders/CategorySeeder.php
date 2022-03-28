<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attr = ['PHP', 'Laravel', 'Node JS', 'Javascript', 'Bootstrap'];

        foreach ($attr as $value) {
            \App\Models\Category::create([
                'slug' => str()->slug($value),
                'name' => $value,
            ]);
        }
    }
}
