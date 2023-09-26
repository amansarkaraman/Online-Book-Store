@extends('layouts.backend')

@section('title', 'Product Details')
@section('css')

    <style>
        .image-container {
            position: relative;
            display: inline-block;
            margin: 5px;
        }

        .image-container img {
            width: 150px; /* Set your desired width */
            height: 200px; /* Set your desired height */
        }

        .image-container .delete-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
        }

        #tags_1_tagsinput {
            min-height:38px !important;
            height:38px !important;
        }
    </style>
@endsection
@section('content')

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Product Details</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="btn btn-warning" href="{{ route('products.index') }}"> Back</a>
                </li>
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
        </div>
        <div class="x_content">
                <span class="section">Product</span>

                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Name <span class="required text-danger">*</span></label>
                        <br>
                        <input class="form-control" readonly value="{{ $product->name }}"/>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Category <span class="required text-danger">*</span></label>
                        <br>
                        <input class="form-control" readonly value="{{ $product->category->name }}"/>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Sub Category <span class="required text-danger">*</span></label>
                        <br>
                        <input class="form-control" readonly value="{{ $product->sub_category->name }}"/>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Price <span class="required text-danger">*</span></label>
                        <br>
                        <input class="form-control" readonly value="{{ $product->price }}"/>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Discount</label>
                        <br>
                        <input class="form-control" readonly value="{{ $product->discount }}"/>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Discount Type</label>
                        <br>
                        <input class="form-control" readonly value="{{ $product->discount_type }}"/>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Discount Start</label>
                        <br>
                        <input class="form-control" readonly value="{{ $product->discount_start }}"/>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Discount End</label>
                        <br>
                        <input class="form-control" readonly value="{{ $product->discount_end }}"/>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Quantity <span class="required text-danger">*</span></label>
                        <br>
                        <input class="form-control" readonly value="{{ $product->quantity }}"/>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-9 mt-3">
                        <label>Tags</label>
                        <br>
                        @php
                            $tagsArray = explode(',', $product->tags);
                            $tagsValue = implode(',', $tagsArray);
                        @endphp
                        @foreach ($tagsArray as $item)
                        <span class="h6">
                            <span class="badge badge-success">{{ $item }}</span>
                        </span>
                    @endforeach
                        
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Size <span class="required text-danger">*</span></label>
                        <br>
                        {{-- <input class="form-control" readonly value="{{ $product->sizes }}"/> --}}

                        @php
                        $sizeArray = explode(',', $product->sizes);
                       @endphp

                        @foreach ($sizeArray as $item)
                        <span class="h6">
                            <span class="badge badge-success">{{ $item }}</span>
                        </span>
                    @endforeach

                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Color <span class="required text-danger">*</span></label>
                        <br>
                        @php
                            $colorArray = explode(',', $product->colors);
                        @endphp
                        @foreach ($colorArray as $item)
                            <span class="h6">
                                <span class="badge badge-success">{{ $item }}</span>
                            </span>
                        @endforeach
                    </div>
                    <div class="col-12 mt-3">
                        <label>Description</label>
                        <br>
                        {!! $product->description !!}
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Image <span class="required text-danger">*</span></label>
                        <br>
                        <img class="img-fluid" id="image_preview" src="{{ getImageUrl($product->image) }}"
                            alt="Image Image" accept="image/png, image/jpeg" width="200px" height="250px">
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Thumbnail Image</label>
                        <br>
                        <img class="img-fluid" id="thumbnail_image_preview" src="{{ getImageUrl($product->thumbnail) }}"
                            alt="Thumbnail Image" accept="image/png, image/jpeg" width="200px" height="250px">
                    </div>
                </div>

                <div class="row mt-5">
                    <span class="section ml-3">Meta</span>
                    <div class="col-sm-12 col-md-6 col-lg-3 mt-3">
                        <label>Meta Title</label>
                        <br>
                        <input class="form-control" readonly value="{{ $product->meta_title }}"/>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3 mt-3">
                        <label>Meta Image</label>
                        <br>
                        <img class="img-fluid" id="meta_image_preview" src="{{ getImageUrl($product->meta_image) }}"
                            alt="Profile Image" accept="image/png, image/jpeg" width="400px" height="210px">
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 mt-3">
                        <label>Meta Description</label>
                        <br>
                        {!! $product->meta_description !!}
                    </div>
                </div>

                <div class="row my-5">
                    <span class="section ml-3">Gallery</span>
                    @foreach ($product->images as $image)
                        <div class="col-sm-6 col-md-3 col-lg-2">
                            <img class="img-fluid" src="{{ getImageUrl($image->image) }}" alt="{{$product->name}}" height="280px" width="200px">
                        </div>
                    @endforeach
                </div>

                <div class="ln_solid">
                    <div class="form-group">
                        <div class="col-md-6 offset-md-3 mt-3">
                            <a href="{{ route('products.status', $product->id ) }}" class="btn btn-{{ $product->status == 1 ? 'success' : ($product->status == 3 ? 'danger disabled' : 'warning') }} btn-sm">{{\App\Enums\Status::from($product->status)->title()}}</a>
                            <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $product->id) }}"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('products.destroy', $product->id ) }}" class="btn btn-danger btn-sm {{$product->status == 3 ? 'disabled' : ''}}"  onclick="showDeleteConfirmation()"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('backend/vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
@endpush
@endsection
