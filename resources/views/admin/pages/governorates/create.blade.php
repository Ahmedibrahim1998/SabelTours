@extends('admin.layouts.master')

@section('title')
    {{ trans('governorates_trans.add_governorate') }}
@stop

@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <form action="{{ route('governorates.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- الاسم بجميع اللغات --}}
                        <div class="row">
                            @foreach(['ar', 'en', 'fr', 'it', 'de', 'es'] as $locale)
                                <div class="col-md-6">
                                    <label>{{ __('governorates_trans.name_' . $locale) }}</label>
                                    <input type="text" name="name_{{ $locale }}" class="form-control" value="{{ old('name_' . $locale) }}">
                                    @error('name_'.$locale)
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>

                        <br>

                        {{-- عدد الأماكن --}}
                        <div class="row">
                            <div class="col-md-6">
                                <label>{{ __('governorates_trans.places_count') }}</label>
                                <input type="number" name="places_count" class="form-control" value="{{ old('places_count', 0) }}" min="0">
                                @error('places_count')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <br>

                        {{-- صورة --}}
                        <div class="row">
                            <div class="col-md-6">
                                <label>{{ __('governorates_trans.image') }}</label>
                                <input type="file" name="image" class="form-control">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label>{{ __('governorates_trans.image_url') }}</label>
                                <input type="text" name="image_url" class="form-control" value="{{ old('image_url') }}">
                                @error('image_url')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary">{{ __('governorates_trans.submit') }}</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
