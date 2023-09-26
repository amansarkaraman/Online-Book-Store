@extends('layouts.backend')

@section('title', 'Create Product')
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
            <h2>Create Product</h2>
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
            <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <span class="section">Product</span>

                @include('backend.includes.message')

                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Name <span class="required text-danger">*</span></label>
                        <br>
                        <input class="form-control" name="name" placeholder="Name" required value="{{ old('name') }}"/>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Brand <span class="required text-danger">*</span></label>
                        <br>
                        <select name="brand_id" class="form-control" required value="{{ old('brand_id') }}">
                            <option value="">Choose Brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Category <span class="required text-danger">*</span></label>
                        <br>
                        <select id="categorySelect" name="category_id" class="form-control" required value="{{ old('category_id') }}">
                            <option value="">Choose Category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Sub Category <span class="required text-danger">*</span></label>
                        <br>
                        <select name="sub_category_id" id="subcategorySelect" class="form-control" required value="{{ old('sub_category_id') }}">
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Price <span class="required text-danger">*</span></label>
                        <br>
                        <input class="form-control" name="price" placeholder="Price" value="{{ old('price') }}"/>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Discount</label>
                        <br>
                        <input class="form-control" type="number" name="discount" placeholder="Discount" value="{{ old('discount') }}"/>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Discount Type</label>
                        <br>
                        <select name="discount_type" class="form-control" value="{{ old('discount_type') }}">
                            <option value="">Choose Discount Type</option>
                            <option value="flat">Flat</option>
                            <option value="percent">Percent</option>
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Discount Start</label>
                        <div class="form-group">
                            <div class='input-group date' id='start'>
                                <input type='text' name="discount_start" class="form-control" placeholder="Discount Start Date" />
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Discount End</label>
                        <div class="form-group">
                            <div class='input-group date' id='end'>
                                <input type='text' name="discount_end" class="form-control" placeholder="Discount End Date" />
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Quantity <span class="required text-danger">*</span></label>
                        <br>
                        <input class="form-control" name="quantity" placeholder="Quantity" value="{{ old('quantity') }}"/>
                    </div>

                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Color</label>
                        <br>
                        <input type="text" name="colors" placeholder="Colors" class="tags tags_1 form-control" value="{{ old('colors') }}" />
                        <div id="suggestions-container1" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3 mt-3">
                        <label>Size</label>
                        <br>
                        <input type="text" name="sizes" placeholder="Tags" class="tags tags_1 form-control" value="{{ old('sizes') }}" />
                        <div id="suggestions-container1" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                    </div>
                    <div class="col-12">
                        <label>Tags</label>
                        <br>
                        <input type="text" name="tags" placeholder="Tags" class="tags_1 tags form-control" value="{{ old('tags') }}" />
                        <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-sm-12 col-md-6 col-lg-8">
                        <div class="row">
                            <div class="col-12 mt-3">
                                <label>Description</label>
                                <br>
                                <textarea class="form-control" name="description" cols="30" rows="10">{{ old('description') }}</textarea>
                            </div>
                            <div class="col-12 mt-3">
                                <label>Image <span class="required text-danger">*</span></label>
                                <br>
                                <input class="form-control" type="file" name="image" id="image" onchange="previewImage(this,'image_preview')" value="{{ old('image') }}"/>
                                <br>
                                <img class="img-fluid" id="image_preview" src="{{ getImageUrl('') }}"
                                    alt="Profile Image" accept="image/png, image/jpeg" width="200px" height="250px">
                            </div>
                            <div class="col-12 mt-3">
                                <label>Thumbnail<span class="required text-danger">*</span></label>
                                <br>
                                <input class="form-control" type="file" name="thumbnail" id="thumbnail" onchange="previewImage(this,'thumbnail_preview')" value="{{ old('thumbnail') }}"/>
                                <br>
                                <img class="img-fluid" id="thumbnail_preview" src="{{ getImageUrl('') }}"
                                    alt="Profile Image" accept="image/png, image/jpeg" width="200px" height="250px">
                            </div>
                            <div class="col-12 mt-3">
                                <span class="section ml-3">Gallery</span>
                                <div class="mt-3">
                                    <label>Upload Image</label>
                                    <br>
                                    <input class="form-control" type="file" name="gallery[]" id="imageInput" multiple accept="image/*"/>
                                    <br>
                                </div>
                                <div id="imagePreview"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <span class="section ml-3">Meta</span>
                        <div class="mt-3">
                            <label>Meta Title</label>
                            <br>
                            <input class="form-control" name="meta_title" placeholder="Meta Title" value="{{ old('meta_title') }}"/>
                        </div>
                        <div class="mt-3">
                            <label>Meta Image</label>
                            <br>
                            <input class="form-control" type="file" name="meta_image" id="meta_image" onchange="previewImage(this,'meta_image_preview')" value="{{ old('meta_image') }}"/>
                            <br>
                            <img class="img-fluid" id="meta_image_preview" src="{{ getImageUrl('') }}"
                                alt="Profile Image" accept="image/png, image/jpeg" width="400px" height="210px">
                        </div>
                        <div class="mt-3">
                            <label>Meta Description</label>
                            <br>
                            <textarea class="form-control" name="meta_description" cols="30" rows="10">{{ old('meta_description') }}</textarea>
                        </div>
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
    <script src="{{ asset('backend/vendors/moment/min/moment.min.js') }}"></script>
	<script src="{{ asset('backend/vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
    <script src="{{ asset('backend/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function () {
            $('#start').datetimepicker();
        });

        $(function () {
            $('#end').datetimepicker();
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
            $('#categorySelect').on('change', function() {
                const categoryId = $(this).val();
                const subcategorySelect = $('#subcategorySelect');

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
                                    console.log(subcategory.name);
                                    subcategorySelect.append(`<option value="${subcategory.id}">${subcategory.name}</option>`);
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
        });
    </script>
@endpush
@endsection
