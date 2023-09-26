@extends('layouts.backend')

@section('title', 'Site Settings')

@section('content')

<link href="../" rel="stylesheet">
<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Update Social Media Links and Address</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form action="{{ route('socal.media.update',$addresses->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <span class="section">Personal Info</span>

                @include('backend.includes.message')

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Shop Address<span class="required text-danger">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" name="address" placeholder="Shop Address" required="required" value="{{ $value->address }}" />
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Phone Number<span class="required text-danger">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="number" name="phone" placeholder="Phone Number" required="required" value="{{ $value->phone }}"/>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required text-danger">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="email" placeholder="Your Email Address" required="required" type="email" value="{{ $value->email }}"/>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Facebook Link<span class="required text-danger">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" name="facebook" placeholder="Your Facebook Link" required="required" value="{{ $value->facebook }}"/>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Instagram Link<span class="required text-danger">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" name="instagram" placeholder="Your Intagram Link" required="required" value="{{ $value->instagram}}" />
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Youtube Link<span class="required text-danger">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" name="youtube" placeholder="Your Youtube Link" required="required" value="{{ $value->youtube }}" />
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Linked IN<span class="required text-danger">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" name="linkedin" placeholder="Your Linked Link" required="required" value="{{ $value->linkedin }}"/>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Whatsapp<span class="required text-danger">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" name="whatsapp" placeholder="Your Linked Link" required="required" value="{{ $value->whatsapp }}"/>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Twitter<span class="required text-danger">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" name="twitter" placeholder="Your Linked Link" required="required" value="{{ $value->twitter }}"/>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Map Link<span class="required text-danger">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <textarea class="form-control" type="text" name="map" placeholder="Your Map Link" required="required">{{ $value->map }}</textarea>
                    </div>
                </div>
                <div class="ln_solid">
                    <div class="form-group">
                        <div class="col-md-6 offset-md-3 mt-3">
                            <button type='submit' class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>





        <br/>
        <div class="x_title">
            <h2>Update Logos</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
        </div>
        <div class="x_content mt-3">
            <form action="{{ route('logo.update', $logo->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <span class="section">Personal Info</span>

                @include('backend.includes.message')


                <div class="col-12 mt-3">
                    <label>Logo <span class="required text-danger">*</span></label>
                    <br>
                    <input class="form-control" type="file" name="image" id="image" onchange="previewImage(this,'image_preview')"/>
                    <br>
                    <img class="img-fluid" id="image_preview" src="{{ getImageUrl($logo_value->image) }}"
                        alt="Profile Image" accept="image/png, image/jpeg" width="300px" height="60px">
                </div>
                <div class="col-12 mt-3">
                    <label>Favicon <span class="required text-danger">*</span></label>
                    <br>
                    <input class="form-control" type="file" name="favicon" id="favicon" onchange="previewImage(this,'favicon_preview')"/>
                    <br>
                    <img class="img-fluid" id="favicon_preview" src="{{ getImageUrl($logo_value->favicon) }}"
                        alt="Favicon Image" accept="image/png, image/jpeg" width="64px" height="64px">
                </div>
                <div class="ln_solid">
                    <div class="form-group">
                        <div class="col-md-6 offset-md-3 mt-3">
                            <button type='submit' class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')

@endpush
@endsection
