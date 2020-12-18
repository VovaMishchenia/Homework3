<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('tag')->insert([
//            'name' => 'CSharp',
//            'urlSlug' => 'CSharp_url',
//            'description' => 'description for CSharp',
//            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//        ]);//
        DB::table('tag')->insert([
            'name' => 'ASP',
            'urlSlug' => 'ASP_url',
            'description' => 'description for ASP',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);//
        DB::table('tag')->insert([
            'name' => 'ASP.NET',
            'urlSlug' => 'ASP.NET_url',
            'description' => 'description for ASP.NET',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);//
        DB::table('tag')->insert([
            'name' => 'JavaScript',
            'urlSlug' => 'JavaScript_url',
            'description' => 'description for JavaScript',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);//
        DB::table('tag')->insert([
            'name' => 'Silverlight',
            'urlSlug' => 'Silverlight_url',
            'description' => 'description for Silverlight',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);//
        DB::table('tag')->insert([
            'name' => 'Html',
            'urlSlug' => 'Html_url',
            'description' => 'description for Html',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);//
        DB::table('tag')->insert([
            'name' => 'Css',
            'urlSlug' => 'Css_url',
            'description' => 'description for Css',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);//
    }
}
