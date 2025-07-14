@extends('admin.layouts.master')
@section('title', trans('books_trans.edit_book'))

@section('content')
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="row">
            @foreach(['first_name','last_name','email','phone','travel_date','stay_duration','children_count','number_person','accommodation_message','message'] as $field)
                <div class="form-group col-md-6">
                    <label>{{ trans('books_trans.' . $field) }}</label>
                    <input type="{{ in_array($field,['email','phone'])?'text':(in_array($field,['travel_date'])?'date':'text') }}"
                           name="{{ $field }}" class="form-control"
                           value="{{ old($field, $book->{$field}) }}">
                    @error($field)<small class="text-danger">{{ $message }}</small>@enderror
                </div>
            @endforeach

            <div class="form-group col-md-4">
                <label>{{ __('books_trans.accommodation_type') }}</label>
                <select name="accommodation_type" class="form-control">
                    @foreach(['family','single','shared'] as $opt)
                        <option value="{{ $opt }}" {{ $book->accommodation_type==$opt?'selected':'' }}>
                            {{ trans('books_trans.accommodation_'.$opt) }}
                        </option>
                    @endforeach
                </select>
                @error('accommodation_type')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="form-group col-md-4">
                <label>{{ __('books_trans.gender') }}</label>
                <select name="gender" class="form-control">
                    @foreach(['male','female'] as $opt)
                        <option value="{{ $opt }}" {{ $book->gender==$opt?'selected':'' }}>
                            {{ trans('books_trans.gender_'.$opt) }}
                        </option>
                    @endforeach
                </select>
                @error('gender')<small class="text-danger">{{ $message }}</small>@enderror
            </div>
        </div>
        <button class="btn btn-primary">{{ __('books_trans.update') }}</button>
    </form>
@endsection
