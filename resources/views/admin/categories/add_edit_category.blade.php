@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Categories</h4>
            
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $title }}</h4>
                        @if (Session::has('error_message'))
                            <div class="alert alert-danger alert-dismissible fade show"
                                role="alert">
                                <strong>Error: </strong> {{ Session::get('error_message') }}
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show"
                                role="alert">
                                <strong>Success: </strong> {{ Session::get('success_message') }}
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show"
                                role="alert">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form class="forms-sample"
                            @if (empty($category['id'])) action="{{ url('admin/add-edit-category') }}"
                              @else action="{{ url('admin/add-edit-category/' . $category['id']) }}" 
                            @endif
                            method="post" enctype="multipart/form-data"> @csrf
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" class="form-control" id="category_name"
                                    placeholder="Enter Category Name"
                                    name="category_name"
                                    @if (!empty($category['name'])) value="{{ $category['name'] }}" 
                                      @else value="{{ old('category_name') }}" 
                                    @endif>
                            </div>
                            <div class="form-group">
                                <label for="section_id">Select Section</label>
                                <select name="section_id" id="section_id" class="form-control">
                                  <option value="">Select Section</option>
                                  @foreach($getSections as $section)
                                  <option value="{{$section['id']}}">{{$section['name']}}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                              <label for="parent_id">Select Category Level</label>
                              <select name="parent_id" id="parent_id" class="form-control">
                                <option value="0">Main Category</option>                                
                              </select>
                          </div>
                          <div class="form-group">
                            <label for="admin_image">Category Image</label>
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
             
          </div>      
      </div>
      
    </div>
  </div>
  @include('admin.layout.footer'); 
</div>

@endsection