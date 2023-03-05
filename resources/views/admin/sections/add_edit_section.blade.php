@extends('admin.layout.layout')
@section('content')
<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">{{ $title }}</h4>
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
               
              <form class="forms-sample"  
                @if(empty($section['id'])) action="{{url('admin/add-edit-section')}}"
                     @else action="{{url('admin/add-edit-section/'.$section['id'])}}"
                @endif method="post" enctype="multipart/form-data"> @csrf
                    <div class="form-group">
                        <label for="section_name">Section Name</label>
                        <input type="text" class="form-control" id="section_name" placeholder="
                        Enter Section Name" name="section_name" @if(empty($section['name'])) value=
                        "{{$section['name']}}" @else value="{{ old('section_name') }}" @endif>
                     </div>               
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
@include('admin.layout.footer');
</div>

@endsection