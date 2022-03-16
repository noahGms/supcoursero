<?php

namespace Database\Seeders;

use App\Models\ExerciseFileStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseFileStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exercise_file_statuses')->insert([
            'id' => 1,
            'name' => 'Not submitted',
            'color' => '#71717A',
        ]);


        DB::table('exercise_file_statuses')->insert([
            'id' => 2,
            'name' => 'Pending',
            'color' => '#EAB308',
        ]);

        DB::table('exercise_file_statuses')->insert([
            'id' => 3,
            'name' => 'Scored',
            'color' => '#22C55E',
        ]);
    }
}
