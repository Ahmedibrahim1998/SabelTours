@extends('admin.layouts.master')

@section('title')
    {{ trans('governorates_trans.governorates') }}
@stop

@section('content')
    <div class="row font-weight-bold">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <a href="{{ route('governorates.create') }}" class="btn btn-success mb-3">
                        {{ trans('governorates_trans.add_governorate') }}
                    </a>

                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('governorates_trans.image') }}</th>
                            <th>{{ trans('governorates_trans.name_' . app()->getLocale()) }}</th>
                            <th>{{ trans('governorates_trans.date') }}</th>
                            <th>{{ trans('governorates_trans.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($governorates as $index => $governorate)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                @php
                                    $imageSrc = Illuminate\Support\Str::startsWith($governorate->image, ['http://', 'https://'])
                                        ? $governorate->image
                                        : asset('public/' . ltrim($governorate->image, '/'));
                                @endphp
                                <td>
                                    @if($governorate->image)
                                        <img src="{{ $imageSrc }}" height="50" alt="Governorate Image">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $governorate->getLocalizedName() }}</td>
                                <td>{{ $governorate->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('governorates.edit', $governorate->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('governorates.show', $governorate->id) }}" class="btn btn-secondary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <form action="{{ route('governorates.destroy', $governorate->id) }}" method="POST"
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

                </div>
            </div>
        </div>
    </div>
@endsection
