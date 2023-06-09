<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feedback')->insert([
            [
                'booking_id' => '1',
                'rating' => '5',
                'feedback' => 'Bagus',
                'created_by'=> '5',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
