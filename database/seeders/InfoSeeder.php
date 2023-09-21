<?php

namespace Database\Seeders;

use App\Models\Info;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Info::create([
            "city" => "Buttonwood, California.",
        "avenue"=> "Rosemead, CA 91770",
        "phone" => '00 (440) 9865 562',
        "worktime" => "Mon to Fri 9am to 6pm",
        "email" => "support@colorlib.com",
        "text" => "Send us your query anytime!",
        ]);
    }
}
