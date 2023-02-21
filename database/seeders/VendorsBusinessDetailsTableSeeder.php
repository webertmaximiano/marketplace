<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBusinessDetail;

class VendorsBusinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $vendorRecords = [[
            'id' => 1,
            'vendor_id' => 1,
            'shop_name' => 'John Eletronics Store',
            'shop_address' => 'rua teste, 405',
            'shop_city' => 'New Delhi',
            'shop_state'=> 'Rio de Janeiro',
            'shop_country'=>'India',
            'shop_pincode'=>'11001',
            'shop_mobile' =>'21979958509',
            'shop_website' => 'eletronic.com',
            'shop_email'=> 'john@admin.com',
            'address_proof'=>'Passport',
            'address_proof_image'=> 'test.jpg',
            'business_license_number'=>'13243535',
            'gst_number'=> '446466446', 
            'pan_number'=>'242355346'],
        ];
        VendorsBusinessDetail::insert($vendorRecords);

    }
}
