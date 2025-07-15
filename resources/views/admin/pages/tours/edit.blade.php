@extends('admin.layouts.master')

@section('title')
    {{ trans('tours_trans.edit_tour') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{ route('tours.update', $tour->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- نوع الرحلة --}}
                        <div class="form-group">
                            <label>{{ trans('tours_trans.type') }}</label>
                            <select name="type" class="form-control" required>
                                @foreach(['nile', 'city', 'natural', 'desert'] as $type)
                                    <option value="{{ $type }}" {{ $tour->type == $type ? 'selected' : '' }}>
                                        {{ ucfirst($type) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('type')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        {{-- الأسماء --}}
                        <div class="row">
                            @foreach(['ar','es','en','fr','it','de'] as $locale)
                                <div class="col-md-6">
                                    <label>{{ __('tours_trans.name_' . $locale) }}</label>
                                    <input type="text" name="name_{{ $locale }}" class="form-control"
                                           value="{{ old('name_' . $locale, $tour->name[$locale] ?? '') }}">
                                    @error('name_'.$locale)<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                            @endforeach
                        </div>

                        <br>

                        {{-- الوصف --}}
                        <div class="row">
                            @foreach(['ar','es','en','fr','it','de'] as $locale)
                                <div class="col-md-6">
                                    <label>{{ __('tours_trans.description_' . $locale) }}</label>
                                    <textarea name="description_{{ $locale }}" class="form-control" rows="3">{{ old('description_' . $locale, $tour->description[$locale] ?? '') }}</textarea>
                                    @error('description_'.$locale)<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                            @endforeach
                        </div>

                        <br>

                        {{-- صورة رئيسية --}}
                        <div class="form-group">
                            <label>{{ __('tours_trans.image') }}</label><br>
                            @if($tour->image)
                                <img src="{{ asset('public/' . $tour->image) }}" height="70"><br><br>
                            @endif
                            <input type="file" name="image" class="form-control">
                            @error('image')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        {{-- صور متعددة --}}
                        <div class="form-group">
                            <label>{{ __('tours_trans.gallery') }}</label><br>
                            @if($tour->gallery)
                                @foreach($tour->gallery as $img)
                                    <img src="{{ Str::startsWith($img, ['http', 'https']) ? $img : asset('public/' . $img) }}"
                                         height="50" class="m-1">
                                @endforeach
                                <br><br>
                            @endif
                            <input type="file" name="gallery[]" class="form-control" multiple>
                            @error('gallery')<div class="text-danger">{{ $message }}</div>@enderror
                            @error('gallery.*')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        {{-- روابط صور --}}
                        <div class="form-group">
                            <label>{{ __('tours_trans.gallery_urls') }}</label>
                            <input type="text" name="gallery_urls" class="form-control"
                                   placeholder="{{ __('tours_trans.gallery_urls_placeholder') }}">
                            <small class="form-text text-muted">{{ __('tours_trans.separate_urls_with_comma') }}</small>
                            @error('gallery_urls')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ trans('tours_trans.update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
