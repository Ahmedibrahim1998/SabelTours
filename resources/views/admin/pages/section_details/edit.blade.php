@extends('admin.layouts.master')
@section('title', __('section_details_trans.edit'))
@section('content')
    <form action="{{ route('section-details.update', $sectionDetail->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row">
            <div class="form-group col-md-6">
                <label>{{ __('section_details_trans.title') }}</label>
                <input type="text" name="title" class="form-control" value="{{ $sectionDetail->title  }}">
                @error('title')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="form-group col-md-6">
                <label>{{ __('section_details_trans.select_section') }}</label>
                <select name="section_id" class="form-control">
                    @foreach($sections as $section)
                        <option value="{{ $section->id }}" @if(old('section_id', $sectionDetail->section_id ?? '') == $section->id) selected @endif>
                            {{ $section->getLocalizedName(app()->getLocale()) }}
                        </option>
                    @endforeach
                </select>
                @error('section_id')<small class="text-danger">{{ $message }}</small>@enderror
            </div>
        </div>

        <div class="row">
        @foreach(['ar','en','fr','es','it','de'] as $locale)
            <div class="form-group col-md-6">
                <label>{{ __('section_details_trans.content_' . $locale) }}</label>
                <textarea name="content_{{ $locale }}" class="form-control"
                          rows="4">{{ old('content_'.$locale, $sectionDetail->getLocalizedContent('content_', $locale)) }}</textarea>
                @error('content_'.$locale) <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        @endforeach
        </div>

        <div class="form-group">
            <label>{{ __('section_details_trans.image') }}</label><br>
            @if(!empty($sectionDetail->image))
                <img src="{{  asset('public/' . ltrim($sectionDetail->image, '/')) }}" height="100"><br><br>
            @endif
            <input type="file" name="image" class="form-control">
            @error('image')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group">
            <label>{{ __('section_details_trans.images') }}</label><br>
            @if(!empty($sectionDetail->images))
                @foreach($sectionDetail->getImages() as $img)
                    <img src="{{ asset('public/' . ltrim($img, '/')) }}" height="80" class="mr-2 mb-2">
                @endforeach
                <br><br>
            @endif
            <input type="file" name="images[]" multiple class="form-control">
            @error('images')<small class="text-danger">{{ $message }}</small>@enderror
            @error('images.*')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <button type="submit" class="btn btn-primary">{{ __('section_details_trans.update') }}</button>
    </form>
@endsection
