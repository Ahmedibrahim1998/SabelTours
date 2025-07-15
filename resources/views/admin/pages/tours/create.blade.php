@extends('admin.layouts.master')

@section('title')
    {{ trans('tours_trans.add_tour') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{ route('tours.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- اختيار نوع الرحلة --}}
                        <div class="form-group">
                            <label>{{ trans('tours_trans.type') }}</label>
                            <select name="type" class="form-control" required>
                                <option value="">{{ trans('tours_trans.select_type') }}</option>
                                <option value="nile">Nile</option>
                                <option value="city">City</option>
                                <option value="natural">Natural</option>
                                <option value="desert">Desert</option>
                            </select>
                            @error('type')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        {{-- أسماء الرحلة بجميع اللغات --}}
                        <div class="row">
                            @foreach(['ar','es','en','fr','it','de'] as $locale)
                                <div class="col-md-6">
                                    <label>{{ __('tours_trans.name_' . $locale) }}</label>
                                    <input type="text" name="name_{{ $locale }}" class="form-control" value="{{ old('name_' . $locale) }}">
                                    @error('name_'.$locale)<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                            @endforeach
                        </div>

                        <br>

                        {{-- وصف الرحلة بجميع اللغات --}}
                        <div class="row">
                            @foreach(['ar','es','en','fr','it','de'] as $locale)
                                <div class="col-md-6">
                                    <label>{{ __('tours_trans.description_' . $locale) }}</label>
                                    <textarea name="description_{{ $locale }}" class="form-control" rows="3">{{ old('description_' . $locale) }}</textarea>
                                    @error('description_'.$locale)<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                            @endforeach
                        </div>

                        <br>

                        {{-- صورة رئيسية --}}
                        <div class="form-group">
                            <label>{{ __('tours_trans.image') }}</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        {{-- صور متعددة (معرض) --}}
                        <div class="form-group">
                            <label>{{ __('tours_trans.gallery') }}</label>
                            <input type="file" name="gallery[]" class="form-control" multiple>
                            @error('gallery')<div class="text-danger">{{ $message }}</div>@enderror
                            @error('gallery.*')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        {{-- أو روابط خارجية للمعرض --}}
                        <div class="form-group">
                            <label>{{ __('tours_trans.gallery_urls') }}</label>
                            <input type="text" name="gallery_urls" class="form-control" placeholder="{{ __('tours_trans.gallery_urls_placeholder') }}" value="{{ old('gallery_urls') }}">
                            <small class="form-text text-muted">{{ __('tours_trans.separate_urls_with_comma') }}</small>
                            @error('gallery_urls')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ trans('tours_trans.submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
