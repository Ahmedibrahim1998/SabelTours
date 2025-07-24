@extends('admin.layouts.master')

@section('title')
    {{ __('tour_details_trans.tour_details_info') }}
@endsection

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">{{ __('tour_details_trans.tour_details_info') }} #{{ $tourDetailInfo->id }}</h4>
            <a href="{{ route('tour_detail_infos.index') }}" class="btn btn-light btn-sm">
                <i class="fa fa-arrow-left"></i> {{ __('tours_trans.back') }}
            </a>
        </div>

        <div class="card-body">
            <div class="row mb-4">

                <div class="col-md-6">
                    <h6 class="text-muted">{{ __('tour_details_trans.price') }}</h6>
                    <p>{{ number_format($tourDetailInfo->price, 2) }}</p>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <h6 class="text-muted">{{ __('tour_details_trans.from_month') }}</h6>
                    <p>{{ $tourDetailInfo->from_month ?? '-' }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted">{{ __('tour_details_trans.to_month') }}</h6>
                    <p>{{ $tourDetailInfo->to_month ?? '-' }}</p>
                </div>
            </div>

        </div>
    </div>
@endsection
