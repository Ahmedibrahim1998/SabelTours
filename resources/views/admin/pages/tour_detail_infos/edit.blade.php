@extends('admin.layouts.master')

@section('title')
    {{ __('tour_details_trans.edit_tour_detail_info') }}
@endsection

@section('content')
    <form action="{{ route('tour_detail_infos.update', $tourDetailInfo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>{{ __('tour_details_trans.tour_detail') }}</label>
            <select name="tour_detail_id" class="form-control @error('tour_detail_id') is-invalid @enderror" required>
                <option value="">{{ __('tour_details_trans.select_tour_detail') }}</option>
                @foreach ($tourDetails as $tourDetail)
                    <option value="{{ $tourDetail->id }}" {{ $tourDetail->id == $tourDetailInfo->tour_detail_id ? 'selected' : '' }}>
                        {{ $tourDetail->getLocalizedName(app()->getLocale()) }}
                    </option>
                @endforeach
            </select>
            @error('tour_detail_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
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
                            <label>{{ __('tour_details_trans.from_month') }} (العربية)</label>
                            <input type="text" name="from_month_ar" class="form-control @error('from_month_ar') is-invalid @enderror" value="{{ old('from_month_ar', $tourDetailInfo->from_month['ar'] ?? '') }}" required>
                            @error('from_month_ar')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.from_month') }} (English)</label>
                            <input type="text" name="from_month_en" class="form-control @error('from_month_en') is-invalid @enderror" value="{{ old('from_month_en', $tourDetailInfo->from_month['en'] ?? '') }}" required>
                            @error('from_month_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.from_month') }} (Français)</label>
                            <input type="text" name="from_month_fr" class="form-control @error('from_month_fr') is-invalid @enderror" value="{{ old('from_month_fr', $tourDetailInfo->from_month['fr'] ?? '') }}">
                            @error('from_month_fr')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.from_month') }} (Español)</label>
                            <input type="text" name="from_month_es" class="form-control @error('from_month_es') is-invalid @enderror" value="{{ old('from_month_es', $tourDetailInfo->from_month['es'] ?? '') }}">
                            @error('from_month_es')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.from_month') }} (Italiano)</label>
                            <input type="text" name="from_month_it" class="form-control @error('from_month_it') is-invalid @enderror" value="{{ old('from_month_it', $tourDetailInfo->from_month['it'] ?? '') }}">
                            @error('from_month_it')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.from_month') }} (Deutsch)</label>
                            <input type="text" name="from_month_de" class="form-control @error('from_month_de') is-invalid @enderror" value="{{ old('from_month_de', $tourDetailInfo->from_month['de'] ?? '') }}">
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
                            <label>{{ __('tour_details_trans.to_month') }} (العربية)</label>
                            <input type="text" name="to_month_ar" class="form-control @error('to_month_ar') is-invalid @enderror" value="{{ old('to_month_ar', $tourDetailInfo->to_month['ar'] ?? '') }}" required>
                            @error('to_month_ar')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.to_month') }} (English)</label>
                            <input type="text" name="to_month_en" class="form-control @error('to_month_en') is-invalid @enderror" value="{{ old('to_month_en', $tourDetailInfo->to_month['en'] ?? '') }}" required>
                            @error('to_month_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.to_month') }} (Français)</label>
                            <input type="text" name="to_month_fr" class="form-control @error('to_month_fr') is-invalid @enderror" value="{{ old('to_month_fr', $tourDetailInfo->to_month['fr'] ?? '') }}">
                            @error('to_month_fr')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.to_month') }} (Español)</label>
                            <input type="text" name="to_month_es" class="form-control @error('to_month_es') is-invalid @enderror" value="{{ old('to_month_es', $tourDetailInfo->to_month['es'] ?? '') }}">
                            @error('to_month_es')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.to_month') }} (Italiano)</label>
                            <input type="text" name="to_month_it" class="form-control @error('to_month_it') is-invalid @enderror" value="{{ old('to_month_it', $tourDetailInfo->to_month['it'] ?? '') }}">
                            @error('to_month_it')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.to_month') }} (Deutsch)</label>
                            <input type="text" name="to_month_de" class="form-control @error('to_month_de') is-invalid @enderror" value="{{ old('to_month_de', $tourDetailInfo->to_month['de'] ?? '') }}">
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
            <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $tourDetailInfo->price) }}" required>
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
                            <label>{{ __('tour_details_trans.morning') }} (العربية)</label>
                            <textarea name="agenda_morning_ar" class="form-control @error('agenda_morning_ar') is-invalid @enderror" rows="3">{{ old('agenda_morning_ar', $tourDetailInfo->agenda['morning']['ar'] ?? '') }}</textarea>
                            @error('agenda_morning_ar')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.morning') }} (English)</label>
                            <textarea name="agenda_morning_en" class="form-control @error('agenda_morning_en') is-invalid @enderror" rows="3">{{ old('agenda_morning_en', $tourDetailInfo->agenda['morning']['en'] ?? '') }}</textarea>
                            @error('agenda_morning_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.morning') }} (Français)</label>
                            <textarea name="agenda_morning_fr" class="form-control @error('agenda_morning_fr') is-invalid @enderror" rows="3">{{ old('agenda_morning_fr', $tourDetailInfo->agenda['morning']['fr'] ?? '') }}</textarea>
                            @error('agenda_morning_fr')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.morning') }} (Español)</label>
                            <textarea name="agenda_morning_es" class="form-control @error('agenda_morning_es') is-invalid @enderror" rows="3">{{ old('agenda_morning_es', $tourDetailInfo->agenda['morning']['es'] ?? '') }}</textarea>
                            @error('agenda_morning_es')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.morning') }} (Italiano)</label>
                            <textarea name="agenda_morning_it" class="form-control @error('agenda_morning_it') is-invalid @enderror" rows="3">{{ old('agenda_morning_it', $tourDetailInfo->agenda['morning']['it'] ?? '') }}</textarea>
                            @error('agenda_morning_it')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.morning') }} (Deutsch)</label>
                            <textarea name="agenda_morning_de" class="form-control @error('agenda_morning_de') is-invalid @enderror" rows="3">{{ old('agenda_morning_de', $tourDetailInfo->agenda['morning']['de'] ?? '') }}</textarea>
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
                            <label>{{ __('tour_details_trans.noon') }} (العربية)</label>
                            <textarea name="agenda_noon_ar" class="form-control @error('agenda_noon_ar') is-invalid @enderror" rows="3">{{ old('agenda_noon_ar', $tourDetailInfo->agenda['noon']['ar'] ?? '') }}</textarea>
                            @error('agenda_noon_ar')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.noon') }} (English)</label>
                            <textarea name="agenda_noon_en" class="form-control @error('agenda_noon_en') is-invalid @enderror" rows="3">{{ old('agenda_noon_en', $tourDetailInfo->agenda['noon']['en'] ?? '') }}</textarea>
                            @error('agenda_noon_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.noon') }} (Français)</label>
                            <textarea name="agenda_noon_fr" class="form-control @error('agenda_noon_fr') is-invalid @enderror" rows="3">{{ old('agenda_noon_fr', $tourDetailInfo->agenda['noon']['fr'] ?? '') }}</textarea>
                            @error('agenda_noon_fr')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.noon') }} (Español)</label>
                            <textarea name="agenda_noon_es" class="form-control @error('agenda_noon_es') is-invalid @enderror" rows="3">{{ old('agenda_noon_es', $tourDetailInfo->agenda['noon']['es'] ?? '') }}</textarea>
                            @error('agenda_noon_es')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.noon') }} (Italiano)</label>
                            <textarea name="agenda_noon_it" class="form-control @error('agenda_noon_it') is-invalid @enderror" rows="3">{{ old('agenda_noon_it', $tourDetailInfo->agenda['noon']['it'] ?? '') }}</textarea>
                            @error('agenda_noon_it')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.noon') }} (Deutsch)</label>
                            <textarea name="agenda_noon_de" class="form-control @error('agenda_noon_de') is-invalid @enderror" rows="3">{{ old('agenda_noon_de', $tourDetailInfo->agenda['noon']['de'] ?? '') }}</textarea>
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
                            <label>{{ __('tour_details_trans.evening') }} (العربية)</label>
                            <textarea name="agenda_evening_ar" class="form-control @error('agenda_evening_ar') is-invalid @enderror" rows="3">{{ old('agenda_evening_ar', $tourDetailInfo->agenda['evening']['ar'] ?? '') }}</textarea>
                            @error('agenda_evening_ar')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.evening') }} (English)</label>
                            <textarea name="agenda_evening_en" class="form-control @error('agenda_evening_en') is-invalid @enderror" rows="3">{{ old('agenda_evening_en', $tourDetailInfo->agenda['evening']['en'] ?? '') }}</textarea>
                            @error('agenda_evening_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.evening') }} (Français)</label>
                            <textarea name="agenda_evening_fr" class="form-control @error('agenda_evening_fr') is-invalid @enderror" rows="3">{{ old('agenda_evening_fr', $tourDetailInfo->agenda['evening']['fr'] ?? '') }}</textarea>
                            @error('agenda_evening_fr')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.evening') }} (Español)</label>
                            <textarea name="agenda_evening_es" class="form-control @error('agenda_evening_es') is-invalid @enderror" rows="3">{{ old('agenda_evening_es', $tourDetailInfo->agenda['evening']['es'] ?? '') }}</textarea>
                            @error('agenda_evening_es')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.evening') }} (Italiano)</label>
                            <textarea name="agenda_evening_it" class="form-control @error('agenda_evening_it') is-invalid @enderror" rows="3">{{ old('agenda_evening_it', $tourDetailInfo->agenda['evening']['it'] ?? '') }}</textarea>
                            @error('agenda_evening_it')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('tour_details_trans.evening') }} (Deutsch)</label>
                            <textarea name="agenda_evening_de" class="form-control @error('agenda_evening_de') is-invalid @enderror" rows="3">{{ old('agenda_evening_de', $tourDetailInfo->agenda['evening']['de'] ?? '') }}</textarea>
                            @error('agenda_evening_de')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">{{ __('tour_details_trans.update') }}</button>
    </form>
@endsection
