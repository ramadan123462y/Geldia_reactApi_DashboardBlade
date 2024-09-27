<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->delete();
        $settings = ['Facebook', 'Instagram', 'Twitter', 'TikTok', 'LinkedIn', 'YouTube', 'ContactEmail'];
        foreach ($settings as $setting) {


            Setting::create([
                'key' => $setting

            ]);
        }
    }
}
