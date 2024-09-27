<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('user_types')->delete();
        $types = ['user', 'doctor'];


        foreach ($types as $type) {
            UserType::create([
                'type' => $type

            ]);
        }
    }
}
