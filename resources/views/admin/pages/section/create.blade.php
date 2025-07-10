@extends('admin.layouts.master')
@section('css')
@section('title')
    {{ trans('main_trans.add_section') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('main_trans.add_section') }}
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
                            <form action="{{route('sections.store','test')}}" method="POST" id="form">
                                <!-- add_form -->
                                @csrf
                                <div class="row font-weight-bold">
                                    <div class="col">
                                        <label for="specialize"
                                               class="mr-sm-2 text-bold">{{ trans('sections_trans.section_name') }}
                                            :</label>
                                        <input type="text" class="form-control" name="section_name"
                                               value="{{old('section_name')}}"/>
                                        @error('section_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="specialize_en"
                                               class="mr-sm-2 text-bold">{{ trans('sections_trans.section_name_en') }}
                                            :</label>
                                        <input type="text" class="form-control" name="section_name_en"
                                               value="{{old('section_name_en')}}"/>
                                        @error('section_name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row font-weight-bold">
                                    <div class="col">
                                        <label
                                            for="section_url"
                                            class="mr-sm-2 text-bold">{{trans('sections_trans.section_url')}}</label>
                                        <input type="text" class="form-control" name="section_url"
                                               value="{{old('section_url')}}"/>
                                        @error('section_url')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label
                                            for="section_font_awesome"
                                            class="mr-sm-2 text-bold">{{trans('sections_trans.section_font_awesome')}}</label>
                                        <input type="text" class="form-control" name="section_font_awesome"
                                               placeholder="fas fa-users"
                                               value="{{old('section_font_awesome')}}"/>
                                        @error('section_font_awesome')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row font-weight-bold">
                                    <div class="col">
                                        <label for="section_view_file"
                                               class="mr-sm-2 text-bold">{{ trans('sections_trans.section_view_file') }}
                                            :</label>
                                        <input type="text" class="form-control" name="section_view_file"
                                               value="{{old('section_view_file')}}"/>
                                        @error('section_view_file')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br><br>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success"
                                            id="ajaxSubmit">{{ trans('sections_trans.Submit') }}</button>
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
