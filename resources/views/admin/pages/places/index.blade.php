@extends('admin.layouts.master')
@section('title')
    {{ __('places_trans.places') }}
@stop
@section('content')
    <a href="{{ route('places.create') }}" class="btn btn-success mb-3">{{ __('places_trans.add_place') }}</a>
    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ __('places_trans.name_' . app()->getLocale()) }}</th>
            <th>{{ __('places_trans.governorate') }}</th>
            <th>{{ __('places_trans.image') }}</th>
            <th>{{ __('places_trans.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($places as $index => $place)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $place->getLocalizedName(app()->getLocale()) }}</td>
                <td>{{ $place->governorate->getLocalizedName() }}</td>
                @php
                    $imageSrc = Illuminate\Support\Str::startsWith($place->image, ['http://', 'https://'])
                        ? $place->image
                        : asset('public/' . ltrim($place->image, '/'));
                @endphp
                <td>
                    @if($place->image)
                        <img src="{{ $imageSrc }}" height="50" alt="Place Image">
                    @else
                        -
                    @endif
                </td>
                <td>
                    <a href="{{ route('places.edit', $place->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('places.show', $place->id) }}" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
                    <form action="{{ route('places.destroy', $place->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('{{ __('places_trans.confirm_delete') }}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
