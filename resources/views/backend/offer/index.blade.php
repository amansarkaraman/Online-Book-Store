@extends('layouts.backend')
@section('title', 'Product Lists')
@section('css')
    <link href="{{ asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Offer</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="btn btn-sm btn-success btn-small text-dark" href="{{ route('offer.create') }}"><i class="fa fa-plus"></i> Add New</a>
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
        <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                    @include('backend.includes.message')
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Image</th>
                                <th>Offered Products</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offers as $key => $offer)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $offer->title }}</td>
                                <td>{{ $offer->offer_start }}</td>
                                <td>{{ $offer->offer_end }}</td>
                                <td>
                                    <img class="img-fluid" src="{{ getImageUrl($offer->image) }}" alt="{{$offer->title}}" width="50px" width="70px" >
                                </td>
                                <td>
                                    @if ($offer->product_ids)
                                    <ul>
                                        @foreach(json_decode($offer->product_ids) as $product)
                                            <li>{{ \App\Models\Product::find($product)->name }}</li>
                                        @endforeach
                                    </ul>
                                    @else
                                        <label for="">No products found</label>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{route('offer.status',$offer->id)}}" class="btn btn-{{ $offer->status == 1 ? 'success' : ($offer->status == 3 ? 'danger disabled' : 'warning') }} btn-sm">{{\App\Enums\Status::from($offer->status)->title()}}</a>


                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{route('offer.show', $offer->id) }}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-primary btn-sm" href="{{route('offer.edit', $offer->id) }}"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('offer.destroy',$offer->id) }}" class="btn btn-danger btn-sm {{$offer->status == 3 ? 'disabled' : ''}}"  onclick="showDeleteConfirmation()"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <!-- Datatables -->
    <script src="{{ asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>

@endpush
@endsection
