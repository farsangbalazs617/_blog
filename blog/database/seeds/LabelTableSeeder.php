<?php

use Illuminate\Database\Seeder;

class LabelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labels')->insert([
            'label' => 'hobbi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
