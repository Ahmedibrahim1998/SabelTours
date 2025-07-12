@extends('admin.layouts.master')
@section('title') {{ trans('place_details_trans.view') }} @endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('place-details.index') }}" class="btn btn-light btn-sm">{{ __('Back') }}</a>
        </div>
        <div class="card-body">
            <h5>{{ trans('place_details_trans.place') }}:</h5>
            <p>{{ $placeDetail->place->getLocalizedName(app()->getLocale()) }}</p>
            <hr>
            @foreach(['ar','en','fr','es','it','de'] as $loc)
                <h6>{{ trans('place_details_trans.long_description_'.$loc) }}</h6>
                <p>{{ $placeDetail->getLocalizedDescription($loc) }}</p>
            @endforeach

            {{-- الصور --}}
            <div class="row">
                <div class="col-md-6">
                    <label>{{ trans('place_details_trans.images') }}</label><br>
                    @if(!empty($placeDetail->images) && is_array($placeDetail->images))
                        @foreach($placeDetail->images as $img)
                            @php
                                $imageSrc = Illuminate\Support\Str::startsWith($img, ['http://', 'https://'])
                                    ? $img
                                    : asset('public/' . ltrim($img, '/'));
                            @endphp
                            <img src="{{ $imageSrc }}" height="100" class="mr-2 mb-2 rounded border">
                        @endforeach
                        <br>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
