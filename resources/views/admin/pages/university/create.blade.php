@extends('admin.layouts.master')
@section('css')
@section('title')
    {{ trans('universities_trans.add_university') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('universities_trans.add_university') }}
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
                            <form action="{{ route('universities.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row font-weight-bold">
                                    <div class="col">
                                        <label for="university_name"
                                               class="mr-sm-2 text-bold">{{ trans('universities_trans.university_name') }}
                                            :</label>
                                        <input type="text" class="form-control" name="university_name"
                                               value="{{old('university_name')}}"/>
                                        @error('university_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="university_name_en"
                                               class="mr-sm-2 text-bold">{{ trans('universities_trans.university_name_en') }}
                                            :</label>
                                        <input type="text" class="form-control" name="university_name_en"
                                               value="{{old('university_name_en')}}"/>
                                        @error('university_name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <br><br>
                                <div class="col">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"
                                                                  id="inputGroupFileAddon01">{{trans('universities_trans.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="university_logo"
                                                   class="custom-file-input"
                                                   id="inputGroupFile01"
                                                   aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label"
                                                   for="university_logo">{{trans('universities_trans.university_logo')}}</label>
                                        </div>
                                    </div>
                                    @error('university_logo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <br>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit"
                                            class="btn btn-success">{{ trans('universities_trans.Submit') }}</button>
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
