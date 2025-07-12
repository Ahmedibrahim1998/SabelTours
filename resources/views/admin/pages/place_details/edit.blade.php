@extends('admin.layouts.master')

@section('title')
    {{ trans('place_details_trans.edit') }}
@endsection

@section('content')
    <form action="{{ route('place-details.update', $placeDetail->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- اختيار المكان المرتبط --}}
        <div class="form-group">
            <label>{{ trans('place_details_trans.select_place') }}</label>
            <select name="place_id" class="form-control" required>
                @foreach($places as $p)
                    <option value="{{ $p->id }}" {{ $p->id == $placeDetail->place_id ? 'selected' : '' }}>
                        {{ $p->getLocalizedName(app()->getLocale()) }}
                    </option>
                @endforeach
            </select>
            @error('place_id')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        {{-- الوصف الطويل بكل اللغات --}}
        <div class="row">
            @foreach(['ar','en','fr','es','it','de'] as $loc)
                <div class="form-group col-md-6">
                    <label>{{ trans('place_details_trans.long_description_' . $loc) }}</label>
                    <textarea name="long_description_{{ $loc }}" class="form-control"
                              rows="4">{{ $placeDetail->long_description[$loc] ?? '' }}</textarea>
                    @error('long_description_'.$loc)<small class="text-danger">{{ $message }}</small>@enderror
                </div>
            @endforeach
        </div>
        {{-- الصور --}}


        <div class="row">
            <div class="col-md-6">
                <label>{{ trans('place_details_trans.images') }}</label><br>

                @if(!empty($placeDetail->images) && is_array($placeDetail->images))
                    @foreach($placeDetail->images as $img)
                        @php
                            $imageSrc = Illuminate\Support\Str::startsWith($img, ['http://', 'https://'])
                                ? $img
                                : asset('public/' . ltrim($img, '/'));
                        @endphp
                        <img src="{{ $imageSrc }}" height="100" class="mr-2 mb-2 rounded border">
                    @endforeach
                    <br>
                @endif

                {{-- رفع صور من الجهاز --}}
                <input type="file" name="images[]" class="form-control mb-2" multiple>
                @error('images')
                <div class="text-danger">{{ $message }}</div>@enderror
                @error('images.*')
                <div class="text-danger">{{ $message }}</div>@enderror

                {{-- أو روابط خارجية (ممكن حقل نصي يقبل أكثر من رابط مفصول بفاصلة) --}}
                <label class="mt-2">{{ trans('place_details_trans.image_urls') }}</label>
                <input type="text" name="image_urls" class="form-control"
                       placeholder="{{ trans('place_details_trans.image_urls_placeholder') }}"
                       value="{{ $placeDetail->image_urls ?? '' }}">
                @error('image_urls')
                <div class="text-danger">{{ $message }}</div>@enderror
            </div>

        </div>

        <button type="submit" class="btn btn-success">{{ trans('place_details_trans.update') }}</button>
    </form>
@endsection
