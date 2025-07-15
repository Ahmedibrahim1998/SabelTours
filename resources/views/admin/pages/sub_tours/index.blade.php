@extends('admin.layouts.master')

@section('title')
    {{ __('sub_tours_trans.sub_tours') }}
@endsection

@section('content')
    <a href="{{ route('sub-tours.create') }}" class="btn btn-success mb-3">{{ __('sub_tours_trans.add_sub_tour') }}</a>
    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ __('sub_tours_trans.name_' . app()->getLocale()) }}</th>
            <th>{{ __('sub_tours_trans.tour') }}</th>
            <th>{{ __('sub_tours_trans.image') }}</th>
            <th>{{ __('sub_tours_trans.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subTours as $index => $subTour)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $subTour->name[app()->getLocale()] ?? '-' }}</td>
                <td>{{ $subTour->tour->getLocalizedName(app()->getLocale()) ?? '-' }}</td>
                @php
                    $imageSrc = Illuminate\Support\Str::startsWith($subTour->image, ['http://', 'https://'])
                        ? $subTour->image
                        : asset('public/' . ltrim($subTour->image, '/'));
                @endphp
                <td>
                    @if($subTour->image)
                        <img src="{{ $imageSrc }}" height="50" alt="Sub Tour Image">
                    @else
                        -
                    @endif
                </td>
                <td>
                    <a href="{{ route('sub-tours.edit', $subTour->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('sub-tours.show', $subTour->id) }}" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
                    <form action="{{ route('sub-tours.destroy', $subTour->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('{{ __('sub_tours_trans.confirm_delete') }}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
