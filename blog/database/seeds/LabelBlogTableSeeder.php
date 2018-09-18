<?php

use Illuminate\Database\Seeder;

class LabelBlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('label__blogs')->insert([
            'label_id' => 1,
            'blog_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
