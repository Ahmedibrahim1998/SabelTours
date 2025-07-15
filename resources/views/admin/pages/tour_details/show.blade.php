@extends('admin.layouts.master')

@section('title')
    {{ __('tour_details_trans.tour_details') }}
@endsection

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">{{ __('tour_details_trans.tour_details') }} #{{ $tourDetail->id }}</h4>
            <a href="{{ route('tour_details.index') }}" class="btn btn-light btn-sm">
                <i class="fa fa-arrow-left"></i> {{ __('tours_trans.back') }}
            </a>
        </div>

        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h6 class="text-muted">{{ __('tour_details_trans.tour') }}</h6>
                    <p>{{ $tourDetail->tour->getLocalizedName(app()->getLocale()) ?? '-' }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted">{{ __('tour_details_trans.sub_tour') }}</h6>
                    <p>{{ optional($tourDetail->subTour)->getLocalizedName(app()->getLocale()) ?? '-' }}</p>
                </div>
            </div>

            <div class="mb-4">
                <h6 class="text-muted">{{ __('tour_details_trans.description') }}</h6>
                <ul class="list-group">
                    @foreach($tourDetail->description as $lang => $value)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>{{ strtoupper($lang) }}:</strong> {{ $value }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="mb-4">
                <h6 class="text-muted">{{ __('tour_details_trans.image') }}</h6>
                @php
                    $imageSrc = Illuminate\Support\Str::startsWith($tourDetail->image, ['http://', 'https://'])
                        ? $tourDetail->image
                        : asset('public/' . ltrim($tourDetail->image, '/'));
                @endphp
                <img src="{{ $imageSrc }}" class="img-fluid rounded shadow-sm" width="300" alt="Tour Detail Image">
            </div>

            <div class="row text-center mb-4">
                <div class="col-md-3">
                    <h6 class="text-muted">{{ __('tour_details_trans.rate') }}</h6>
                    <p><span class="badge badge-warning">{{ $tourDetail->rate }}/5</span></p>
                </div>
                <div class="col-md-3">
                    <h6 class="text-muted">{{ __('tour_details_trans.from_month') }}</h6>
                    <p>{{ $tourDetail->from_month }}</p>
                </div>
                <div class="col-md-3">
                    <h6 class="text-muted">{{ __('tour_details_trans.to_month') }}</h6>
                    <p>{{ $tourDetail->to_month }}</p>
                </div>
                <div class="col-md-3">
                    <h6 class="text-muted">{{ __('tour_details_trans.price') }}</h6>
                    <p><strong>${{ $tourDetail->price }}</strong></p>
                </div>
            </div>

            @if($tourDetail->location)
                <div class="mb-4">
                    <h6 class="text-muted">{{ __('tour_details_trans.location') }}</h6>
                    <p>{{ $tourDetail->location }}</p>
                </div>
            @endif

            <div class="mb-4">
                <h6 class="text-muted">{{ __('tour_details_trans.agenda') }}</h6>
                <div class="row">
                    @foreach($tourDetail->getAgendaDetails() as $period => $data)
                        <div class="col-md-4 mb-3">
                            <div class="border rounded p-3 h-100">
                                <h6 class="text-primary">{{ __('tour_details_trans.' . $period) }}</h6>
                                <p>{{ $data['text'] }}</p>
                                @if(!empty($data['images']))
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach($data['images'] as $img)
                                            <img src="{{ $img }}" class="rounded shadow-sm" width="80" height="60" alt="agenda image">
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
