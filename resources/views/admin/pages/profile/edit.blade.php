@extends('admin.layouts.master')
@section('css')
@section('title')
    {{trans('Works_trans.profile_setting')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('Works_trans.profile_setting')}}
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
                            <form action="{{route('update.profile')}}" method="post" enctype="multipart/form-data">
                                {{method_field('put')}}
                                @csrf
                                <div class="form-row font-weight-bold">
                                    <div class="col-md-12">
                                        <!-- Profile picture card-->
                                        <div class="card mb-4 mb-xl-0">
                                            <div class="card-body text-center">
                                                <div for="label" class="text-left">{{trans('Works_trans.profile_image')}}</div>
                                                <!-- Profile picture image-->
                                                @if($user->logo)
                                                    <img
                                                        src="{{env('APP_URL').'public/attachments/profileImage/'.$user->logo}}"
                                                        class="img-account-profile rounded-circle mb-2">
                                                @else
                                                    <img src="{{env('APP_URL').'public/assets/images/faces/6.jpg'}}"
                                                         alt="avatar" class="img-account-profile rounded-circle mb-2">
                                                @endif
                                            <!-- Profile picture help block-->
                                                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than
                                                    5 MB
                                                </div>
                                                <!-- Profile picture upload button-->
                                                <input class="btn btn-primary" name="logo" type="file"/>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="hidden" name="id" value="{{$user -> id }}">
                                        <label for="name">{{trans('Works_trans.name')}}</label>
                                        <input type="text" name="name" class="form-control"
                                               value="{{ $user->name }}"/>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="title">{{trans('Works_trans.email')}}</label>
                                        <input type="email" name="email" class="form-control"
                                               value="{{ $user->email}}"/>
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label
                                            for="password"
                                            class="mr-sm-2 text-bold">{{trans('Works_trans.password')}}</label>
                                        <input class="form-control"  type="password"/>
                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <br>
                                        <br>
                                        <label for="label"
                                               >{{trans('skills_trans.file_name')}}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"
                                                                  id="inputGroupFileAddon01">{{trans('skills_trans.upload')}}</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="file_name"
                                                       class="custom-file-input" id="inputGroupFile01"
                                                       aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label"
                                                       for="file_name">{{trans('skills_trans.file_name')}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <button class="btn btn-success nextBtn btn-lg pull-right font-weight-bolder"
                                        type="submit">{{trans('Works_trans.Submit')}}</button>
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
