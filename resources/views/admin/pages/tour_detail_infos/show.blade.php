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
                    <h6 class="text-muted">{{ __('tour_details_trans.tour_detail') }}</h6>
                    <p>{{ $tourDetailInfo->tourDetail->getLocalizedName(app()->getLocale()) ?? '-' }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted">{{ __('tour_details_trans.price') }}</h6>
                    <p>{{ number_format($tourDetailInfo->price, 2) }}</p>
                </div>
            </div>

            <!-- From Month - متعدد اللغات -->
            <div class="row mb-4">
                <div class="col-12">
                    <h6 class="text-muted">{{ __('tour_details_trans.from_month') }}</h6>
                </div>
                <div class="col-md-2">
                    <strong>العربية:</strong><br>
                    <p>{{ $tourDetailInfo->from_month['ar'] ?? '-' }}</p>
                </div>
                <div class="col-md-2">
                    <strong>English:</strong><br>
                    <p>{{ $tourDetailInfo->from_month['en'] ?? '-' }}</p>
                </div>
                <div class="col-md-2">
                    <strong>Français:</strong><br>
                    <p>{{ $tourDetailInfo->from_month['fr'] ?? '-' }}</p>
                </div>
                <div class="col-md-2">
                    <strong>Español:</strong><br>
                    <p>{{ $tourDetailInfo->from_month['es'] ?? '-' }}</p>
                </div>
                <div class="col-md-2">
                    <strong>Italiano:</strong><br>
                    <p>{{ $tourDetailInfo->from_month['it'] ?? '-' }}</p>
                </div>
                <div class="col-md-2">
                    <strong>Deutsch:</strong><br>
                    <p>{{ $tourDetailInfo->from_month['de'] ?? '-' }}</p>
                </div>
            </div>

            <!-- To Month - متعدد اللغات -->
            <div class="row mb-4">
                <div class="col-12">
                    <h6 class="text-muted">{{ __('tour_details_trans.to_month') }}</h6>
                </div>
                <div class="col-md-2">
                    <strong>العربية:</strong><br>
                    <p>{{ $tourDetailInfo->to_month['ar'] ?? '-' }}</p>
                </div>
                <div class="col-md-2">
                    <strong>English:</strong><br>
                    <p>{{ $tourDetailInfo->to_month['en'] ?? '-' }}</p>
                </div>
                <div class="col-md-2">
                    <strong>Français:</strong><br>
                    <p>{{ $tourDetailInfo->to_month['fr'] ?? '-' }}</p>
                </div>
                <div class="col-md-2">
                    <strong>Español:</strong><br>
                    <p>{{ $tourDetailInfo->to_month['es'] ?? '-' }}</p>
                </div>
                <div class="col-md-2">
                    <strong>Italiano:</strong><br>
                    <p>{{ $tourDetailInfo->to_month['it'] ?? '-' }}</p>
                </div>
                <div class="col-md-2">
                    <strong>Deutsch:</strong><br>
                    <p>{{ $tourDetailInfo->to_month['de'] ?? '-' }}</p>
                </div>
            </div>

            <!-- Agenda - متعدد اللغات -->
            <div class="row mb-4">
                <div class="col-12">
                    <h6 class="text-muted">{{ __('tour_details_trans.agenda') }}</h6>
                </div>
                
                <!-- Morning -->
                <div class="col-12 mb-3">
                    <h6 class="text-primary">{{ __('tour_details_trans.morning') }}</h6>
                    <div class="row">
                        <div class="col-md-2">
                            <strong>العربية:</strong><br>
                            <p>{{ $tourDetailInfo->agenda['morning']['ar'] ?? '-' }}</p>
                        </div>
                        <div class="col-md-2">
                            <strong>English:</strong><br>
                            <p>{{ $tourDetailInfo->agenda['morning']['en'] ?? '-' }}</p>
                        </div>
                        <div class="col-md-2">
                            <strong>Français:</strong><br>
                            <p>{{ $tourDetailInfo->agenda['morning']['fr'] ?? '-' }}</p>
                        </div>
                        <div class="col-md-2">
                            <strong>Español:</strong><br>
                            <p>{{ $tourDetailInfo->agenda['morning']['es'] ?? '-' }}</p>
                        </div>
                        <div class="col-md-2">
                            <strong>Italiano:</strong><br>
                            <p>{{ $tourDetailInfo->agenda['morning']['it'] ?? '-' }}</p>
                        </div>
                        <div class="col-md-2">
                            <strong>Deutsch:</strong><br>
                            <p>{{ $tourDetailInfo->agenda['morning']['de'] ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Noon -->
                <div class="col-12 mb-3">
                    <h6 class="text-primary">{{ __('tour_details_trans.noon') }}</h6>
                    <div class="row">
                        <div class="col-md-2">
                            <strong>العربية:</strong><br>
                            <p>{{ $tourDetailInfo->agenda['noon']['ar'] ?? '-' }}</p>
                        </div>
                        <div class="col-md-2">
                            <strong>English:</strong><br>
                            <p>{{ $tourDetailInfo->agenda['noon']['en'] ?? '-' }}</p>
                        </div>
                        <div class="col-md-2">
                            <strong>Français:</strong><br>
                            <p>{{ $tourDetailInfo->agenda['noon']['fr'] ?? '-' }}</p>
                        </div>
                        <div class="col-md-2">
                            <strong>Español:</strong><br>
                            <p>{{ $tourDetailInfo->agenda['noon']['es'] ?? '-' }}</p>
                        </div>
                        <div class="col-md-2">
                            <strong>Italiano:</strong><br>
                            <p>{{ $tourDetailInfo->agenda['noon']['it'] ?? '-' }}</p>
                        </div>
                        <div class="col-md-2">
                            <strong>Deutsch:</strong><br>
                            <p>{{ $tourDetailInfo->agenda['noon']['de'] ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Evening -->
                <div class="col-12 mb-3">
                    <h6 class="text-primary">{{ __('tour_details_trans.evening') }}</h6>
                    <div class="row">
                        <div class="col-md-2">
                            <strong>العربية:</strong><br>
                            <p>{{ $tourDetailInfo->agenda['evening']['ar'] ?? '-' }}</p>
                        </div>
                        <div class="col-md-2">
                            <strong>English:</strong><br>
                            <p>{{ $tourDetailInfo->agenda['evening']['en'] ?? '-' }}</p>
                        </div>
                        <div class="col-md-2">
                            <strong>Français:</strong><br>
                            <p>{{ $tourDetailInfo->agenda['evening']['fr'] ?? '-' }}</p>
                        </div>
                        <div class="col-md-2">
                            <strong>Español:</strong><br>
                            <p>{{ $tourDetailInfo->agenda['evening']['es'] ?? '-' }}</p>
                        </div>
                        <div class="col-md-2">
                            <strong>Italiano:</strong><br>
                            <p>{{ $tourDetailInfo->agenda['evening']['it'] ?? '-' }}</p>
                        </div>
                        <div class="col-md-2">
                            <strong>Deutsch:</strong><br>
                            <p>{{ $tourDetailInfo->agenda['evening']['de'] ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
