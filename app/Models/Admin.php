<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $guard = 'admin';
   
    //cria relação Vendor Personal vendedor id
   public function vendorPersonal() {
    return $this->belongsTo('App\Models\Vendor','vendor_id');
   }

    //cria relação Vendor business vendedor id
    public function vendorBusiness() {
        return $this->belongsTo('App\Models\VendorsBusinessDetail','vendor_id');
    }

     //cria relação Vendor Bank vendedor id
   public function vendorBank() {
    return $this->belongsTo('App\Models\VendorsBankDetail','vendor_id');
   }

}
