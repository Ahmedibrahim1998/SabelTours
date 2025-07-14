@extends('admin.layouts.master')
@section('title', __('section_details_trans.section_details'))
@section('content')
<a href="{{ route('section-details.create') }}" class="btn btn-success mb-3">{{ __('section_details_trans.add') }}</a>
<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>#</th>
            <th>{{ __('section_details_trans.title') }}</th>
            <th>{{ __('section_details_trans.image') }}</th>
            <th>{{ __('clients_trans.actions') }}</th>
        </tr>
    </thead>
    <tbody>
    @foreach($details as $idx => $detail)
        <tr>
            <td>{{ $idx + 1 }}</td>
            <td>{{ $detail->title }}</td>
            <td>
                @if($detail->image)
                    <img src="{{ asset('public/' . ltrim($detail->image, '/')) }}" height="50">
                @endif
            </td>
            <td>
                <a href="{{ route('section-details.edit', $detail->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                <a href="{{ route('places.show', $detail->id) }}" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
                <form action="{{ route('section-details.destroy', $detail->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('{{ __('section_details_trans.confirm_delete') }}')"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
