<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('categories')->insert([
//            'name' => 'Мови програмування',
//            'url' => 'program language',
//            'description' => 'Для крутих козаків',
//            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//        ]);
        DB::table('categories')->insert([
            'name' => 'Programming',
            'url' => 'Programming_url',
            'description' => 'programming description',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'name' => 'Humor',
            'url' => 'Humor_url',
            'description' => 'humor description',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
