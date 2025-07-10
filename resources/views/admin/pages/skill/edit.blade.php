@extends('admin.layouts.master')
@section('css')
@section('title')
    {{ trans('skills_trans.edit_skill') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('skills_trans.edit_skill') }}
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
                            <form action="{{ route('skills.update', 'test') }}" method="post"
                                  enctype="multipart/form-data">
                                {{ method_field('patch') }}
                                @csrf
                                <div class="row font-weight-bold">
                                    <div class="col">
                                        <input type="hidden" class="form-control" name="id"
                                               value="{{ $skill->id }}"/>
                                        <label for="skill_name"
                                               class="mr-sm-2 text-bold">{{ trans('skills_trans.skill_name') }}
                                            :</label>
                                        <input type="text" class="form-control"
                                               name="skill_name"
                                               value="{{ $skill->getTranslation('skill_name', 'ar') }}"/>
                                        @error('skill_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col font-weight-bold">
                                        <label for="course_name_en"
                                               class="mr-sm-2 text-bold">{{ trans('skills_trans.skill_name_en') }}
                                            :</label>
                                        <input type="text" class="form-control"
                                               name="skill_name_en"
                                               value="{{ $skill->getTranslation('skill_name', 'en') }}"/>
                                        @error('skill_name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row font-weight-bold">
                                    <div class="col">
                                        <label
                                            for="date_from">{{trans('skills_trans.rate')}}</label>
                                        <input type="number" class="form-control" name="rate"
                                               value="{{$skill->rate}}"/>
                                        @error('rate')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row font-weight-bold">
                                    <div class="col">
                                        <label
                                            for="note">{{trans('skills_trans.note')}}</label>
                                        <textarea name="note"
                                                  class="form-control">{{$skill->note}}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit"
                                            class="btn btn-success">{{ trans('skills_trans.Submit') }}</button>
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
