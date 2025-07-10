@extends('admin.layouts.master')
@section('css')
@section('title')
    {{ trans('main_trans.add_experience') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('main_trans.add_experience') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{ route('expertises.store') }}" method="POST">
                                @csrf
                                <div class="row  font-weight-bold">
                                    <div class="col-md-4">
                                        <label for="name"
                                               class="mr-sm-2 text-bold">{{ trans('expertises_trans.name') }}
                                            :</label>
                                        <input type="text" class="form-control" name="name"
                                               value="{{old('name')}}"/>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="specialize_en"
                                               class="mr-sm-2 text-bold">{{ trans('expertises_trans.name_en') }}
                                            :</label>
                                        <input type="text" class="form-control" name="name_en"
                                               value="{{old('name_en')}}"/>
                                        @error('name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="created_at"
                                               class="mr-sm-2 text-bold">{{trans('expertises_trans.created_at')}}</label>
                                        <input class="form-control" name="date"
                                               value="{{old('date')}}"/>
                                        @error('created_at')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="modal-footer">
                                    <button type="submit"
                                            class="btn btn-success">{{ trans('expertises_trans.Submit') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script>
        $('input[name="date"]').datepicker( {
            format: "mm-yyyy",
            viewMode: "months",
            minViewMode: "months"
        });
    </script>
@endsection
