@extends('admin.layouts.master')

@section('title')
    {{ __('trips_trans.edit_trip') }}
@endsection

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-warning text-white">
            <h4 class="mb-0">{{ __('trips_trans.edit_trip') }}</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('trips.update', $trip->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{ __('trips_trans.first_name') }}</label>
                        <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $trip->first_name) }}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>{{ __('trips_trans.last_name') }}</label>
                        <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $trip->last_name) }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>{{ __('trips_trans.gender') }}</label>
                    <select name="gender" class="form-control" required>
                        <option value="male" {{ $trip->gender == 'male' ? 'selected' : '' }}>{{ __('trips_trans.male') }}</option>
                        <option value="female" {{ $trip->gender == 'female' ? 'selected' : '' }}>{{ __('trips_trans.female') }}</option>
                    </select>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{ __('trips_trans.email') }}</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $trip->email) }}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>{{ __('trips_trans.phone') }}</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $trip->phone) }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>{{ __('trips_trans.travel_date') }}</label>
                    <input type="date" name="travel_date" class="form-control" value="{{ old('travel_date', $trip->travel_date) }}" required>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{ __('trips_trans.adults_count') }}</label>
                        <input type="number" name="adults_count" class="form-control" min="1" value="{{ old('adults_count', $trip->adults_count) }}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>{{ __('trips_trans.children_count') }}</label>
                        <input type="number" name="children_count" class="form-control" min="0" value="{{ old('children_count', $trip->children_count) }}">
                    </div>
                </div>

                <div class="form-group">
                    <label>{{ __('trips_trans.message') }}</label>
                    <textarea name="message" class="form-control" rows="3">{{ old('message', $trip->message) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">{{ __('trips_trans.update') }}</button>
                <a href="{{ route('trips.index') }}" class="btn btn-secondary">{{ __('trips_trans.back') }}</a>
            </form>
        </div>
    </div>
@endsection
