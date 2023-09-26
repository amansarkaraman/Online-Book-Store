@extends('layouts.backend')
@section('title', 'brand Lists')
@section('css')
    <link href="{{ asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Brand</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li>
                <a class="btn btn-sm btn-success text-dark" href="{{route('brands.create') }}"><i class="fa fa-plus"></i> Add New</a>
            </li>
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
                                <th>Name</th>
                                <th>Slug</th>
                                <th>image </th>
                                <th>Status</th>
                                <th width="25%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $key => $brand)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>
                                    {{ $brand->slug }}
                                </td>
                                <td>
                                    <img class="img-fluid" src="{{ getImageUrl($brand->image) }}" alt="{{$brand->name}}" width="50px" width="70px" >
                                </td>
                                <td>
                                    <a href="{{ route('brands.status', $brand->id ) }}" class="btn btn-{{ $brand->status == 1 ? 'success' : ($brand->status == 3 ? 'danger disabled' : 'warning') }} btn-sm">{{\App\Enums\Status::from($brand->status)->title()}}</a>
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('brands.show', $brand->id) }}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-primary btn-sm" href="{{ route('brands.edit', $brand->id) }}"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('brands.destroy', $brand->id ) }}" class="btn btn-danger btn-sm {{$brand->status == 3 ? 'disabled' : ''}}"  onclick="showDeleteConfirmation()"><i class="fa fa-trash"></i></a>
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
