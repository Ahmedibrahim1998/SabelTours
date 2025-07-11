@extends('admin.layouts.master')
@section('title')
    {{ trans('clients_trans.add_client') }}
@stop
@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            @foreach(['ar', 'es','en', 'fr', 'it', 'de'] as $locale)
                                <div class="col-md-6">
                                    <label>{{ __('clients_trans.name_' . $locale) }}</label>
                                    <input type="text" name="name_{{ $locale }}" class="form-control" value="{{ old('name_' . $locale) }}">
                                    @error('name_'.$locale)<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                            @endforeach
                        </div>
                        <br>
                        <div class="row">
                            @foreach(['ar','es', 'en', 'fr', 'it', 'de'] as $locale)
                                <div class="col-md-6">
                                    <label>{{ __('clients_trans.description_' . $locale) }}</label>
                                    <textarea name="description_{{ $locale }}" class="form-control" rows="3">{{ old('description_' . $locale) }}</textarea>
                                    @error('description_'.$locale)<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                            @endforeach
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label>{{ __('clients_trans.date') }}</label>
                                <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                                @error('date')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label>:{{ __('clients_trans.image') }}</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>:{{ __('clients_trans.image_url') }}</label>
                                <input type="text" name="image_url" class="form-control" value="{{ old('image_url', $client->image ?? '') }}">
                            </div>

                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">{{ __('clients_trans.submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
