@extends('layouts.backend')

@section('title', 'Show Category')
@section('content')

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Show Category <small><a class="btn btn-warning" href="{{ route('categories.index') }}"> Back</a></small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <span class="section">Category</span>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required text-danger">*</span></label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" disabled value="{{ $category->name }}"/>
                </div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Meta Title</label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" disabled value="{{ $category->meta_title }}"/>
                </div>
            </div>
            <div class="field item form-group my-3">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Meta Description</label>
                <div class="col-md-6 col-sm-6">
                    {!! $category->meta_description !!}
                </div>
            </div>
            <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Meta Image</label>
                <div class="col-md-6 col-sm-6">
                    <img class="img-fluid" id="image_preview" src="{{ getImageUrl($category->meta_image) }}"
                        alt="Profile Image" accept="image/png, image/jpeg" width="1200px" height="627px">
                </div>
            </div>
            <div class="ln_solid">
                <div class="form-group">
                    <div class="col-md-6 offset-md-3 mt-3">
                        <a class="btn btn-primary btn-sm" href="{{ route('categories.edit', $category->id) }}"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('categories.destroy', $category->id ) }}" class="btn btn-danger btn-sm {{$category->status == 3 ? 'disabled' : ''}}"  onclick="showDeleteConfirmation()"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
