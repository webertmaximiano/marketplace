@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
     <!--carrega a tela de informação pessoal-->
    @if($slug=="personal") 
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Personal Update Information</h4>
                    @if(Session::has('error_message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error: </strong> {{Session::get('error_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if(Session::has('success_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success: </strong> {{Session::get('success_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <p class="card-description">
                        Update Vendor Details
                    </p>
                    <form class="forms-sample" action="{{url('admin/update-vendor-details/personal')}}" 
                        method="post" enctype="multipart/form-data">@csrf
                        <div class="form-group">
                            <label>Vendor Username/Email</label>
                            <input  class="form-control" value="{{Auth::guard('admin')->user()->email}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="vendor_name">Name</label>
                            <input type="text" class="form-control" id="vendor_name" value="{{Auth::guard('admin')->user()->name}}"
                                name="vendor_name">
                        </div>
                        <div class="form-group">
                            <label for="vendor_mobile">Mobile</label>
                            <input type="text" class="form-control" id="vendor_mobile"
                                placeholder="Informe o telefone com ddd 11 digitos" name="vendor_mobile" value="{{Auth::guard('admin')->user()->mobile}}"
                                required="" maxlength="11" minlength="11">
                        </div>
                        <div class="form-group">
                            <label for="vendor_address">Endereço</label>
                            <input type="text" class="form-control" id="vendor_address" value="{{$vendorDetails['address']}}"
                                name="vendor_address">
                        </div>
                        <div class="form-group">
                            <label for="vendor_city">Cidade</label>
                            <input type="text" class="form-control" id="vendor_city" value="{{$vendorDetails['city']}}"
                                name="vendor_city">
                        </div>
                        <div class="form-group">
                            <label for="vendor_state">Estado</label>
                            <input type="text" class="form-control" id="vendor_state" value="{{$vendorDetails['state']}}"
                                name="vendor_state">
                        </div>
                        <div class="form-group">
                            <label for="vendor_country">Country</label>
                            <select class="form-control" id="vendor_country" name="vendor_country"
                             style="color: #495057;">
                                <option value="">Select Country</option>
                               
                                @foreach($countries as $country)
                                <option value="{{ $country['country_name'] }}" @if($country['
                                country_name']==$vendorDetails['country']) selected @endif>{{ 
                                $country['country_name']}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="vendor_pincode">PIN CODE</label>
                            <input type="text" class="form-control" id="vendor_pincode" value="{{$vendorDetails['pincode']}}"
                                name="vendor_pincode">
                        </div>
                        <div class="form-group">
                            <label for="vendor_image">Foto</label>
                            <input type="file" class="form-control" id="vendor_image"
                                placeholder="Adicione sua foto" name="vendor_image">
                            @if (!empty(Auth::guard('admin')->user()->image))
                            <a target="_blank" href="{{ url('admin/images/photo/'.Auth::guard('admin')->user()->image)}}">View Image</a>
                            <input type="hidden" name="current_vendor_image" value="{{Auth::guard('admin')->user()->image}}">
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    
    </div>
     <!--carrega a tela de informação da Loja-->
    @elseif($slug=="business")
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Business Information</h4>
                    @if(Session::has('error_message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error: </strong> {{Session::get('error_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if(Session::has('success_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success: </strong> {{Session::get('success_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <p class="card-description">
                        Update Vendor Details
                    </p>
                    <form class="forms-sample" action="{{url('admin/update-vendor-details/business')}}" 
                        method="post" enctype="multipart/form-data">@csrf
                        <div class="form-group">
                            <label>Vendor Username/Email</label>
                            <input  class="form-control" value="{{Auth::guard('admin')->user()->email}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="shop_name">Shop Name</label>
                            <input type="text" class="form-control" id="shop_name" value="{{$vendorDetails['shop_name']}}"
                                name="shop_name">
                        </div>
                                             
                        <div class="form-group">
                            <label for="shop_address">Shop Endereço</label>
                            <input type="text" class="form-control" id="shop_address" value="{{$vendorDetails['shop_address']}}"
                                name="shop_address">
                        </div>
                        <div class="form-group">
                            <label for="shop_city">Shop Cidade</label>
                            <input type="text" class="form-control" id="shop_city" value="{{$vendorDetails['shop_city']}}"
                                name="shop_city">
                        </div>
                        <div class="form-group">
                            <label for="shop_state">Shop Estado</label>
                            <input type="text" class="form-control" id="shop_state" value="{{$vendorDetails['shop_state']}}"
                                name="shop_state">
                        </div>
                        <div class="form-group">
                            <label for="shop_country">Shop País</label>
                            <select class="form-control" id="shop_country" name="shop_country" style="
                                color: #495057;">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                <option value="{{ $country['country_name'] }}" @if($country['
                                country_name']==$vendorDetails['shop_country']) selected @endif>{{
                                $country['country_name'] }} </option>
                                @endforeach
                            </select>    
                        </div>
                        <div class="form-group">
                            <label for="shop_pincode">PIN CODE</label>
                            <input type="text" class="form-control" id="shop_pincode" value="{{$vendorDetails['shop_pincode']}}"
                                name="shop_pincode">
                        </div>
                        <div class="form-group">
                            <label for="shop_mobile">Shop Mobile</label>
                            <input type="text" class="form-control" id="shop_mobile"
                                placeholder="Informe o telefone com ddd 11 digitos" name="shop_mobile" value="{{$vendorDetails['shop_mobile']}}"
                                required="" maxlength="11" minlength="11">
                        </div>
                        <div class="form-group">
                            <label for="business_license_number">Business License Number</label>
                            <input type="text" class="form-control" id="business_license_number" value="{{$vendorDetails['business_license_number']}}"
                                name="business_license_number">
                        </div>
                        <div class="form-group">
                            <label for="gst_number">GST Number</label>
                            <input type="text" class="form-control" id="gst_number" value="{{$vendorDetails['gst_number']}}"
                                name="gst_number">
                        </div>
                        <div class="form-group">
                            <label for="pan_number">PAN Number</label>
                            <input type="text" class="form-control" id="pan_number" value="{{$vendorDetails['pan_number']}}"
                                name="pan_number">
                        </div>                        
                        <div class="form-group">
                            <label for="addres_mobile">Address Proof</label>
                           <select class="form-control" name="address_proof" id="address_proof">
                            <option value="Passport"@if($vendorDetails['address_proof']=="Passport") selected @endif>Passport</option>
                            <option value="Votin Card"@if($vendorDetails['address_proof']=="Votin Card") selected @endif>Titulo de Eleitor</option>
                            <option value="PAN"@if($vendorDetails['address_proof']=="PAN") selected @endif>PAN</option>
                            <option value="Driving License"@if($vendorDetails['address_proof']=="Driving License") selected @endif>Carteira de Motorista</option>
                            <option value="Aadhar card"@if($vendorDetails['address_proof']=="Aadhar card") selected @endif>Aadhar Card</option>
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="address_proof_image">Address Proof Shop Foto</label>
                            <input type="file" class="form-control" id="address_proof_image"
                                placeholder="Adicione sua foto" name="address_proof_image">
                            @if (!empty($vendorDetails['address_proof_image']))
                            <a target="_blank" href="{{ url('admin/images/proofs/'.$vendorDetails['address_proof_image'])}}">View Image</a>
                            <input type="hidden" name="current_address_proof" value="{{$vendorDetails['address_proof_image']}}">
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    
    </div>
     <!--carrega a tela de informação bancárias-->
    @elseif($slug=="bank")
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Bank Information</h4>
                    @if(Session::has('error_message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error: </strong> {{Session::get('error_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if(Session::has('success_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success: </strong> {{Session::get('success_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <p class="card-description">
                        Update Vendor Details
                    </p>
                    <form class="forms-sample" action="{{url('admin/update-vendor-details/bank')}}" 
                        method="post" enctype="multipart/form-data">@csrf
                        <div class="form-group">
                            <label>Vendor Username/Email</label>
                            <input  class="form-control" value="{{Auth::guard('admin')->user()->email}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="account_holder_name">Account Holder Name</label>
                            <input type="text" class="form-control" id="account_holder_name" value="{{$vendorDetails['account_holder_name']}}"
                                name="account_holder_name">
                        </div>                                             
                        <div class="form-group">
                            <label for="bank_name">Bank Name</label>
                            <input type="text" class="form-control" id="bank_name" value="{{$vendorDetails['bank_name']}}"
                                name="bank_name">
                        </div>
                        <div class="form-group">
                            <label for="account_number">Account Number</label>
                            <input type="text" class="form-control" id="account_number" value="{{$vendorDetails['account_number']}}"
                                name="account_number">
                        </div>
                        <div class="form-group">
                            <label for="bank_ifsc_code">Bank IFSC Code</label>
                            <input type="text" class="form-control" id="bank_ifsc_code" value="{{$vendorDetails['bank_ifsc_code']}}"
                                name="bank_ifsc_code">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    
    </div>
    @endif
</div>
@endsection