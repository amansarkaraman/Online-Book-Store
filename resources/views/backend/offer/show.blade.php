@extends('layouts.backend')

@section('title', 'Offer Details')
@section('content')

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Offer Details</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="btn btn-warning btn-dark btn-small text-dark" href="{{ route('offer.index') }}"> Back</a></li>
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
        </div>

        <div class="x_content">
                <span class="section">Offer Details</span>

                @include('backend.includes.message')

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Title<span class="required text-danger">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="title" placeholder="Title" readonly value="{{ $offer->title }}" />
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Description</label>
                    <div class="col-md-6 col-sm-6">
                        <textarea class="form-control" placeholder="Description" name="description" readonly cols="30" rows="10">{{ $offer->description }}</textarea>
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
                            <input type='text' name="offer_start" class="form-control" placeholder="Offer Start Date" required value="{{ $startFormatted }}" readonly/>
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
                            <input type='text' name="offer_end" class="form-control" required value="{{ old('offer_end', $startFormatted) }}" readonly/>
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Button Name</label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="button_name" readonly value="{{ $offer->button_name }}"/>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Button Url</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" name="button_url" readonly value="{{ $offer->button_url }}" />
                        </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Meta Image</label>
                    <div class="col-md-6 col-sm-6">
                        <img class="img-fluid" id="image_preview" src="{{ getImageUrl($offer->image) }}"
                            alt="Profile Image" accept="image/png, image/jpeg" width="400px" height="209px">
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Offered Product</label>
                    <div class="col-md-6 col-sm-6">
                        @if ($offer->product_ids)
                        <ul>
                            @foreach(json_decode($offer->product_ids) as $product)
                                <li>{{ \App\Models\Product::find($product)->name }}</li>
                            @endforeach
                        </ul>
                        @else
                            <label for="">No products found</label>
                        @endif
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Status</label>
                    <div class="col-md-6 col-sm-6 mt-1">
                        <strong>{{\App\Enums\Status::from($offer->status)->title()}}</strong>
                    </div>
                </div>


                <div class="ln_solid">
                    <div class="form-group">
                        <div class="col-md-6 offset-md-3 mt-3">
                            <a class="btn btn-primary btn-sm" href="{{ route('offer.edit', $offer->id) }}"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('offer.destroy', $offer->id ) }}" class="btn btn-danger btn-sm {{$offer->status == 3 ? 'disabled' : ''}}"  onclick="showDeleteConfirmation()"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'meta_description' );
    </script>
@endpush

<script>

</script>

@endsection
