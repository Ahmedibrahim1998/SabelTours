@extends('admin.layouts.master')

@section('title')
    {{ __('places_trans.edit_place') }}
@stop

@section('content')
    <form action="{{ route('places.update', $place->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- أسماء المكان بكل اللغات --}}
        <div class="row">
            @foreach(['ar','es','en','fr','it','de'] as $locale)
                <div class="col-md-6">
                    <label>{{ __('places_trans.name_' . $locale) }}</label>
                    <input type="text" name="name_{{ $locale }}" class="form-control" value="{{ $place->name[$locale] ?? '' }}">
                    @error('name_'.$locale)<div class="text-danger">{{ $message }}</div>@enderror
                </div>
            @endforeach
        </div>
        <br>

        {{-- وصف مختصر بكل اللغات --}}
        <div class="row">
            @foreach(['ar','es','en','fr','it','de'] as $locale)
                <div class="col-md-6">
                    <label>{{ __('places_trans.short_description_' . $locale) }}</label>
                    <textarea name="short_description_{{ $locale }}" class="form-control" rows="3">{{ $place->short_description[$locale] ?? '' }}</textarea>
                    @error('short_description_'.$locale)<div class="text-danger">{{ $message }}</div>@enderror
                </div>
            @endforeach
        </div>
        <br>

        {{-- المحافظة --}}
        <div class="form-group">
            <label>{{ __('places_trans.governorate') }}</label>
            <select name="governorate_id" class="form-control">
                @foreach($governorates as $gov)
                    <option value="{{ $gov->id }}" {{ $place->governorate_id == $gov->id ? 'selected' : '' }}>
                        {{ $gov->getLocalizedName(app()->getLocale()) }}
                    </option>
                @endforeach
            </select>
            @error('governorate_id')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        {{-- الصورة --}}
        <div class="col-md-6">
            <label>{{ __('places_trans.image') }}</label><br>
            @if($place->image)
                @php
                    $imageSrc = Illuminate\Support\Str::startsWith($place->image, ['http://', 'https://'])
                        ? $place->image
                        : asset('public/' . ltrim($place->image, '/'));
                @endphp
                <img src="{{ $imageSrc }}" height="100"><br><br>
            @endif

            {{-- من الجهاز --}}
            <input type="file" name="image" class="form-control mb-2">
            @error('image')<div class="text-danger">{{ $message }}</div>@enderror

            {{-- أو رابط خارجي --}}
            <input type="text" name="image_url" class="form-control"
                   placeholder="{{ __('places_trans.image_url') }}"
                   value="{{ old('image_url', Str::startsWith($place->image, 'http') ? $place->image : '') }}">
            @error('image_url')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        {{-- الموقع --}}
        <div class="form-group">
            <label>{{ __('places_trans.location') }}</label>
            <input type="text" name="location" class="form-control" value="{{ $place->location }}">
            @error('location')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn btn-success">{{ __('places_trans.update') }}</button>
    </form>
@endsection
