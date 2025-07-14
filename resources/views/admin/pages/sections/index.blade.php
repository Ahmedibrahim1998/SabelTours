@extends('admin.layouts.master')
@section('title', trans('sections_trans.sections'))
@section('content')
    <a href="{{ route('sections.create') }}" class="btn btn-success mb-3">{{ trans('sections_trans.add') }}</a>
    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ trans('sections_trans.image') }}</th>
            <th>{{ trans('sections_trans.name_' . app()->getLocale()) }}</th>
            <th>{{ trans('sections_trans.type') }}</th>
            <th>{{ trans('clients_trans.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sections as $idx => $sec)
            <tr>
                <td>{{ $idx+1 }}</td>
                @php
                    // تحقق إذا كان الرابط خارجي، وإذا لم يكن كذلك أضف /public/ في المسار
                    $imageSrc = Illuminate\Support\Str::startsWith($sec->image, ['http://', 'https://'])
                        ? $sec->image
                        : asset('public/' . ltrim($sec->image, '/'));
                @endphp
                <td>
                    @if($sec->image)
                        <img src="{{ $imageSrc }}" height="50" alt="Client Image">
                    @else
                        -
                    @endif
                </td>
                <td>{{ $sec->getLocalizedName() }}</td>
                <td>{{ trans('sections_trans.type_' . $sec->type) }}</td>
                <td>
                    <a href="{{ route('sections.edit', $sec->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('sections.destroy', $sec->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('{{ trans('sections_trans.confirm_delete') }}')"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr> <!-- أضف هذا السطر الناقص -->

        @endforeach
        </tbody>
    </table>
@endsection
