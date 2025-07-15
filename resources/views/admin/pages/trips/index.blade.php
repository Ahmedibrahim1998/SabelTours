@extends('admin.layouts.master')

@section('title')
    {{ __('trips_trans.trips') }}
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">{{ __('trips_trans.trips') }}</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('trips_trans.full_name') }}</th>
                        <th>{{ __('trips_trans.email') }}</th>
                        <th>{{ __('trips_trans.phone') }}</th>
                        <th>{{ __('trips_trans.travel_date') }}</th>
                        <th>{{ __('trips_trans.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($trips as $trip)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $trip->first_name }} {{ $trip->last_name }}</td>
                            <td>{{ $trip->email }}</td>
                            <td>{{ $trip->phone }}</td>
                            <td>{{ $trip->travel_date }}</td>
                            <td>
                                <a href="{{ route('trips.edit', $trip->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('trips.show', $trip->id) }}" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
                                <form action="{{ route('trips.destroy', $trip->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('{{ __('trips_trans.confirm_delete') }}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
