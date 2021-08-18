<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([

            "number"=>4,
            "number_people"=>2,
            "equipment"=>"Wyposażenie"

        ]);

    }
    
}
