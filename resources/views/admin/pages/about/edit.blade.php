@extends('admin.layouts.master')
@section('title')
    {{ __('about_us_trans.edit') }}
@endsection

@section('content')
    <form action="{{ route('about-us.update', $about->id ?? '') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Team Name (single language) --}}
        <div class="form-group">
            <label>{{ __('about_us_trans.team_name') }}</label>
            <input type="text" name="team_name" class="form-control"
                   value="{{ old('team_name', $about->team_name ?? '') }}">
            @error('team_name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        {{-- About Text --}}
        <div class="row">
        @foreach(['ar','en','fr','es','it','de'] as $locale)
            <div class="form-group col-md-6">
                <label>{{ __('about_us_trans.about_text_' . $locale) }}</label>
                <textarea name="about_text_{{ $locale }}" class="form-control"
                          rows="4">{{ old('about_text_'.$locale, $about->getLocalizedField('about_text', $locale)) }}</textarea>
                @error('about_text_'.$locale) <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        @endforeach
        </div>
        {{-- Goals --}}
        <div class="row">
            @foreach(['ar','en','fr','es','it','de'] as $locale)
                <div class="form-group col-md-6">
                    <label>{{ __('about_us_trans.goals_' . $locale) }}</label>
                    <textarea name="goals_{{ $locale }}" class="form-control"
                              rows="4">{{ old('goals_'.$locale, $about->getLocalizedField('goals', $locale)) }}</textarea>
                    @error('goals_'.$locale) <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            @endforeach
        </div>
        {{-- Images --}}
        <div class="form-group">
            <label>{{ __('about_us_trans.images') }}</label><br>
            <div class="mb-2 d-flex flex-wrap">
                @foreach($about->getImages() as $img)
                    <img src="{{ asset($img) }}" height="80" class="mr-2 mb-2 rounded border">
                @endforeach
            </div>
            <input type="file" name="images[]" class="form-control mb-2" multiple>
            @error('images') <small class="text-danger">{{ $message }}</small> @enderror
            @error('images.*') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-success">{{ __('about_us_trans.update') }}</button>
    </form>
@endsection
