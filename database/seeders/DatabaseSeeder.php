<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2a$10$e3oU0t5JjZE.MnPM80sO/.BAnYloeVOTm.iGo2YqcXXbhlnvMo6J2',//password123
        ]);
        
        $this->call(ProvinceSeeder::class);
        $this->call(BusinessFieldSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EducationSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(AdvertisementSeeder::class);
        $this->call(VacancySeeder::class);
    }
}
