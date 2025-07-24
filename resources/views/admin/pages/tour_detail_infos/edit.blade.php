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

        <div class="form-group">
            <label>{{ __('tour_details_trans.from_month') }}</label>
            <input type="text" name="from_month" class="form-control @error('from_month') is-invalid @enderror" value="{{ old('from_month', $tourDetailInfo->from_month) }}" required>
            @error('from_month')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>{{ __('tour_details_trans.to_month') }}</label>
            <input type="text" name="to_month" class="form-control @error('to_month') is-invalid @enderror" value="{{ old('to_month', $tourDetailInfo->to_month) }}" required>
            @error('to_month')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>{{ __('tour_details_trans.price') }}</label>
            <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $tourDetailInfo->price) }}" required>
            @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>{{ __('tour_details_trans.agenda_morning') }}</label>
            <textarea name="agenda_morning" class="form-control @error('agenda_morning') is-invalid @enderror">{{ old('agenda_morning', $tourDetailInfo->agenda['morning'] ?? '') }}</textarea>
            @error('agenda_morning')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>{{ __('tour_details_trans.agenda_noon') }}</label>
            <textarea name="agenda_noon" class="form-control @error('agenda_noon') is-invalid @enderror">{{ old('agenda_noon', $tourDetailInfo->agenda['noon'] ?? '') }}</textarea>
            @error('agenda_noon')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>{{ __('tour_details_trans.agenda_evening') }}</label>
            <textarea name="agenda_evening" class="form-control @error('agenda_evening') is-invalid @enderror">{{ old('agenda_evening', $tourDetailInfo->agenda['evening'] ?? '') }}</textarea>
            @error('agenda_evening')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">{{ __('tour_details_trans.update') }}</button>
    </form>
@endsection
