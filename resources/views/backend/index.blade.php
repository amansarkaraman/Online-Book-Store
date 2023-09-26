@extends('layouts.backend')
@section('title', 'Dashboard')
@section('content')
    <!-- top tiles -->
    <div class="row" style="display: inline-block;">
        <div class="tile_count">
            <div class="col-md-3 col-sm-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
                <div class="count">{{ $data['product'] }}</div>

            </div>
            <div class="col-md-3 col-sm-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> Total Order</span>
                <div class="count">{{ $data['orderCount'] }}</div>

            </div>
            <div class="col-md-3 col-sm-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Product category</span>
                <div class="count green">{{ $data['catagory'] }}</div>

            </div>
            <div class="col-md-3 col-sm-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Product brand</span>
                <div class="count">{{ $data['brand']  }}</div>

            </div>
        </div>
    </div>
@endsection
