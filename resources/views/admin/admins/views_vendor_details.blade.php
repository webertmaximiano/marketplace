@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
    <!--carrega a tela de informação pessoal-->
    <div class="row">
        <!--carrega a tela de informação pessoal-->
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Personal Information</h4>
                    <div class="form-group">
                        <label>Email</label>
                        <input  class="form-control" value="{{$vendorDetails['vendor_personal']['email']}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="vendor_name">Name</label>
                        <input type="text" class="form-control" id="vendor_name" value="{{$vendorDetails['vendor_personal']['name']}}"
                            name="vendor_name">
                    </div>
                    <div class="form-group">
                        <label for="vendor_address">Endereço</label>
                        <input type="text" class="form-control" id="vendor_address" value="{{$vendorDetails['vendor_personal']['address']}}"
                            name="vendor_address">
                    </div>
                    <div class="form-group">
                        <label for="vendor_mobile">Mobile</label>
                        <input type="text" class="form-control" id="vendor_mobile"
                            placeholder="Informe o telefone com ddd 11 digitos" name="vendor_mobile" value="{{$vendorDetails['vendor_personal']['mobile']}}"
                            required="" maxlength="11" minlength="11">
                    </div>
                    <div class="form-group">
                        <label for="vendor_city">Cidade</label>
                        <input type="text" class="form-control" id="vendor_city" value="{{$vendorDetails['vendor_personal']['city']}}"
                            name="vendor_city">
                    </div>
                    <div class="form-group">
                        <label for="vendor_state">Estado</label>
                        <input type="text" class="form-control" id="vendor_state" value="{{$vendorDetails['vendor_personal']['state']}}"
                            name="vendor_state">
                    </div>
                    <div class="form-group">
                        <label for="vendor_country">País</label>
                        <input type="text" class="form-control" id="vendor_country" value="{{$vendorDetails['vendor_personal']['country']}}"
                            name="vendor_country">
                    </div>
                    <div class="form-group">
                        <label for="vendor_pincode">PIN CODE</label>
                        <input type="text" class="form-control" id="vendor_pincode" value="{{$vendorDetails['vendor_personal']['pincode']}}"
                            name="vendor_pincode">
                    </div>
                    @if (!empty($vendorDetails['image']))
                    <div class="form-group">
                        <label for="vendor_image">Foto</label>
                        <br><img style="width: 200px;" src="{{ url('admin/images/photo/'.$vendorDetails['image'])}}">     
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!--carrega a tela de informação Busines-->
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Business Information</h4>
                    <div class="form-group">
                        <label for="vendor_business">Name</label>
                        <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['shop_name']}}"
                            name="shop_name">
                    </div>
                    <div class="form-group">
                        <label for="vendor_business">Endereço</label>
                        <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['shop_address']}}"
                            name="shop_address">
                    </div>
                    <div class="form-group">
                        <label for="vendor_business">Cidade</label>
                        <input type="text" class="form-control"  value="{{$vendorDetails['vendor_business']['shop_city']}}"
                            name="shop_city">
                    </div>
                    <div class="form-group">
                        <label for="vendor_business">Estado</label>
                        <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['shop_state']}}"
                            name="shop_state">
                    </div>
                    <div class="form-group">
                        <label for="vendor_business">País</label>
                        <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['shop_country']}}"
                            name="shop_country"> 
                    </div>
                    <div class="form-group">
                        <label for="vendor_business_pincode">PIN CODE</label>
                        <input type="text" class="form-control" value="{{$vendorDetails['vendor_business']['shop_pincode']}}"
                            name="shop_pincode">
                    </div>
                    <div class="form-group">
                        <label for="vendor_business_mobile">Mobile</label>
                        <input type="text" class="form-control" 
                             name="shop_mobile" value="{{$vendorDetails['vendor_business']['shop_mobile']}}">
                    </div>
                    <div class="form-group">
                        <label for="vendor_business">Web Site</label>
                        <input type="text" class="form-control" id="shop_website"
                             name="shop_website" value="{{$vendorDetails['vendor_business']['shop_website']}}">
                    </div>
                    <div class="form-group">
                        <label for="vendor_business">Shop Email</label>
                        <input type="text" class="form-control" id="shop_email"
                             name="shop_email" value="{{$vendorDetails['vendor_business']['shop_email']}}">
                    </div>
                    <div class="form-group">
                        <label for="vendor_business">Addres Proof</label>
                        <input type="text" class="form-control" id="address_proof"
                             name="address_proof" value="{{$vendorDetails['vendor_business']['address_proof']}}">
                    </div>
                    @if (!empty($vendorDetails['image']))
                    <div class="form-group">
                        <label for="address_proof_image">Foto</label>
                        <br><img style="width: 200px;" src="{{ url('admin/images/proofs/'.$vendorDetails['vendor_business']['address_proof_image'])}}">     
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="vendor_business">Business Lincense Number</label>
                        <input type="text" class="form-control" id="business_license_number"
                             name="business_license_number" value="{{$vendorDetails['vendor_business']['business_license_number']}}">
                    </div>
                    <div class="form-group">
                        <label for="vendor_business">GST Number</label>
                        <input type="text" class="form-control" id="gst_number"
                             name="gst_number" value="{{$vendorDetails['vendor_business']['gst_number']}}">
                    </div>
                    <div class="form-group">
                        <label for="vendor_business">PAN Number</label>
                        <input type="text" class="form-control" id="pan_number"
                             name="pan_number" value="{{$vendorDetails['vendor_business']['pan_number']}}">
                    </div>
                </div>
            </div>
        </div>
        <!--carrega a tela de informação Bancaria-->
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bank Information</h4>
                    <div class="form-group">
                        <label for="vendor_bank_account_holder_name">Account Holder Name</label>
                        <input type="text" class="form-control" value="{{$vendorDetails['vendor_bank']['account_holder_name']}}"
                            name="account_holder_name">
                    </div>
                    <div class="form-group">
                        <label for="vendor_bank_name">Bank Name</label>
                        <input type="text" class="form-control" id="vendor_address" value="{{$vendorDetails['vendor_bank']['bank_name']}}"
                            name="bank_name">
                    </div>
                    <div class="form-group">
                        <label for="vendor_bank_account_number">Account Number</label>
                        <input type="text" class="form-control" name="account_number" value="{{$vendorDetails['vendor_bank']['account_number']}}">
                    </div>
                    <div class="form-group">
                        <label for="vendor_bank_ifsc_code">Bank IFSC CODE</label>
                        <input type="text" class="form-control" value="{{$vendorDetails['vendor_bank']['bank_ifsc_code']}}"
                            name="bank_ifsc_code">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection