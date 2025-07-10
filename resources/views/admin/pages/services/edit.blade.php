@extends('admin.layouts.master')
@section('css')
@section('title')
    {{ trans('services_trans.edit_service') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('services_trans.edit_service') }}
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
                            <form action="{{route('services.update','test')}}" method="post"
                                  enctype="multipart/form-data">
                                {{method_field('patch')}}
                                @csrf
                                <div class="form-row font-weight-bold">
                                    <div class="col-md-6">
                                        <input type="hidden" name="id" value="{{$service->id}}" class="form-control"/>
                                        <label for="title">{{trans('services_trans.service_name')}}</label>
                                        <input type="text" name="service_name"
                                               value="{{ $service->getTranslation('service_name', 'ar') }}" class="
                                               form-control">
                                        @error('service_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="title">{{trans('services_trans.service_name_en')}}</label>
                                        <input type="text" name="service_name_en" class="form-control"
                                               value="{{ $service->getTranslation('service_name', 'en') }}">
                                        @error('service_name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label
                                            for="about_service"
                                            class="mr-sm-2 text-bold">{{trans('services_trans.about_service')}}</label>
                                        <textarea class="form-control" col="10" rows="10"
                                                  name="about_service">{{ $service->getTranslation('about_service', 'ar')}}</textarea>
                                        @error('about_service')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label
                                            for="about_service"
                                            class="mr-sm-2 text-bold">{{trans('services_trans.about_service_en')}}</label>
                                        <textarea class="form-control" col="10" rows="10"
                                                  name="about_service_en">{{ $service->getTranslation('about_service', 'en')}}</textarea>
                                        @error('about_service_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <label for="image_icon"
                                               class="mr-sm-2">{{trans('services_trans.image_icon')}}</label>
                                        <input type="file" class="form-control" name="image_icon"/>
                                        @error('image_icon')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br><br>
                                <div class="modal-footer">
                                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                            type="submit">{{trans('services_trans.Submit')}}</button>
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
