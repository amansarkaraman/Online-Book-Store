@extends('layouts.backend')
@section('title', 'order Lists')
@section('css')
    <link href="{{ asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>All Order List <small></small></h2>
        <ul class="nav navbar-right panel_toolbox">
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
                                <th>Customer Name</th>
                                <th>Shipping Area</th>
                                <th>Shipping Charge</th>
                                <th>Discount</th>
                                <th>Coupon</th>
                                <th>Products Price</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th width="25%">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key => $order)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->shipping_area }}</td>
                                <td>{{ $order->shipping_charge }}</td>
                                <td>{{ $order->discount }}</td>
                                <td>{{ $order->coupon }}</td>
                                <td>{{ $order->products_price }}</td>
                                <td>{{ $order->total }}</td>


                                <td>
                                    <a href="#" class="btn btn-{{ $order->status == 1 ? 'success' : ($order->status == 3 ? 'danger disabled' : 'warning') }} btn-sm">{{\App\Enums\OrderStatus::from($order->status)->title()}}</a>
                                </td>

                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('orders.show', $order->id) }}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-primary btn-sm" href="{{ route('categories.edit', $order->id) }}"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('categories.destroy', $order->id ) }}" class="btn btn-danger btn-sm {{$order->status == 3 ? 'disabled' : ''}}"  onclick="showDeleteConfirmation()"><i class="fa fa-trash"></i></a>
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
