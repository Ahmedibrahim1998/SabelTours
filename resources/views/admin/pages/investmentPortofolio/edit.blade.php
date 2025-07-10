@extends('admin.layouts.master')
@section('css')
@section('title')
    {{ trans('investmentportfolios_trans.Edit') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('investmentportfolios_trans.Edit') }}
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
                            <form action="{{ route('investmentPortfolios.update', 'test') }}"
                                  method="post" enctype="multipart/form-data">
                                {{ method_field('PUT') }}
                                @csrf
                                <div class="row font-weight-bold">
                                    <div class="col-md-12">
                                        <label for="type"
                                               class="mr-sm-2">{{ trans('investmentportfolios_trans.name') }}
                                        </label>
                                        <input type="text" class="form-control" name="name"
                                               value="{{$investmentportfolio->name}}">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="hidden" class="form-control" name="id"
                                               value="{{ $investmentportfolio->id }}"/>
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
                                                       class="custom-file-input"
                                                       id="inputGroupFile01"
                                                       aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label"
                                                       for="company_log">{{trans('experiences_trans.company_logo')}}</label>
                                                @error('company_log')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="type"
                                               class="mr-sm-2">{{ trans('investmentportfolios_trans.type') }}
                                            :</label>
                                        <select name="type" class="form-control">
                                            <option class="font-weight-bold" selected>Open To Select menu</option>
                                            <option
                                                value="private" {{$investmentportfolio->type=='private' ? 'selected' : ''}}>
                                                Private
                                            </option>
                                            <option
                                                value="startups" {{$investmentportfolio->type=='startups' ? 'selected' : ''}}>
                                                Start Ups
                                            </option>
                                            <option
                                                value="listed" {{$investmentportfolio->type=='listed' ? 'selected' : ''}}>
                                                Listed
                                            </option>
                                            <option
                                                value="other" {{$investmentportfolio->type=='other' ? 'selected' : ''}}>
                                                Other
                                            </option>

                                        </select>
                                        @error('type')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
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
