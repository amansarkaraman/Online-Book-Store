@extends('layouts.backend')

@section('title', 'Edit Product')
@section('css')
    <link href="{{ asset('backend/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="{{ asset('backend/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">

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
        .tagsinput {
            min-height:38px !important;
            height:38px !important;
        }
    </style>
@endsection
@section('content')

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit Product</h2>
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
            <span class="section">Product Information</span>

            @include('backend.includes.message')
            <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                    <label>Name <span class="required text-danger">*</span></label>
                    <br>
                    <input class="form-control" name="name" required value="{{ old('name', $product->name) }}"/>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                    <label>Brand <span class="required text-danger">*</span></label>
                    <br>
                    <select name="brand_id" class="form-control" required value="{{ old('brand_id') }}">
                        <option value="">Choose Brand</option>
                        @foreach ($brands as $brand)
                            <option value="{{$brand->id}}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{$brand->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                    <label>Category <span class="required text-danger">*</span></label>
                    <br>
                    <select id="categorySelect" name="category_id" class="form-control" value="{{ old('category_id', $product->category_id) }}" required>
                        <option value="">Choose Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                    <label>Sub Category <span class="required text-danger">*</span></label>
                    <br>
                    <select name="sub_category_id" id="subcategorySelect" class="form-control" value="{{ old('sub_category_id', $product->sub_category_id) }}" required>
                    </select>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                    <label>Price <span class="required text-danger">*</span></label>
                    <br>
                    <input class="form-control" name="price" value="{{ old('price', $product->price) }}"/>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                    <label>Discount</label>
                    <br>
                    <input type="number" class="form-control" name="discount" value="{{ old('discount', $product->discount) }}"/>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                    <label>Discount Type</label>
                    <br>
                    <select name="discount_type" class="form-control" value="{{ old('discount_type', $product->discount_type) }}">
                        <option value="">Choose Discount Type</option>
                        <option value="flat" {{ $product->discount_type == 'flat' ? 'selected' : '' }}>Flat</option>
                        <option value="percent" {{ $product->discount_type == 'percent' ? 'selected' : '' }}>Percent</option>
                    </select>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                    <label>Discount Start</label>
                    <div class="form-group">
                        <div class='input-group date' id='myDatepicker'>
                            @php
                                $start = null;
                                if ($product->discount_start) {
                                    try {
                                        $start = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $product->discount_start);
                                    } catch (Exception $e) {
                                    }
                                }
                                $startFormatted = $start ? $start->format('m/d/Y g:i A') : '';
                            @endphp
                            <input type='text' name="discount_start" class="form-control" value="{{ old('discount_end', $startFormatted) }}" />
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                    <label>Discount End</label>
                    <div class="form-group">
                        <div class='input-group date' id='myDatepicker1'>

                            @php
                                $end = null;
                                if ($product->discount_end) {
                                    try {
                                        $end = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $product->discount_end);
                                    } catch (Exception $e) {
                                    }
                                }
                                $endFormatted = $end ? $end->format('m/d/Y g:i A') : '';
                            @endphp
                            <input type='text' name="discount_end" class="form-control" value="{{ old('discount_end', $endFormatted) }}"/>
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                    <label>Quantity</label>
                    <br>
                    <input class="form-control" disabled value="{{ old('quantity', $product->quantity) }}"/>
                </div>

                {{-- <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                    <label>Size <span class="required text-danger">*</span></label>
                    <br>
                    <input class="form-control" name="name" required value="{{ old('name', $product->sizes) }}"/>
                </div> --}}
                {{-- <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                    <label>Color <span class="required text-danger">*</span></label>
                    <br>
                    @php
                        $colorArray = explode(',', $product->colors);
                        $colorVal = implode(',', $colorArray);
                    @endphp
                    <input class="form-control" name="name" required value="{{ old('name', $colorVal) }}"/>
                </div> --}}
                <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                    <label>Color</label>
                    @php
                        $colorArray = explode(',', $product->colors);
                        $colorVal = implode(',', $colorArray);
                    @endphp
                    <br>
                    <input type="text" name="colors" placeholder="Tags" class="tags tags_1 form-control" value="{{ old('colors', $colorVal) }}" />
                    <div id="suggestions-container1" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                    <label>Size</label>
                    @php
                        $sizeArray = explode(',', $product->sizes);
                        $sizeVal = implode(',', $sizeArray);
                    @endphp
                    <br>
                    <input type="text" name="sizes" placeholder="Tags" class="tags tags_1 form-control" value="{{ old('sizes', $sizeVal) }}" />
                    <div id="suggestions-container1" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                </div>
                <div class="col-12">
                    <label>Tags</label>
                    @php
                        $tagsArray = explode(',', $product->tags);
                        $tagsValue = implode(',', $tagsArray);
                    @endphp
                    <br>
                    <input type="text" name="tags" placeholder="Tags" class="tags_1 tags form-control" value="{{ old('tags', $tagsValue) }}" />
                    <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                </div>
                <div class="row mt-5">
                    <div class="col-sm-12 col-md-6 col-lg-8">
                        <div class="row">
                            <div class="col-12 mt-3">
                                <label>Description</label>
                                <br>
                                <textarea class="form-control" name="description" cols="30" rows="10">{{ old('description', $product->description) }}</textarea>
                            </div>
                            <div class="col-12 mt-3">
                                <label>Image <span class="required text-danger">*</span></label>
                                <br>
                                <input class="form-control" type="file" name="image" id="image" onchange="previewImage(this,'image_preview')" value="{{ old('image', $product->image) }}"/>
                                <br>
                                <img class="img-fluid" id="image_preview" src="{{ getImageUrl($product->image) }}"
                                    alt="Profile Image" accept="image/png, image/jpeg" width="200px" height="250px">
                            </div>
                            <div class="col-12 mt-3">
                                <label>Thumbnail <span class="required text-danger">*</span></label>
                                <br>
                                <input class="form-control" type="file" name="thumbnail" id="thumbnail" onchange="previewImage(this,'thumbnail_preview')" value="{{ old('thumbnail') }}"/>
                                <br>
                                <img class="img-fluid" id="thumbnail_preview" src="{{ getImageUrl($product->thumbnail) }}"
                                    alt="Profile Image" accept="image/png, image/jpeg" width="200px" height="250px">
                            </div>
                            <div class="col-12">
                                    <button type='submit' class="btn btn-warning mt-3">Product Update</button>
                                </form>
                            </div>

                            <div class="col-12 mt-3">
                                <form action="{{route('products.image.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                     <span class="section ml-3">Gallery</span>
                                            <p class="h6 text-success p-1 font-weight-bold" id="messageDiv"></p>
                                            <label>Upload Image</label>
                                            <br>
                                            @if ($product->images)
                                                @foreach ($product->images as $image)
                                                    <div class="col-sm-6 col-md-3 col-lg-2 my-2">
                                                        <div style="position: relative;">
                                                            <img class="img-fluid" src="{{ getImageUrl($image->image) }}" alt="{{$product->name}}" height="280px" width="200px">
                                                            <a class="btn btn-danger btn-sm text-white deleteImageBtn" href="{{ route('products.image.delete', $image->id) }}" style="position: absolute; top: 5%; left: 70%; transform: translate(-10%, -10%);">x</a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <input class="form-control" type="file" name="gallery[]" id="imageInput" multiple accept="image/*"/>
                                            <br>
                                        </div>
                                        <div class="col-12">
                                            <div id="imagePreview"></div>
                                            <button type='submit' class="btn btn-warning">Gallery Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <form action="{{route('products.meta.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf

                            <span class="section ml-3">Meta</span>
                            <div class="mt-3">
                                <label>Meta Title</label>
                                <br>
                                <input class="form-control" name="meta_title" placeholder="Meta Title" value="{{ old('meta_title', $product->meta_title) }}"/>
                            </div>
                            <div class="mt-3">
                                <label>Meta Image</label>
                                <br>
                                <input class="form-control" type="file" name="meta_image" id="meta_image" onchange="previewImage(this,'meta_image_preview')" value="{{ old('meta_image', $product->meta_image) }}"/>
                                <br>
                                <img class="img-fluid" id="meta_image_preview" src="{{ getImageUrl($product->meta_image) }}"
                                    alt="Profile Image" accept="image/png, image/jpeg" width="400px" height="210px">
                            </div>
                            <div class="mt-3">
                                <label>Meta Description</label>
                                <br>
                                <textarea class="form-control" name="meta_description" cols="30" rows="10">{{ old('meta_description', $product->meta_description) }}</textarea>
                            </div>
                            <div class="mt-3">
                                <button type='submit' class="btn btn-warning">Meta Update</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script src="{{ asset('backend/vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/moment/min/moment.min.js') }}"></script>
	<script src="{{ asset('backend/vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
    <script src="{{ asset('backend/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".tags").tagsInput();
        });

        $(function () {
            $('#myDatepicker').datetimepicker();
        });
        $(function () {
            $('#myDatepicker1').datetimepicker();
        });
        CKEDITOR.replace( 'meta_description' );
        CKEDITOR.replace( 'description' );

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

    <script>
        // JavaScript for image preview and delete
        document.getElementById("imageInput").addEventListener("change", function(e) {
            const previewContainer = document.getElementById("imagePreview");
            previewContainer.innerHTML = ""; // Clear previous previews

            const files = e.target.files;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function(event) {
                    const img = document.createElement("img");
                    img.src = event.target.result;

                    const deleteBtn = document.createElement("button");
                    deleteBtn.textContent = "x";
                    deleteBtn.className = "delete-btn";
                    deleteBtn.addEventListener("click", function() {
                        previewContainer.removeChild(container);
                    });

                    const container = document.createElement("div");
                    container.className = "image-container";
                    container.appendChild(img);
                    container.appendChild(deleteBtn);

                    previewContainer.appendChild(container);
                };

                reader.readAsDataURL(file);
            }
        });

        $(document).ready(function() {
            const subcategorySelect = $('#subcategorySelect');
            let selectedSubcategoryId = "{{ old('sub_category_id', $product->sub_category_id) }}"; // Save the initially selected subcategory

            $('#categorySelect').on('change', function() {
                const categoryId = $(this).val();
                if (categoryId !== '') {
                    subcategorySelect.empty();

                    $.ajax({
                        url: `/admin/products/get/subcategories/${categoryId}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            const subcategories = response;
                            if (Object.keys(subcategories).length > 0) {
                                subcategorySelect.append('<option value="">Select a Subcategory</option>');

                                for (const subcategoryId in subcategories) {
                                    const subcategory = subcategories[subcategoryId];
                                    subcategorySelect.append(`<option value="${subcategory.id}" ${selectedSubcategoryId == subcategory.id ? 'selected' : ''}>${subcategory.name}</option>`);
                                }
                            } else {
                                subcategorySelect.append('<option value="">No subcategories found.</option>');
                            }
                        },
                        error: function(error) {
                            console.log(error.responseText);
                        }
                    });
                } else {
                    subcategorySelect.empty();
                }
            });

            $('#categorySelect').trigger('change');
        });

        $(document).ready(function() {
            $('.deleteImageBtn').click(function(event) {
                event.preventDefault();
                var deleteUrl = $(this).attr('href');

                $.ajax({
                    url: deleteUrl,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // Find the parent div and remove it
                        $(event.target).closest('.col-sm-6').remove();
                        // Display the success message
                        $('#messageDiv').text(response.message).show();
                    },
                    error: function(xhr) {
                        alert(xhr.responseJSON.message);
                    }
                });
            });
        });
    </script>

@endpush
@endsection
