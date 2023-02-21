<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $vendorRecords = [
            ['id' => 4,
            'name' => 'Paula',
            'address'=> 'CP-112',
            'city'=> 'New Delhi',
            'state'=> 'Delhi',
            'country'=> 'India',
            'pincode'=> '110001',
            'mobile'=> '97000000000',
            'email'=> 'paula@admin.com',
            'status'=> 0],
        ];
        Vendor::insert($vendorRecords);
    }
}
