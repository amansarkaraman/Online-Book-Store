@extends('layouts.backend')

@section('title', 'Show order')
@section('content')

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Show order <small><a class="btn btn-warning" href="{{ route('orders.index') }}"> Back</a></small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <span class="section">Order</span>

            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <h2>Billing Adress Details <small></small></h2>
                <tr>
                    <th>Adress</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Adress</th>
                    <th>Appartment</th>
                    <th>City</th>
                    <th>Post Code</th>
                    <th>Country</th>
                    <th>Note</th>

                </tr>
                <tbody>
                    <th>{{  $order->billing->address }}</th>
                    <th>{{  $order->billing->first_name }}</th>
                    <th>{{  $order->billing->last_name }}</th>
                    <th>{{  $order->billing->email }}</th>
                    <th>{{  $order->billing->phone }}</th>
                    <th>{{  $order->billing->address }}</th>
                    <th>{{  $order->billing->appartment }}</th>
                    <th>{{  $order->billing->city }}</th>
                    <th>{{  $order->billing->post_code }}</th>
                    <th>{{  $order->billing->country }}</th>
                    <th>{{  $order->billing->note }}</th>
                </tbody>


            </table>
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <h2>Product Details <small></small></h2>
                <tr>
                    <th>Name</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Sub Total</th>

                </tr>


                <tbody>
                    @foreach ($order->products as $key => $product)
                    <tr>
                        <td>{{ $product->product->name }}</td>
                        <td>{{ $product->product->size }}</td>
                        <td>{{ $product->product->color }}</td>
                        <td>{{ $product->product->quantity }}</td>
                        <td>{{ $product->product->price }}</td>
                        <td>{{ $product->product->discount }}</td>
                        <td>{{ $product->product->sub_total}}</td>
                    </tr>
                    @endforeach

                </tbody>

            </table>

            {{-- <div class="field item form-group">
                <label class="col-form-label col-md-3 col-sm-3  label-align">Meta Title</label>
                <div class="col-md-6 col-sm-6">
                    <input class="form-control" disabled value="{{ $order->meta_title }}"/>
                </div>
            </div> --}}


            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

            </table>

        </div>
    </div>
</div>

@endsection
