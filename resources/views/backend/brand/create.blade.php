@extends('layouts.backend')

@section('title', 'Create Sub Category')
@section('css')
    <link href="{{ asset('backend/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Create Brand<small><a class="btn btn-warning" href="{{ route('brands.index') }}"> Back</a></small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form action="{{route('brands.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <span class="section">Brand</span>

                @include('backend.includes.message')

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required text-danger">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="name" placeholder="Name" required="required" value="{{ old('name') }}"/>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Image<span class="required text-danger">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="file" name="image" id="image" onchange="previewImage(this,'image_preview')" value="{{ old('image') }}"/>
                        <br>
                        <img class="img-fluid" id="image_preview" src="{{ getImageUrl('') }}"
                            alt="Profile Image" accept="image/png, image/jpeg" width="200px" height="250px">
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Meta Title</label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="meta_title" placeholder="Meta Title" value="{{ old('meta_title') }}"/>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Meta Description</label>
                    <div class="col-md-6 col-sm-6">
                        <textarea class="form-control" name="meta_description" cols="30" rows="10">{{ old('meta_description') }}</textarea>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Meta Image</label>
                    <div class="mt-3">
                        <input class="form-control" type="file" name="meta_image" id="meta_image" onchange="previewImage(this,'meta_image_preview')" value="{{ old('meta_image') }}"/>
                        <br>
                        <img class="img-fluid" id="meta_image_preview" src="{{ getImageUrl('') }}"
                            alt="Profile Image" accept="image/png, image/jpeg" width="400px" height="210px">
                    </div>
                </div>

                <div class="ln_solid">
                    <div class="form-group">
                        <div class="col-md-6 offset-md-3 mt-3">
                            <button type='submit' class="btn btn-primary">Create</button>
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
