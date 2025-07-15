@extends('admin.layouts.master')
@section('title')
    {{ __('tours_trans.tours') }}
@stop

@section('content')
    <a href="{{ route('tours.create') }}" class="btn btn-success mb-3">{{ __('tours_trans.add_tour') }}</a>

    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ __('tours_trans.name_' . app()->getLocale()) }}</th>
            <th>{{ __('tours_trans.type') }}</th>
            <th>{{ __('tours_trans.image') }}</th>
            <th>{{ __('tours_trans.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tours as $index => $tour)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $tour->getLocalizedName(app()->getLocale()) }}</td>
                <td>{{ ucfirst($tour->type) }}</td>
                @php
                    $imageSrc = Str::startsWith($tour->image, ['http://', 'https://'])
                        ? $tour->image
                        : asset('public/' . ltrim($tour->image, '/'));
                @endphp
                <td>
                    @if($tour->image)
                        <img src="{{ $imageSrc }}" height="50" alt="Tour Image">
                    @else
                        -
                    @endif
                </td>
                <td>
                    <a href="{{ route('tours.edit', $tour->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('tours.show', $tour->id) }}" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
                    <form action="{{ route('tours.destroy', $tour->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('{{ __('tours_trans.confirm_delete') }}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
