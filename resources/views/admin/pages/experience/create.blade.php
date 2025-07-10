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
                            <form action="{{route('experiences.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row font-weight-bold">
                                    <div class="col-md-6">
                                        <label for="title">{{trans('experiences_trans.title')}}</label>
                                        <input type="text" name="title" class="form-control" value="{{old('title')}}">
                                        @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="title">{{trans('experiences_trans.title_en')}}</label>
                                        <input type="text" name="title_en" class="form-control"
                                               value="{{old('title_en')}}">
                                        @error('title_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label
                                            for="date_from"
                                            class="mr-sm-2 text-bold">{{trans('experiences_trans.date_from')}}</label>
                                        <input class="form-control" name="date_from"
                                               value="{{old('date_from')}}"/>
                                        @error('date_from')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="date_to"
                                               class="mr-sm-2 text-bold">{{trans('experiences_trans.date_to')}}</label>
                                        <input class="form-control" name="date_to"
                                               value="{{old('date_to')}}"/>
                                        <div class="font-weight-bolder"><span class="text-danger">{{trans('experiences_trans.Optional')}}</span></div>
                                        @error('date_to')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <label for="logo"
                                               class="mr-sm-2">{{trans('experiences_trans.company_logo')}}</label>
                                        <input type="file" class="form-control" name="image" value="{{old('image')}}"/>
                                        @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br><br>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success"
                                            >{{trans('experiences_trans.Submit')}}</button>
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
        $('input[name="date_from"]').datepicker( {
            format: "mm-yyyy",
            viewMode: "months",
            minViewMode: "months"
        });

        $('input[name="date_to"]').datepicker( {
            format: "mm-yyyy",
            viewMode: "months",
            minViewMode: "months"
        });

    </script>
@endsection
