@extends('admin.layouts.master')

@section('title')
    {{ __('tour_details_trans.tour_details_info') }}
@endsection

@section('content')
    <a href="{{ route('tour_detail_infos.create') }}" class="btn btn-success mb-3">
        {{ __('tour_details_trans.add_tour_detail') }}
    </a>

    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ __('tour_details_trans.from_month') }}</th>
            <th>{{ __('tour_details_trans.to_month') }}</th>
            <th>{{ __('tour_details_trans.price') }}</th>
            <th>{{ __('tour_details_trans.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tourDetailInfos as $index => $detailInfo)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $detailInfo->from_month ?? '-' }}</td>
                <td>{{ $detailInfo->to_month ?? '-' }}</td>
                <td>{{ number_format($detailInfo->price, 2) }}</td>

                <td>
                    <a href="{{ route('tour_detail_infos.edit', $detailInfo->id) }}" class="btn btn-info btn-sm"><i
                            class="fa fa-edit"></i></a>
                    <a href="{{ route('tour_detail_infos.show', $detailInfo->id) }}" class="btn btn-secondary btn-sm"><i
                            class="fa fa-eye"></i></a>
                    <form action="{{ route('tour_detail_infos.destroy', $detailInfo->id) }}" method="POST"
                          style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('{{ __('tour_details_trans.confirm_delete') }}')"
                                class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
