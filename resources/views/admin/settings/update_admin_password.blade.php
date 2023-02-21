@extends('admin.layout.layout')
@section('content')
<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
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
              <h4 class="card-title">Settings</h4>
              <p class="card-description">
                Update Admin Password
              </p>
              <form class="forms-sample" action="{{url('admin/update-admin-password')}}" 
              method="post">@csrf
                <div class="form-group">
                  <label>Admin Username/Email</label>
                  <input  class="form-control" value="{{$adminDetails['email']}}" readonly>
                </div>
                <div class="form-group">
                  <label>Admin Type</label>
                  <input class="form-control" value="{{$adminDetails['type']}}" readonly>
                </div>
                <div class="form-group">
                  <label for="current_password">Current Password</label>
                  <input type="password" class="form-control" id="current_password"
                   placeholder="Enter Current Password" name="current_password" required="">
                   <span id="check_password"></span>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" id="new_password"
                     placeholder="Enter new Password" name="new_password" placeholder="Confirm Password" required="">
                  </div>
                <div class="form-group">
                  <label for="confirm_password">Confirm Password</label>
                  <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
                </div>
               
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
              </form>
            </div>
          </div>
        </div>
@endsection