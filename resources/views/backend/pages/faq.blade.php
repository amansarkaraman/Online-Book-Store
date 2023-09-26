@extends('layouts.backend')
@section('content')
<form action="{{ route('pages.update', $service->id) }}" method="POST">
    @csrf
   <span class="section">Faq Info</span>
    @include('backend.includes.message')
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Faq's<span class="required text-danger">*</span></label>
        <div class="col-md-6 col-sm-6">
            <textarea class="form-control" name="value" cols="30" rows="5">{!! $value !!}</textarea>
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
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'value' );
</script>
@endpush

@endsection
