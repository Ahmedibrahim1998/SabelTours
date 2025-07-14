@extends('admin.layouts.master')
@section('title', trans('sections_trans.sections') . ' - ' . $section->getLocalizedName(app()->getLocale()))
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('sections.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
        </div>
        <div class="card-body">
            <h5>{{ trans('sections_trans.name_' . app()->getLocale()) }}</h5>
            <p>{{ $section->getLocalizedName(app()->getLocale()) }}</p>

            <h5>{{ trans('sections_trans.short_description_' . app()->getLocale()) }}</h5>
            <p>{{ $section->getLocalizedDescription(app()->getLocale()) }}</p>

            <h5>{{ trans('sections_trans.type') }}</h5>
            <p>{{ trans("sections_trans.type_{$section->type}") }}</p>

            <h5>{{ trans('sections_trans.image') }}</h5>
            <img src="{{ asset($section->image) }}" height="200" class="img-thumbnail">
        </div>
    </div>
@endsection
