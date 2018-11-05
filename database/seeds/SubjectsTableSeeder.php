<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = factory(\App\Models\Subject::class)->times(5)->make();
        \App\Models\Subject::insert($subjects->toArray());
    }
}
