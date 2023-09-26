@extends('layouts.backend')
@section('title', 'Home Page')
@section('css')
    <link href="{{ asset('backend/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<form action="{{ route('pages.update', $data['service']->id) }}" method="POST">
    @csrf

   <span class="section">Home Page Info</span>
    @include('backend.includes.message')
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Section One</label>
        <div class="col-md-6 col-sm-6">
            <select name="section_one" class="form-control" value="{{ old('section_one') }}">
                <option value="">Empty</option>
                @foreach ($data['offers'] as $offer)
                    <option value="{{$offer->id}}" {{ $offer->id == $data['value']->section_one ? 'selected' : '' }}>{{$offer->title}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Section Two</label>
        <div class="col-md-6 col-sm-6">
            <select name="section_two" class="form-control" value="{{ old('section_two') }}">
                <option value="">Empty</option>
                @foreach ($data['offers'] as $offer)
                    <option value="{{$offer->id}}" {{ $offer->id == $data['value']->section_two ? 'selected' : '' }}>{{$offer->title}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Section Three</label>
        <div class="col-md-6 col-sm-6">
            <select name="section_three" class="form-control" value="{{ old('section_three') }}">
                <option value="">Empty</option>
                @foreach ($data['offers'] as $offer)
                    <option value="{{$offer->id}}" {{ $offer->id == $data['value']->section_three ? 'selected' : '' }}>{{$offer->title}}</option>
                @endforeach
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

@push('scripts')
    <script src="{{ asset('backend/vendors/select2/dist/js/select2.full.min.js') }}"></script>
@endpush

@endsection
