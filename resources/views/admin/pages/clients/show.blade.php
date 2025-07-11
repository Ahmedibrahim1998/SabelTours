@extends('admin.layouts.master')

@section('title')
    {{ trans('clients_trans.clients') }} - {{ $client->getLocalizedName(app()->getLocale()) }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center font-weight-bold">
            <div class="col-md-10">
                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="fas fa-user"></i> {{ trans('clients_trans.clients') }}
                        </h5>
                        <a href="{{ route('clients.index') }}" class="btn btn-light btn-sm">
                            <i class="fa fa-arrow-left"></i> {{ __('Back') }}
                        </a>
                    </div>
                    <div class="card-body">
                        <!-- Basic Info -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6 class="text-muted">{{ trans('clients_trans.name_' . app()->getLocale()) }}</h6>
                                <p class="text-dark">{{ $client->getLocalizedName(app()->getLocale()) }}</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-muted">{{ trans('clients_trans.date') }}</h6>
                                <p class="text-dark">{{ $client->date }}</p>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <h6 class="text-muted">{{ trans('clients_trans.description_' . app()->getLocale()) }}</h6>
                            <p class="text-dark">{{ $client->getLocalizedDescription(app()->getLocale()) }}</p>
                        </div>

                        <!-- Image -->
                        <div class="mb-4 text-center">
                            <h6 class="text-muted">{{ trans('clients_trans.image') }}</h6>
                            @php
                                // تحقق إذا كان الرابط خارجي، وإذا لم يكن كذلك أضف /public/ في المسار
                                $imageSrc = Illuminate\Support\Str::startsWith($client->image, ['http://', 'https://'])
                                    ? $client->image
                                    : asset('public/' . ltrim($client->image, '/'));
                            @endphp
                            @if($client->image)
                                <img src="{{ $imageSrc }}" height="200" class="img-thumbnail rounded" alt="Client Image">
                            @else
                                <p class="text-muted">-</p>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
