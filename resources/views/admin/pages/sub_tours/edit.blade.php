@extends('admin.layouts.master')

@section('title')
    {{ __('sub_tours_trans.edit_sub_tour') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{ route('sub-tours.update', $subTour->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- اختيار الرحلة الرئيسية --}}
                        <div class="form-group">
                            <label>{{ __('sub_tours_trans.tour') }}</label>
                            <select name="tour_id" class="form-control" required>
                                @foreach($tours as $tour)
                                    <option value="{{ $tour->id }}" {{ $subTour->tour_id == $tour->id ? 'selected' : '' }}>{{ $tour->getLocalizedName(app()->getLocale()) }}</option>
                                @endforeach
                            </select>
                            @error('tour_id')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        {{-- الأسماء بجميع اللغات --}}
                        <div class="row">
                            @foreach(['ar','en','fr','es','it','de'] as $locale)
                                <div class="col-md-6">
                                    <label>{{ __('sub_tours_trans.name_' . $locale) }}</label>
                                    <input type="text" name="name_{{ $locale }}" class="form-control" value="{{ $subTour->name[$locale] ?? '' }}">
                                    @error('name_' . $locale)<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                            @endforeach
                        </div>

                        <br>

                        {{-- صورة من الجهاز --}}
                        <div class="form-group">
                            <label>{{ __('sub_tours_trans.image') }}</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        {{-- أو رابط صورة خارجي --}}
                        <div class="form-group">
                            <label>{{ __('sub_tours_trans.image_url') }}</label>
                            <input type="text" name="image_url" class="form-control" value="{{ $subTour->image }}">
                            @error('image_url')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('sub_tours_trans.update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
