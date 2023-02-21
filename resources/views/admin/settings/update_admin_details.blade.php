@extends('admin.layout.layout')
@section('content')
<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Settings Admin Details</h4>
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
                Update Admin Details
              </p>
              <form class="forms-sample" action="{{url('admin/update-admin-details')}}" 
              method="post" enctype="multipart/form-data">@csrf
                <div class="form-group">
                  <label>Admin Username/Email</label>
                  <input  class="form-control" value="{{Auth::guard('admin')->user()->email}}" readonly>
                </div>
                <div class="form-group">
                  <label>Admin Type</label>
                  <input class="form-control" value="{{Auth::guard('admin')->user()->type}}" readonly>
                </div>
                <div class="form-group">
                  <label for="admin_name">Name</label>
                  <input type="text" class="form-control" id="admin_name" value="{{Auth::guard('admin')->user()->name}}"
                    name="admin_name" required="">
               </div>
                <div class="form-group">
                    <label for="admin_mobile">Mobile</label>
                    <input type="text" class="form-control" id="admin_mobile"
                     placeholder="Informe o telefone com ddd 11 digitos" name="admin_mobile" value="{{Auth::guard('admin')->user()->mobile}}"
                     required="" maxlength="11" minlength="11">
                 </div>
                 <div class="form-group">
                  <label for="admin_image">Foto</label>
                  <input type="file" class="form-control" id="admin_image"
                   placeholder="Adicione sua foto" name="admin_image">
                   @if (!empty(Auth::guard('admin')->user()->image))
                   <a target="_blank" href="{{ url('admin/images/photo/'.Auth::guard('admin')->user()->image)}}">View Image</a>
                   <input type="hidden" name="current_admin_image" value="{{Auth::guard('admin')->user()->image}}">
                   @endif
                </div>               
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
              </form>
            </div>
          </div>
        </div>
@endsection