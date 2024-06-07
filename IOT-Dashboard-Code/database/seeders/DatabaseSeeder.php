<?php

namespace Database\Seeders;

use App\Models\PhSensor;
use App\Models\SystemDecision;
use App\Models\TempSensor;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $array = ["2024-04-01 12:00:00", "2024-04-01 12:30:00", "2024-04-01 13:00:00", "2024-04-01 13:30:00", "2024-04-01 14:00:00", "2024-04-01 14:30:00", "2024-04-01 15:00:00", "2024-04-01 15:30:00", "2024-04-01 16:00:00", "2024-04-01 16:30:00", "2024-04-01 17:00:00", "2024-04-01 17:30:00", "2024-04-01 18:00:00", "2024-04-01 18:30:00", "2024-04-01 19:00:00", "2024-04-01 19:30:00", "2024-04-01 20:00:00", "2024-04-01 20:30:00", "2024-04-01 21:00:00", "2024-04-01 21:30:00", "2024-04-01 22:00:00", "2024-04-01 22:30:00", "2024-04-01 23:00:00", "2024-04-01 23:30:00", "2024-04-02 00:00:00", "2024-04-02 00:30:00", "2024-04-02 01:00:00", "2024-04-02 01:30:00", "2024-04-02 02:00:00", "2024-04-02 02:30:00", "2024-04-02 03:00:00", "2024-04-02 03:30:00", "2024-04-02 04:00:00", "2024-04-02 04:30:00", "2024-04-02 05:00:00", "2024-04-02 05:30:00", "2024-04-02 06:00:00", "2024-04-02 06:30:00", "2024-04-02 07:00:00", "2024-04-02 07:30:00", "2024-04-02 08:00:00", "2024-04-02 08:30:00", "2024-04-02 09:00:00", "2024-04-02 09:30:00", "2024-04-02 10:00:00", "2024-04-02 10:30:00", "2024-04-02 11:00:00", "2024-04-02 11:30:00", "2024-04-02 12:00:00", "2024-04-02 12:30:00", "2024-04-02 13:00:00", "2024-04-02 13:30:00", "2024-04-02 14:00:00", "2024-04-02 14:30:00", "2024-04-02 15:00:00", "2024-04-02 15:30:00", "2024-04-02 16:00:00", "2024-04-02 16:30:00", "2024-04-02 17:00:00", "2024-04-02 17:30:00", "2024-04-02 18:00:00", "2024-04-02 18:30:00", "2024-04-02 19:00:00", "2024-04-02 19:30:00", "2024-04-02 20:00:00", "2024-04-02 20:30:00", "2024-04-02 21:00:00", "2024-04-02 21:30:00", "2024-04-02 22:00:00", "2024-04-02 22:30:00", "2024-04-02 23:00:00", "2024-04-02 23:30:00", "2024-04-03 00:00:00", "2024-04-03 00:30:00", "2024-04-03 01:00:00", "2024-04-03 01:30:00", "2024-04-03 02:00:00", "2024-04-03 02:30:00", "2024-04-03 03:00:00", "2024-04-03 03:30:00", "2024-04-03 04:00:00", "2024-04-03 04:30:00", "2024-04-03 05:00:00", "2024-04-03 05:30:00", "2024-04-03 06:00:00", "2024-04-03 06:30:00", "2024-04-03 07:00:00", "2024-04-03 07:30:00", "2024-04-03 08:00:00", "2024-04-03 08:30:00", "2024-04-03 09:00:00", "2024-04-03 09:30:00", "2024-04-03 10:00:00", "2024-04-03 10:30:00", "2024-04-03 11:00:00", "2024-04-03 11:30:00", "2024-04-03 12:00:00", "2024-04-03 12:30:00", "2024-04-03 13:00:00", "2024-04-03 13:30:00", "2024-04-03 14:00:00", "2024-04-03 14:30:00", "2024-04-03 15:00:00", "2024-04-03 15:30:00", "2024-04-03 16:00:00", "2024-04-03 16:30:00", "2024-04-03 17:00:00", "2024-04-03 17:30:00", "2024-04-03 18:00:00", "2024-04-03 18:30:00", "2024-04-03 19:00:00", "2024-04-03 19:30:00", "2024-04-03 20:00:00", "2024-04-03 20:30:00", "2024-04-03 21:00:00", "2024-04-03 21:30:00", "2024-04-03 22:00:00", "2024-04-03 22:30:00", "2024-04-03 23:00:00", "2024-04-03 23:30:00", "2024-04-04 00:00:00", "2024-04-04 00:30:00", "2024-04-04 01:00:00", "2024-04-04 01:30:00", "2024-04-04 02:00:00", "2024-04-04 02:30:00", "2024-04-04 03:00:00", "2024-04-04 03:30:00", "2024-04-04 04:00:00", "2024-04-04 04:30:00", "2024-04-04 05:00:00", "2024-04-04 05:30:00", "2024-04-04 06:00:00", "2024-04-04 06:30:00", "2024-04-04 07:00:00", "2024-04-04 07:30:00", "2024-04-04 08:00:00", "2024-04-04 08:30:00", "2024-04-04 09:00:00", "2024-04-04 09:30:00", "2024-04-04 10:00:00", "2024-04-04 10:30:00", "2024-04-04 11:00:00", "2024-04-04 11:30:00", "2024-04-04 12:00:00", "2024-04-04 12:30:00", "2024-04-04 13:00:00", "2024-04-04 13:30:00", "2024-04-04 14:00:00", "2024-04-04 14:30:00", "2024-04-04 15:00:00", "2024-04-04 15:30:00", "2024-04-04 16:00:00", "2024-04-04 16:30:00", "2024-04-04 17:00:00", "2024-04-04 17:30:00", "2024-04-04 18:00:00", "2024-04-04 18:30:00", "2024-04-04 19:00:00", "2024-04-04 19:30:00", "2024-04-04 20:00:00", "2024-04-04 20:30:00", "2024-04-04 21:00:00", "2024-04-04 21:30:00", "2024-04-04 22:00:00", "2024-04-04 22:30:00", "2024-04-04 23:00:00", "2024-04-04 23:30:00", "2024-04-05 00:00:00", "2024-04-05 00:30:00", "2024-04-05 01:00:00", "2024-04-05 01:30:00", "2024-04-05 02:00:00", "2024-04-05 02:30:00", "2024-04-05 03:00:00", "2024-04-05 03:30:00", "2024-04-05 04:00:00", "2024-04-05 04:30:00", "2024-04-05 05:00:00", "2024-04-05 05:30:00", "2024-04-05 06:00:00", "2024-04-05 06:30:00", "2024-04-05 07:00:00", "2024-04-05 07:30:00", "2024-04-05 08:00:00", "2024-04-05 08:30:00", "2024-04-05 09:00:00", "2024-04-05 09:30:00", "2024-04-05 10:00:00", "2024-04-05 10:30:00", "2024-04-05 11:00:00", "2024-04-05 11:30:00", "2024-04-05 12:00:00", "2024-04-05 12:30:00", "2024-04-05 13:00:00", "2024-04-05 13:30:00", "2024-04-05 14:00:00", "2024-04-05 14:30:00", "2024-04-05 15:00:00", "2024-04-05 15:30:00", "2024-04-05 16:00:00", "2024-04-05 16:30:00", "2024-04-05 17:00:00", "2024-04-05 17:30:00", "2024-04-05 18:00:00", "2024-04-05 18:30:00", "2024-04-05 19:00:00", "2024-04-05 19:30:00", "2024-04-05 20:00:00", "2024-04-05 20:30:00", "2024-04-05 21:00:00", "2024-04-05 21:30:00", "2024-04-05 22:00:00", "2024-04-05 22:30:00", "2024-04-05 23:00:00", "2024-04-05 23:30:00", "2024-04-06 00:00:00", "2024-04-06 00:30:00", "2024-04-06 01:00:00", "2024-04-06 01:30:00", "2024-04-06 02:00:00", "2024-04-06 02:30:00", "2024-04-06 03:00:00", "2024-04-06 03:30:00", "2024-04-06 04:00:00", "2024-04-06 04:30:00", "2024-04-06 05:00:00", "2024-04-06 05:30:00", "2024-04-06 06:00:00", "2024-04-06 06:30:00", "2024-04-06 07:00:00", "2024-04-06 07:30:00", "2024-04-06 08:00:00", "2024-04-06 08:30:00", "2024-04-06 09:00:00", "2024-04-06 09:30:00", "2024-04-06 10:00:00", "2024-04-06 10:30:00", "2024-04-06 11:00:00", "2024-04-06 11:30:00", "2024-04-06 12:00:00", "2024-04-06 12:30:00", "2024-04-06 13:00:00", "2024-04-06 13:30:00", "2024-04-06 14:00:00", "2024-04-06 14:30:00", "2024-04-06 15:00:00", "2024-04-06 15:30:00", "2024-04-06 16:00:00", "2024-04-06 16:30:00", "2024-04-06 17:00:00", "2024-04-06 17:30:00", "2024-04-06 18:00:00", "2024-04-06 18:30:00", "2024-04-06 19:00:00", "2024-04-06 19:30:00", "2024-04-06 20:00:00", "2024-04-06 20:30:00", "2024-04-06 21:00:00", "2024-04-06 21:30:00", "2024-04-06 22:00:00", "2024-04-06 22:30:00", "2024-04-06 23:00:00", "2024-04-06 23:30:00", "2024-04-07 00:00:00", "2024-04-07 00:30:00", "2024-04-07 01:00:00", "2024-04-07 01:30:00", "2024-04-07 02:00:00", "2024-04-07 02:30:00", "2024-04-07 03:00:00", "2024-04-07 03:30:00", "2024-04-07 04:00:00", "2024-04-07 04:30:00", "2024-04-07 05:00:00", "2024-04-07 05:30:00", "2024-04-07 06:00:00", "2024-04-07 06:30:00", "2024-04-07 07:00:00", "2024-04-07 07:30:00", "2024-04-07 08:00:00", "2024-04-07 08:30:00", "2024-04-07 09:00:00", "2024-04-07 09:30:00", "2024-04-07 10:00:00", "2024-04-07 10:30:00", "2024-04-07 11:00:00", "2024-04-07 11:30:00", "2024-04-07 12:00:00"];
        $IDs = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 128, 129, 130, 131, 132, 133, 134, 135, 136, 137, 138, 139, 140, 141, 142, 143, 144, 145, 146, 147, 148, 149, 150, 151, 152, 153, 154, 155, 156, 157, 158, 159, 160, 161, 162, 163, 164, 165, 166, 167, 168, 169, 170, 171, 172, 173, 174, 175, 176, 177, 178, 179, 180, 181, 182, 183, 184, 185, 186, 187, 188, 189, 190, 191, 192, 193, 194, 195, 196, 197, 198, 199, 200, 201, 202, 203, 204, 205, 206, 207, 208, 209, 210, 211, 212, 213, 214, 215, 216, 217, 218, 219, 220, 221, 222, 223, 224, 225, 226, 227, 228, 229, 230, 231, 232, 233, 234, 235, 236, 237, 238, 239, 240, 241, 242, 243, 244, 245, 246, 247, 248, 249, 250, 251, 252, 253, 254, 255, 256, 257, 258, 259, 260, 261, 262, 263, 264, 265, 266, 267, 268, 269, 270, 271, 272, 273, 274, 275, 276, 277, 278, 279, 280, 281, 282, 283, 284, 285, 286, 287, 288, 289];
//        for ($i = 0; $i < 289; $i++){
//            PhSensor::factory(1)->create([
//                'created_at' => $array[$i]
//            ]);
//        }

//        for ($i = 0; $i < 289; $i++){
//            TempSensor::factory(1)->create([
//                'created_at' => $array[$i]
//            ]);
//        }

//        for ($i = 0; $i < 289; $i++){
//            $ph = PhSensor::where('id', $i+1)->value('data');
//            SystemDecision::factory(1)->create([
//                'ph_sensor_id' =>  $i+1,
//                'temp_sensor_id' =>  $i+1,
//                'decision' => $ph <= 7.0 ? 'Add' : 'No',
//                'created_at' => $array[$i]
//            ]);
//        }

    }
}