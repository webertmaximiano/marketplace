<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $adminRecords = [
            ['id'=>2,
            'name'=>'John Teste',
            'type'=>'vendor',
            'vendor_id'=>1,
            'mobile'=>'21994717916', 
            'email'=>'john@admin.com',
            'password'=>'$2a$12$p3o6XX21Tmy8Thvhw8CeeOq0mjs607tJ3KEyRNeiIUY0G8AwAYqnu',
            'image'=>'',
            'status'=>1],
        ];
        Admin::insert($adminRecords);
    }
}
