@extends('layouts.backend')

@section('title', 'Edit Sub Category')
@section('css')
    <link href="{{ asset('backend/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit Sub Category <small><a class="btn btn-warning" href="{{ route('sub.categories.index') }}"> Back</a></small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form action="{{route('sub.categories.update', $sub_category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <span class="section">Sub Category</span>

                @include('backend.includes.message')

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required text-danger">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="name" placeholder="Name" required="required" value="{{ $sub_category->name }}"/>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Category</label>
                    <div class="col-md-6 col-sm-6">
                        <select name="category_ids[]" class="form-control js-example-basic-multiple" multiple>
                            <option value="">Choose Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $sub_category->categories->contains($category) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Meta Title</label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="meta_title" placeholder="Meta Title" value="{{ $sub_category->meta_title }}"/>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Meta Description</label>
                    <div class="col-md-6 col-sm-6">
                        <textarea class="form-control" name="meta_description" cols="30" rows="10">{{ $sub_category->meta_description }}</textarea>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Meta Image</label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="file" name="meta_image" id="meta_image" onchange="previewImage(this,'image_preview')" value="{{ old('meta_image') }}"/>
                        <br>
                        <img class="img-fluid" id="image_preview" src="{{ getImageUrl($sub_category->meta_image) }}"
                            alt="Profile Image" accept="image/png, image/jpeg" width="400px" height="209px">
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Status</label>
                    <div class="col-md-6 col-sm-6">
                        <select name="status" class="form-control" required>
                            <option value="1" {{$sub_category->status == 1 ? 'selected' : ''}}>Active</option>
                            <option value="2" {{$sub_category->status == 2 ? 'selected' : ''}}>Inactive</option>
                            <option value="3" {{$sub_category->status == 3 ? 'selected' : ''}}>Delete</option>
                        </select>
                    </div>
                </div>

                <div class="ln_solid">
                    <div class="form-group">
                        <div class="col-md-6 offset-md-3 mt-3">
                            <button type='submit' class="btn btn-warning">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script src="{{ asset('backend/vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        CKEDITOR.replace( 'meta_description' );

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endpush
@endsection
