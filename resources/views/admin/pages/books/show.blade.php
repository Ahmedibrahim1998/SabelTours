@extends('admin.layouts.master')
@section('title', trans('books_trans.book_details'))

@section('content')
    <a href="{{ route('books.index') }}" class="btn btn-light mb-3"><i class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
    <div class="card p-3">
        <h5>{{ trans('books_trans.full_name') }}:</h5>
        <p>{{ $book->first_name }} {{ $book->last_name }}</p>

        <h5>{{ trans('books_trans.email') }}:</h5>
        <p>{{ $book->email }}</p>

        <h5>{{ trans('books_trans.phone') }}:</h5>
        <p>{{ $book->phone }}</p>

        <h5>{{ trans('books_trans.travel_date') }}:</h5>
        <p>{{ $book->travel_date }}</p>

        <h5>{{ trans('books_trans.stay_duration') }}:</h5>
        <p>{{ $book->stay_duration }} {{ trans('books_trans.days') }}</p>

        <h5>{{ trans('books_trans.children_count') }}:</h5>
        <p>{{ $book->children_count }}</p>

        <h5>{{ trans('books_trans.number_person') }}:</h5>
        <p>{{ $book->number_person }}</p>

        <h5>{{ trans('books_trans.accommodation_type') }}:</h5>
        <p>{{ trans("books_trans.accommodation_{$book->accommodation_type}") }}</p>

        @if($book->accommodation_message)
            <h5>{{ trans('books_trans.accommodation_message') }}:</h5>
            <p>{{ $book->accommodation_message }}</p>
        @endif

        <h5>{{ trans('books_trans.gender') }}:</h5>
        <p>{{ trans("books_trans.gender_{$book->gender}") }}</p>

        @if($book->message)
            <h5>{{ trans('books_trans.message') }}:</h5>
            <p>{{ $book->message }}</p>
        @endif
    </div>
@endsection
