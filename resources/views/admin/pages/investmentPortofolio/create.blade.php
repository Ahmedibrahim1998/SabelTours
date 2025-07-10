@extends('admin.layouts.master')
@section('css')
@section('title')
    {{ trans('investmentportfolios_trans.add_investment') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('investmentportfolios_trans.add_investment') }}
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
                            <form action="{{ route('investmentPortfolios.store') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row font-weight-bold">
                                    <div class="col-md-12">
                                        <label for="name"
                                               class="mr-sm-2">{{ trans('investmentportfolios_trans.name') }}
                                        </label>
                                        <input type="text" class="form-control" name="name"
                                               value="{{old('name')}}">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <br>
                                        <br>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"
                                                                  id="inputGroupFileAddon01">{{trans('skills_trans.upload')}}</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="company_log"
                                                       class="custom-file-input" id="inputGroupFile01"
                                                       aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label"
                                                       for="company_log">{{trans('experiences_trans.company_logo')}}</label>
                                            </div>
                                        </div>
                                        @error('company_log')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <br>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="type"
                                               class="mr-sm-2">{{ trans('investmentportfolios_trans.type') }}
                                            :</label>
                                        <select name="type" class="form-control" value="{{old('type')}}">
                                            <option class="font-weight-bold" selected>{{ trans('investmentportfolios_trans.open_to_select_menu') }}</option>
                                            <option value="private">Private</option>
                                            <option value="startups">Start Ups</option>
                                            <option value="listed">Listed</option>
                                            <option value="other">Other</option>
                                        </select>
                                        @error('type')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br><br>
                                <div class="modal-footer">
                                    <button type="submit"
                                            class="btn btn-success">{{ trans('investmentportfolios_trans.Submit') }}</button>
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
