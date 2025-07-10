@extends('admin.layouts.master')
@section('css')
@section('title')
    {{ trans('main_trans.add_say') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('main_trans.add_say') }}
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
                            <form action="{{route('says.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row font-weight-bold">
                                    <div class="col-md-4">
                                        <label for="text">{{trans('says_trans.user_name')}}</label>
                                        <input name="name" type="text" class="form-control" value="{{old('name')}}">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="text">{{trans('says_trans.title')}}</label>
                                        <input name="title" type="text" class="form-control" value="{{old('title')}}">
                                        @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="text">{{trans('says_trans.user_image')}}</label>
                                        <input type="file" name="logo" class="form-control">
                                        @error('logo')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label for="text">{{trans('says_trans.text')}}</label>
                                        <textarea name="text" col="5" rows="5" class="form-control">{{old('text')}}</textarea>
                                        @error('text')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="title">{{trans('says_trans.text_en')}}</label>
                                        <textarea name="text_en" col="5" rows="5" class="form-control">{{old('text_en')}}</textarea>

                                        @error('text_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br><br>
                                <div class="modal-footer">
                                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                            type="submit">{{trans('says_trans.Submit')}}</button>
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
@endsection
