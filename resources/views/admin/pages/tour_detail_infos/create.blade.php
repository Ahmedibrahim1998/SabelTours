@extends('admin.layouts.master')

@section('title')
    {{ __('tour_details_trans.add_tour_detail_info') }}
@endsection

@section('content')
    <form action="{{ route('tour_detail_infos.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <div class="form-group">
                <label>{{ __('tour_details_trans.tour_details') }}</label>
                <select name="tour_detail_id" class="form-control" class="m-3">
                    <option value="" class="m-3">{{ __('tour_details_trans.select_tour_detail') }}</option>
                    @foreach($tourDetails as $tour)
                        <option value="{{ $tour->id }}" class="m-3">{{ $tour->getLocalizedName(app()->getLocale()) }}</option>
                    @endforeach
                </select>
                @error('tour_detail_id')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            </div>

        <!-- From Month - متعدد اللغات -->
        <div class="card">
            <div class="card-header">
                <h5>{{ __('tour_details_trans.from_month') }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.from_month') }} ({{ __('tour_details_trans.language_ar') }})</label>
                            <input type="text" name="from_month_ar" class="form-control @error('from_month_ar') is-invalid @enderror" value="{{ old('from_month_ar') }}" required>
                            @error('from_month_ar')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.from_month') }} ({{ __('tour_details_trans.language_en') }})</label>
                            <input type="text" name="from_month_en" class="form-control @error('from_month_en') is-invalid @enderror" value="{{ old('from_month_en') }}" required>
                            @error('from_month_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.from_month') }} ({{ __('tour_details_trans.language_fr') }})</label>
                            <input type="text" name="from_month_fr" class="form-control @error('from_month_fr') is-invalid @enderror" value="{{ old('from_month_fr') }}">
                            @error('from_month_fr')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.from_month') }} ({{ __('tour_details_trans.language_es') }})</label>
                            <input type="text" name="from_month_es" class="form-control @error('from_month_es') is-invalid @enderror" value="{{ old('from_month_es') }}">
                            @error('from_month_es')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.from_month') }} ({{ __('tour_details_trans.language_it') }})</label>
                            <input type="text" name="from_month_it" class="form-control @error('from_month_it') is-invalid @enderror" value="{{ old('from_month_it') }}">
                            @error('from_month_it')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
        <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.from_month') }} ({{ __('tour_details_trans.language_de') }})</label>
                            <input type="text" name="from_month_de" class="form-control @error('from_month_de') is-invalid @enderror" value="{{ old('from_month_de') }}">
                            @error('from_month_de')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- To Month - متعدد اللغات -->
        <div class="card mt-3">
            <div class="card-header">
                <h5>{{ __('tour_details_trans.to_month') }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.to_month') }} ({{ __('tour_details_trans.language_ar') }})</label>
                            <input type="text" name="to_month_ar" class="form-control @error('to_month_ar') is-invalid @enderror" value="{{ old('to_month_ar') }}" required>
                            @error('to_month_ar')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.to_month') }} ({{ __('tour_details_trans.language_en') }})</label>
                            <input type="text" name="to_month_en" class="form-control @error('to_month_en') is-invalid @enderror" value="{{ old('to_month_en') }}" required>
                            @error('to_month_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.to_month') }} ({{ __('tour_details_trans.language_fr') }})</label>
                            <input type="text" name="to_month_fr" class="form-control @error('to_month_fr') is-invalid @enderror" value="{{ old('to_month_fr') }}">
                            @error('to_month_fr')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.to_month') }} ({{ __('tour_details_trans.language_es') }})</label>
                            <input type="text" name="to_month_es" class="form-control @error('to_month_es') is-invalid @enderror" value="{{ old('to_month_es') }}">
                            @error('to_month_es')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.to_month') }} ({{ __('tour_details_trans.language_it') }})</label>
                            <input type="text" name="to_month_it" class="form-control @error('to_month_it') is-invalid @enderror" value="{{ old('to_month_it') }}">
                            @error('to_month_it')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
        <div class="form-group">
                            <label>{{ __('tour_details_trans.to_month') }} ({{ __('tour_details_trans.language_de') }})</label>
                            <input type="text" name="to_month_de" class="form-control @error('to_month_de') is-invalid @enderror" value="{{ old('to_month_de') }}">
                            @error('to_month_de')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group mt-3">
            <label>{{ __('tour_details_trans.price') }}</label>
            <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required>
            @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Agenda - متعدد اللغات -->
        <div class="card mt-3">
            <div class="card-header">
                <h5>{{ __('tour_details_trans.agenda') }}</h5>
            </div>
            <div class="card-body">
                <!-- Morning -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h6>{{ __('tour_details_trans.morning') }}</h6>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.morning') }} ({{ __('tour_details_trans.language_ar') }})</label>
                            <textarea name="agenda_morning_ar" class="form-control @error('agenda_morning_ar') is-invalid @enderror" rows="3">{{ old('agenda_morning_ar') }}</textarea>
                            @error('agenda_morning_ar')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.morning') }} ({{ __('tour_details_trans.language_en') }})</label>
                            <textarea name="agenda_morning_en" class="form-control @error('agenda_morning_en') is-invalid @enderror" rows="3">{{ old('agenda_morning_en') }}</textarea>
                            @error('agenda_morning_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.morning') }} ({{ __('tour_details_trans.language_fr') }})</label>
                            <textarea name="agenda_morning_fr" class="form-control @error('agenda_morning_fr') is-invalid @enderror" rows="3">{{ old('agenda_morning_fr') }}</textarea>
                            @error('agenda_morning_fr')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.morning') }} ({{ __('tour_details_trans.language_es') }})</label>
                            <textarea name="agenda_morning_es" class="form-control @error('agenda_morning_es') is-invalid @enderror" rows="3">{{ old('agenda_morning_es') }}</textarea>
                            @error('agenda_morning_es')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.morning') }} ({{ __('tour_details_trans.language_it') }})</label>
                            <textarea name="agenda_morning_it" class="form-control @error('agenda_morning_it') is-invalid @enderror" rows="3">{{ old('agenda_morning_it') }}</textarea>
                            @error('agenda_morning_it')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.morning') }} ({{ __('tour_details_trans.language_de') }})</label>
                            <textarea name="agenda_morning_de" class="form-control @error('agenda_morning_de') is-invalid @enderror" rows="3">{{ old('agenda_morning_de') }}</textarea>
                            @error('agenda_morning_de')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
                        </div>
                    </div>
        </div>

                <!-- Noon -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h6>{{ __('tour_details_trans.noon') }}</h6>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.noon') }} ({{ __('tour_details_trans.language_ar') }})</label>
                            <textarea name="agenda_noon_ar" class="form-control @error('agenda_noon_ar') is-invalid @enderror" rows="3">{{ old('agenda_noon_ar') }}</textarea>
                            @error('agenda_noon_ar')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.noon') }} ({{ __('tour_details_trans.language_en') }})</label>
                            <textarea name="agenda_noon_en" class="form-control @error('agenda_noon_en') is-invalid @enderror" rows="3">{{ old('agenda_noon_en') }}</textarea>
                            @error('agenda_noon_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.noon') }} ({{ __('tour_details_trans.language_fr') }})</label>
                            <textarea name="agenda_noon_fr" class="form-control @error('agenda_noon_fr') is-invalid @enderror" rows="3">{{ old('agenda_noon_fr') }}</textarea>
                            @error('agenda_noon_fr')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.noon') }} ({{ __('tour_details_trans.language_es') }})</label>
                            <textarea name="agenda_noon_es" class="form-control @error('agenda_noon_es') is-invalid @enderror" rows="3">{{ old('agenda_noon_es') }}</textarea>
                            @error('agenda_noon_es')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.noon') }} ({{ __('tour_details_trans.language_it') }})</label>
                            <textarea name="agenda_noon_it" class="form-control @error('agenda_noon_it') is-invalid @enderror" rows="3">{{ old('agenda_noon_it') }}</textarea>
                            @error('agenda_noon_it')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.noon') }} ({{ __('tour_details_trans.language_de') }})</label>
                            <textarea name="agenda_noon_de" class="form-control @error('agenda_noon_de') is-invalid @enderror" rows="3">{{ old('agenda_noon_de') }}</textarea>
                            @error('agenda_noon_de')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
                        </div>
                    </div>
        </div>

                <!-- Evening -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h6>{{ __('tour_details_trans.evening') }}</h6>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.evening') }} ({{ __('tour_details_trans.language_ar') }})</label>
                            <textarea name="agenda_evening_ar" class="form-control @error('agenda_evening_ar') is-invalid @enderror" rows="3">{{ old('agenda_evening_ar') }}</textarea>
                            @error('agenda_evening_ar')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.evening') }} ({{ __('tour_details_trans.language_en') }})</label>
                            <textarea name="agenda_evening_en" class="form-control @error('agenda_evening_en') is-invalid @enderror" rows="3">{{ old('agenda_evening_en') }}</textarea>
                            @error('agenda_evening_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.evening') }} ({{ __('tour_details_trans.language_fr') }})</label>
                            <textarea name="agenda_evening_fr" class="form-control @error('agenda_evening_fr') is-invalid @enderror" rows="3">{{ old('agenda_evening_fr') }}</textarea>
                            @error('agenda_evening_fr')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.evening') }} ({{ __('tour_details_trans.language_es') }})</label>
                            <textarea name="agenda_evening_es" class="form-control @error('agenda_evening_es') is-invalid @enderror" rows="3">{{ old('agenda_evening_es') }}</textarea>
                            @error('agenda_evening_es')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.evening') }} ({{ __('tour_details_trans.language_it') }})</label>
                            <textarea name="agenda_evening_it" class="form-control @error('agenda_evening_it') is-invalid @enderror" rows="3">{{ old('agenda_evening_it') }}</textarea>
                            @error('agenda_evening_it')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.evening') }} ({{ __('tour_details_trans.language_de') }})</label>
                            <textarea name="agenda_evening_de" class="form-control @error('agenda_evening_de') is-invalid @enderror" rows="3">{{ old('agenda_evening_de') }}</textarea>
                            @error('agenda_evening_de')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">{{ __('tour_details_trans.submit') }}</button>
    </form>
@endsection
