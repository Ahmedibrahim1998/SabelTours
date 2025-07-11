@extends('admin.layouts.master')
@section('title')
    {{ trans('governorates_trans.edit_governorate') }}
@stop
@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{ route('governorates.update', $governorate->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- أسماء المحافظة بجميع اللغات --}}
                        <div class="row">
                            @foreach(['ar','es','en','fr','it','de'] as $locale)
                                <div class="col-md-6">
                                    <label>{{ __('governorates_trans.name_' . $locale) }}</label>
                                    <input type="text" name="name_{{ $locale }}" class="form-control"
                                           value="{{ $governorate->name[$locale] ?? '' }}">
                                    @error('name_'.$locale)<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                            @endforeach
                        </div>

                        <br>

                        {{-- عدد الأماكن (اختياري) --}}
                        <div class="row">
                            <div class="col-md-6">
                                <label>{{ __('governorates_trans.places_count') }}</label>
                                <input type="number" name="places_count" class="form-control"
                                       value="{{ $governorate->places_count }}">
                                @error('places_count')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <br>

                        {{-- الصورة --}}
                        <div class="row">
                            <div class="col-md-6">
                                <label>{{ __('governorates_trans.image') }}</label><br>

                                @if($governorate->image)
                                    @php
                                        $imageSrc = Illuminate\Support\Str::startsWith($governorate->image, ['http://', 'https://'])
                                            ? $governorate->image
                                            : asset('public/' . ltrim($governorate->image, '/'));
                                    @endphp
                                    <img src="{{ $imageSrc }}" height="100"><br><br>
                                @endif

                                {{-- رفع صورة من الجهاز --}}
                                <input type="file" name="image" class="form-control mb-2">
                                @error('image')<div class="text-danger">{{ $message }}</div>@enderror

                                {{-- أو رابط خارجي للصورة --}}
                                <input type="text" name="image_url" class="form-control"
                                       placeholder="أدخل رابط صورة خارجي"
                                       value="{{ old('image_url', Str::startsWith($governorate->image, 'http') ? $governorate->image : '') }}">
                                @error('image_url')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary">
                            {{ __('governorates_trans.submit') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
