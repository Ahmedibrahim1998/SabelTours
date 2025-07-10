@extends('admin.layouts.master')
@section('css')
@section('title')
    {{ trans('faqs_trans.edit_FAQS') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('faqs_trans.edit_FAQ') }}
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
                            <form action="{{route('faqs.update','test')}}" method="post"
                                  enctype="multipart/form-data">
                                {{method_field('patch')}}
                                @csrf
                                <div class="form-row font-weight-bold">
                                    <div class="col-md-6">
                                        <input type="hidden" name="id" class="form-control"
                                               value="{{ $faq->id}}"/>
                                        <label for="question">{{trans('faqs_trans.question')}}</label>
                                        <textarea name="question" col="3" rows="3"
                                                  class="form-control">{{ $faq->getTranslation('question', 'ar') }}</textarea>
                                        @error('question')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="question">{{trans('faqs_trans.question_en')}}</label>
                                        <textarea name="question_en" col="3" rows="3"
                                                  class="form-control">{{ $faq->getTranslation('question', 'en') }}</textarea>
                                        @error('question_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="question">{{trans('faqs_trans.answer')}}</label>
                                        <textarea name="answer" col="10" rows="10"
                                                  class="form-control">{{ $faq->getTranslation('answer', 'ar') }}</textarea>
                                        @error('answer')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="question">{{trans('faqs_trans.answer_en')}}</label>
                                        <textarea name="answer_en" col="10" rows="10"
                                                  class="form-control">{{ $faq->getTranslation('answer', 'en') }}</textarea>
                                        @error('answer_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="modal-footer">
                                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                            type="submit">{{trans('faqs_trans.Submit')}}</button>
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
