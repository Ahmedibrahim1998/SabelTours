@extends('admin.layouts.master')
@section('title', trans('books_trans.books'))

@section('content')
    <a href="#" class="btn btn-secondary mb-3 disabled">{{ trans('books_trans.add_disabled') }}</a>
    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ trans('books_trans.name') }}</th>
            <th>{{ trans('books_trans.travel_date') }}</th>
            <th>{{ trans('books_trans.number_person') }}</th>
            <th>{{ trans('clients_trans.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $i => $book)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $book->first_name }} {{ $book->last_name }}</td>
                <td>{{ $book->travel_date }}</td>
                <td>{{ $book->number_person }}</td>
                <td>
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('{{ trans('books_trans.confirm_delete') }}')"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
