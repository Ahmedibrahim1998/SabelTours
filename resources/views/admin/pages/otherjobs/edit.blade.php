@extends('admin.layouts.master')
@section('css')
@endsection
@section('title')
    {{ trans('main_trans.edit_otherJob') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
@endsection

@section('PageTitle')
    {{ trans('main_trans.edit_otherJob') }}
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
                            <form action="{{route('otherJobs.update','test')}}" method="post">
                                {{method_field('patch')}}
                                @csrf
                                <div class="form-row font-weight-bold">
                                    <div class="col-md-6">
                                        <input type="hidden" name="id" class="form-control"
                                               value="{{ $otherJobs->id}}"/>
                                        <label for="title">{{trans('otherJobs_trans.title_job')}}</label>
                                        <input type="text" name="title_job" class="form-control"
                                               value="{{ $otherJobs->getTranslation('title_job', 'ar') }}"/>
                                        @error('title_job')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="title">{{trans('otherJobs_trans.title_job_en')}}</label>
                                        <input type="text" name="title_job_en" class="form-control"
                                               value="{{ $otherJobs->getTranslation('title_job', 'en') }}"/>
                                        @error('title_job_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                        type="submit">{{trans('otherJobs_trans.Submit')}}</button>
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
