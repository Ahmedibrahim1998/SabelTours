@extends('admin.layouts.master')
@section('css')
@section('title')
    {{ trans('trainings_trans.edit_training') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('trainings_trans.edit_training') }}
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
                            <form action="{{ route('trainings.update', 'test') }}" method="post">
                                {{ method_field('patch') }}
                                @csrf
                                <div class="row font-weight-bold">
                                    <div class="col">
                                        <input type="hidden" class="form-control" name="id"
                                               value="{{ $training->id }}"/>
                                        <label for="course_name"
                                               class="mr-sm-2 text-bold">{{ trans('trainings_trans.course_name') }}
                                            :</label>
                                        <input type="text" class="form-control"
                                               name="course_name"
                                               value="{{ $training->getTranslation('course_name', 'ar') }}"/>
                                        @error('course_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col font-weight-bold">
                                        <label for="course_name_en"
                                               class="mr-sm-2 text-bold">{{ trans('trainings_trans.course_name_en') }}
                                            :</label>
                                        <input type="text" class="form-control"
                                               name="course_name_en"
                                               value="{{ $training->getTranslation('course_name', 'en') }}"/>
                                        @error('course_name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row font-weight-bold">
                                    <div class="col">
                                        <label
                                            for="date_from">{{trans('trainings_trans.date')}}</label>
                                        <input class="form-control" name="date"
                                               value="{{$training->date}}"/>
                                        @error('date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row font-weight-bold">
                                    <div class="col">
                                        <label
                                            for="note">{{trans('trainings_trans.note')}}</label>
                                        <textarea name="note"
                                                  class="form-control"> {{$training->note}}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit"
                                            class="btn btn-success">{{ trans('trainings_trans.Submit') }}</button>
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
