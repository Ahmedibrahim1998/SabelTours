@extends('admin.layouts.master')

@section('title')
    {{ __('trips_trans.trip_details') }} #{{ $trip->id }}
@endsection

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ __('trips_trans.trip_details') }} #{{ $trip->id }}</h5>
            <a href="{{ route('trips.index') }}" class="btn btn-light btn-sm">
                <i class="fa fa-arrow-left"></i> {{ __('trips_trans.back') }}
            </a>
        </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>{{ __('trips_trans.first_name') }}:</strong>
                    <p>{{ $trip->first_name }}</p>
                </div>
                <div class="col-md-4">
                    <strong>{{ __('trips_trans.last_name') }}:</strong>
                    <p>{{ $trip->last_name }}</p>
                </div>
                <div class="col-md-4">
                    <strong>{{ __('trips_trans.gender') }}:</strong>
                    <p>{{ __('trips_trans.' . $trip->gender) }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>{{ __('trips_trans.email') }}:</strong>
                    <p>{{ $trip->email }}</p>
                </div>
                <div class="col-md-6">
                    <strong>{{ __('trips_trans.phone') }}:</strong>
                    <p>{{ $trip->phone }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>{{ __('trips_trans.travel_date') }}:</strong>
                    <p>{{ $trip->travel_date }}</p>
                </div>
                <div class="col-md-3">
                    <strong>{{ __('trips_trans.adults_count') }}:</strong>
                    <p>{{ $trip->adults_count }}</p>
                </div>
                <div class="col-md-3">
                    <strong>{{ __('trips_trans.children_count') }}:</strong>
                    <p>{{ $trip->children_count }}</p>
                </div>
            </div>

            @if($trip->message)
                <div class="mb-3">
                    <strong>{{ __('trips_trans.message') }}:</strong>
                    <p>{{ $trip->message }}</p>
                </div>
            @endif
        </div>
    </div>
@endsection
