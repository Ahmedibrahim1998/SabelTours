@extends('admin.layouts.master')
@section('title', trans('sections_trans.add'))

@section('content')
    <form action="{{ route('sections.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>{{ trans('sections_trans.type') }}</label>
            <select name="type" class="form-control">
                @foreach(['Climate','Essential','Practical_Information'] as $t)
                    <option value="{{ $t }}" {{ old('type') == $t ? 'selected' : '' }}>
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
                    <input type="text" name="name_{{ $locale }}" class="form-control"
                           value="{{ old('name_'.$locale) }}">
                    @error('name_'.$locale)<small class="text-danger">{{ $message }}</small>@enderror
                </div>
            @endforeach
        </div>
        <div class="row">

        @foreach(['ar','es','en','fr','it','de'] as $locale)
            <div class="form-group col-md-6">
                <label>{{ trans('sections_trans.short_description_' . $locale) }}</label>
                <textarea name="short_description_{{ $locale }}"
                          class="form-control">{{ old('short_description_'.$locale) }}</textarea>
                @error('short_description_'.$locale)<small class="text-danger">{{ $message }}</small>@enderror
            </div>
        @endforeach
        </div>

        <div class="form-group">
            <label>{{ trans('sections_trans.image') }}</label><br>
            <input type="file" name="image" class="form-control">
            @error('image')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <button class="btn btn-success">{{ trans('sections_trans.submit') }}</button>
    </form>
@endsection
