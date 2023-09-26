{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}
@extends('layouts.backend')
@section('title', 'Dashboard')
@section('content')
    <!-- top tiles -->
    <div class="row" style="display: inline-block;">
        <div class="tile_count">
            <div class="col-md-3 col-sm-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
                {{-- <div class="count">{{ $data['product'] }}</div> --}}

            </div>
            <div class="col-md-3 col-sm-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> Total Order</span>
                {{-- <div class="count">{{ $data['orderCount'] }}</div> --}}

            </div>
            <div class="col-md-3 col-sm-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Product category</span>
                {{-- <div class="count green">{{ $data['catagory'] }}</div> --}}

            </div>
            <div class="col-md-3 col-sm-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Product brand</span>
                {{-- <div class="count">{{ $data['brand']  }}</div> --}}

            </div>
        </div>
    </div>
@endsection

{{-- </x-app-layout> --}}
