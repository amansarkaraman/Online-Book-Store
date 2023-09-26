@extends('layouts.backend')

@section('title', 'Edit Offer')
@section('css')
    <link href="{{ asset('backend/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit Offer </h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="btn btn-warning btn-small text-dark" href="{{ route('offer.index') }}"> Back</a></li>
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
        </div>

        <div class="x_content">
            <form action="{{ route('offer.update', $offer->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <span class="section">Edit Offer</span>

                @include('backend.includes.message')

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Title<span class="required text-danger">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="title" placeholder="Title" value="{{ $offer->title }}" />
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Description</label>
                    <div class="col-md-6 col-sm-6">
                        <textarea class="form-control" placeholder="Description" name="description" cols="30" rows="10">{{ $offer->description }}</textarea>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Offer Start</label>
                    <div class="col-md-6 col-sm-6">
                        <div class='input-group date' id='start'>
                            @php
                                $start = null;
                                if ($offer->offer_start) {
                                    try {
                                        $start = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $offer->offer_start);
                                    } catch (Exception $e) {
                                    }
                                }
                                $startFormatted = $start ? $start->format('m/d/Y g:i A') : '';
                            @endphp
                            <input type='text' name="offer_start" class="form-control" placeholder="Offer Start Date" required value="{{ $startFormatted }}"/>
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Offer End</label>
                    <div class="col-md-6 col-sm-6">
                        <div class='input-group date' id='end'>
                            @php
                                $start = null;
                                if ($offer->offer_end) {
                                    try {
                                        $start = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $offer->offer_end);
                                    } catch (Exception $e) {
                                    }
                                }
                                $startFormatted = $start ? $start->format('m/d/Y g:i A') : '';
                            @endphp
                            <input type='text' name="offer_end" class="form-control" required value="{{ old('offer_end', $startFormatted) }}"/>
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Button Name</label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="button_name" value="{{ $offer->button_name }}"/>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Button Url</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" name="button_url" value="{{ $offer->button_url }}" />
                        </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Meta Image</label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="file" name="image" id="" onchange="previewImage(this,'image_preview')" value="{{ old('image') }}"/>
                        <br>
                        <img class="img-fluid" id="image_preview" src="{{ getImageUrl($offer->image) }}"
                            alt="Profile Image" accept="image/png, image/jpeg" width="400px" height="209px">
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Offered Product</label>
                    <div class="col-md-6 col-sm-6">
                        <select name="product_ids[]" class="form-control js-example-basic-multiple" multiple>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" {{ $offer->product_ids && in_array($product->id, json_decode($offer->product_ids)) ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Status</label>
                    <div class="col-md-6 col-sm-6">
                        <select name="status" class="form-control" required>
                            <option value="1" {{$offer->status == 1 ? 'selected' : ''}}>Active</option>
                            <option value="2" {{$offer->status == 2 ? 'selected' : ''}}>Inactive</option>
                            <option value="3" {{$offer->status == 3 ? 'selected' : ''}}>Delete</option>
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
    <script src="{{ asset('backend/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>

    <script>
        $(function () {
            $('#start').datetimepicker();
        });

        $(function () {
            $('#end').datetimepicker();
        });

        CKEDITOR.replace( 'meta_description' );

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endpush

@endsection
