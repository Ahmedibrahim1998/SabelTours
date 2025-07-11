@extends('admin.layouts.master')
@section('title')
    {{ trans('clients_trans.edit_client') }}
@stop
@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{ route('clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            @foreach(['ar','es', 'en', 'fr', 'it', 'de'] as $locale)
                                <div class="col-md-6">
                                    <label>{{ __('clients_trans.name_' . $locale) }}</label>
                                    <input type="text" name="name_{{ $locale }}" class="form-control"
                                           value="{{ $client->name[$locale] ?? '' }}">
                                    @error('name_'.$locale)<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                            @endforeach
                        </div>
                        <br>
                        <div class="row">
                            @foreach(['ar','es', 'en', 'fr', 'it', 'de'] as $locale)
                                <div class="col-md-6">
                                    <label>{{ __('clients_trans.description_' . $locale) }}</label>
                                    <textarea name="description_{{ $locale }}" class="form-control" rows="3">{{ $client->description[$locale] ?? '' }}</textarea>
                                    @error('description_'.$locale)<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                            @endforeach
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label>{{ __('clients_trans.date') }}</label>
                                <input type="date" name="date" class="form-control" value="{{ $client->date }}">
                                @error('date')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label>{{ __('clients_trans.image') }}</label><br>

                                @if($client->image)
                                    @php
                                        // تحقق إذا كان الرابط خارجي، وإذا لم يكن كذلك أضف /public/ في المسار
                                        $imageSrc = Illuminate\Support\Str::startsWith($client->image, ['http://', 'https://'])
                                            ? $client->image
                                            : asset('public/' . ltrim($client->image, '/'));
                                    @endphp
                                    <img src="{{ $imageSrc }}" height="100"><br><br>
                                @endif

                                {{-- رفع صورة من الجهاز --}}
                                <input type="file" name="image" class="form-control mb-2">
                                @error('image')<div class="text-danger">{{ $message }}</div>@enderror

                                {{-- أو رابط خارجي للصورة --}}
                                <input type="text" name="image_url" class="form-control"
                                       placeholder="أدخل رابط صورة خارجي"
                                       value="{{ old('image_url', Str::startsWith($client->image, 'http') ? $client->image : '') }}">
                                @error('image_url')<div class="text-danger">{{ $message }}</div>@enderror
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
