// index.blade.php
@extends('admin.layouts.master')
@section('title') {{ __('tour_details_trans.tour_details') }} @endsection
@section('content')
    <a href="{{ route('tour_details.create') }}" class="btn btn-success mb-3">{{ __('tour_details_trans.add_tour_detail') }}</a>
    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ __('tour_details_trans.tour') }}</th>
            <th>{{ __('tour_details_trans.sub_tour') }}</th>
            <th>{{ __('tour_details_trans.price') }}</th>
            <th>{{ __('tour_details_trans.rate') }}</th>
            <th>{{ __('tour_details_trans.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tourDetails as $index => $detail)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $detail->tour->getLocalizedName(app()->getLocale()) }}</td>
                <td>{{ optional($detail->subTour)->getLocalizedName(app()->getLocale()) ?? '-' }}</td>
                <td>{{ $detail->price }}</td>
                <td>{{ $detail->rate }}</td>
                <td>
                    <a href="{{ route('tour_details.edit', $detail->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('tour_details.show', $detail->id) }}" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
                    <form action="{{ route('tour_details.destroy', $detail->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('{{ __('tour_details_trans.confirm_delete') }}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
