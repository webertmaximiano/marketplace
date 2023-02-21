<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBankDetail;

class VendorsBankDetailsTableSeeder extends Seeder
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
            'account_holder_name' => 'John Eletronics Store',
            'bank_name' => 'PagSeguro',
            'account_number' => '23456-7',
            'bank_ifsc_code'=> '9807'
            ],
        ];
        VendorsBankDetail::insert($vendorRecords);

    }
}
