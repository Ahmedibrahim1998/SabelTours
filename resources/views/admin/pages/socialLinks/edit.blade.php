@extends('admin.layouts.master')
@section('css')
@section('title')
    {{ trans('socialLinks_trans.edit_socialLinks') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('socialLinks_trans.edit_socialLinks') }}
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
                            <form action="{{ route('socialLinks.update', 'test') }}" method="post"
                                  enctype="multipart/form-data">
                                {{ method_field('patch') }}
                                @csrf
                                <div class="row font-weight-bold">
                                    <div class="col">
                                        <input type="hidden" class="form-control" name="id"
                                               value="{{ $socialLink->id }}"/>
                                        <label for="icon"
                                               class="mr-sm-2 text-bold">{{ trans('socialLinks_trans.icon') }}
                                            :</label>
                                        <input type="file" class="form-control" name="icon"/>
                                        @error('icon')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label
                                            for="rate"
                                            class="mr-sm-2 text-bold">{{trans('socialLinks_trans.link')}}</label>
                                        <input type="text" class="form-control" name="link"
                                               value="{{$socialLink->link}}"/>
                                        @error('link')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label
                                            for="note"
                                            class="mr-sm-2 text-bold">{{trans('socialLinks_trans.position')}}</label>
                                        <select name="position" id="position" class="form-control">
                                            <option value="" selected>{{trans('socialLinks_trans.select')}}</option>
                                            <option
                                                value="up" {{ ($socialLink->position == ('up')) ? 'selected' : '' }}>{{trans('socialLinks_trans.up')}}</option>
                                            <option
                                                value="down" {{ ($socialLink->position == ('down')) ? 'selected' : '' }}>{{trans('socialLinks_trans.down')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <br><br>
                                <div class="modal-footer">
                                    <button type="submit"
                                            class="btn btn-success">{{ trans('socialLinks_trans.submit') }}</button>
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
