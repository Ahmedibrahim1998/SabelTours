@extends('admin.layouts.master')
@section('title') {{ trans('place_details_trans.place_details') }} @endsection
@section('content')
    <a href="{{ route('place-details.create') }}" class="btn btn-success mb-3">{{ trans('place_details_trans.add') }}</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ trans('place_details_trans.place') }}</th>
            <th>{{ trans('place_details_trans.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($placeDetails as $i => $d)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $d->place->getLocalizedName(app()->getLocale()) }}</td>
                <td>
                    <a href="{{ route('place-details.edit', $d->id) }}" class="btn btn-info btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{ route('place-details.show', $d->id) }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-eye"></i>
                    </a>
                    <form action="{{ route('place-details.destroy', $d->id) }}" method="POST"
                          style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('{{ trans('governorates_trans.confirm_delete') }}')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
