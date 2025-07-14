@extends('admin.layouts.master')
@section('title', trans('sections_trans.edit'))

@section('content')
    <form action="{{ route('sections.update', $section->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="form-group">
            <label>{{ trans('sections_trans.type') }}</label>
            <select name="type" class="form-control">
                @foreach(['Climate','Essential','Practical_Information'] as $t)
                    <option value="{{ $t }}" {{ $section->type == $t ? 'selected' : '' }}>
                        {{trans('sections_trans.type_' .$t) }}
                    </option>
                @endforeach
            </select>
            @error('type')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="row">
        @foreach(['ar','es','en','fr','it','de'] as $locale)
            <div class="form-group col-md-6">
                <label>{{ trans('sections_trans.name_' . $locale) }}</label>
                <input type="text" name="name_{{ $locale }}" class="form-control" value="{{ $section->name[$locale] ?? '' }}">
                @error('name_'.$locale)<small class="text-danger">{{ $message }}</small>@enderror
            </div>
        @endforeach
        </div>
        <div class="row">
        @foreach(['ar','es','en','fr','it','de'] as $locale)
            <div class="form-group col-md-6">
                <label>{{ trans('sections_trans.short_description_' . $locale) }}</label>
                <textarea name="short_description_{{ $locale }}" class="form-control">{{ $section->short_description[$locale] ?? '' }}</textarea>
                @error('short_description_'.$locale)<small class="text-danger">{{ $message }}</small>@enderror
            </div>
        @endforeach
        </div>

        <div class="form-group">
            <label>{{ trans('sections_trans.image') }}</label><br>
            @if($section->image)
                <img src="{{ asset('public/' . ltrim($section->image, '/'))}}" height="100"><br><br>
            @endif
            <input type="file" name="image" class="form-control">
            @error('image')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <button class="btn btn-primary">{{ trans('sections_trans.update') }}</button>
    </form>
@endsection
