@extends('admin.layouts.master')
@section('css')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/css/bootstrap-colorpicker.css"
          integrity="sha512-HcfKB3Y0Dvf+k1XOwAD6d0LXRFpCnwsapllBQIvvLtO2KMTa0nI5MtuTv3DuawpsiA0ztTeu690DnMux/SuXJQ=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"/>
@section('title')
    {{trans("settings_trans.setting")}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans("settings_trans.setting")}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @php
        $collection = App\Models\Setting::all();
        $data['settings'] = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });
        foreach ($data['settings'] as $key => $value) {
            $data = $collection->flatMap(function ($collection) {
                return [$collection->key => $collection->value];
            });
        }
    @endphp
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form method="post" action="{{route('settings.update','test')}}" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="row ">
                            <div class="col-md-6 border-right-2 border-right-blue-400">
                                <h3 class="text-center font-weight-bold text-success">{{trans("settings_trans.Header_Information")}}</h3>
                                <div class="form-group row mt-5">
                                    <label
                                        class="col-lg-4 col-form-label font-weight-bold">{{trans('settings_trans.header_video')}}</label>
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <video width="320" height="240" autoplay muted controls>
                                                <source
                                                    src="{{env('APP_URL').'public/attachments/videos/'.$data['video']}}"
                                                    type="video/mp4">
                                            </video>
                                        </div>
                                        <input name="video" accept="video/mp4,video/x-m4v,video/*" type="file"
                                               class="file-input" data-show-caption="false" data-show-upload="false"
                                               data-fouc>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-4 col-form-label font-weight-bold">{{trans('settings_trans.Dr_image')}}</label>
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <img style="width: 200px; height: 200px"
                                                 src="{{ env('APP_URL').'public/attachments/logo/'.$setting['Dr_image'] }}"
                                                 alt="">
                                        </div>
                                        <input name="Dr_image" accept="image/*" type="file" class="file-input"
                                               data-show-caption="false" data-show-upload="false" data-fouc>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-4 col-form-label font-weight-bold">{{trans('settings_trans.header_logo')}}</label>
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <img style="width: 200px; height: 200px"
                                                 src="{{ env('APP_URL').'public/attachments/logo/'.$setting['header_logo'] }}"
                                                 alt="">
                                        </div>
                                        <input name="header_logo" accept="image/*" type="file" class="file-input"
                                               data-show-caption="false" data-show-upload="false" data-fouc>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-4 col-form-label font-weight-bold">{{trans('settings_trans.write_under_logo_ar')}}</label>
                                    <div class="col-lg-8">
                                        <input name="write_under_logo_ar" value="{{ $setting['write_under_logo_ar'] }}"
                                               type="text" class="form-control" placeholder="School Acronym">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-4 col-form-label font-weight-bold">{{trans('settings_trans.write_under_logo_en')}}</label>
                                    <div class="col-lg-8">
                                        <input name="write_under_logo_en" value="{{ $setting['write_under_logo_en'] }}"
                                               type="text" class="form-control" placeholder="School Acronym">
                                    </div>
                                </div>
                                <h3 class="text-center font-weight-bold text-info m-5">{{trans('settings_trans.You_Can_Change_Data_Of_Footer')}} </h3>

                                <div class="form-group row">
                                    <label
                                        class="col-lg-4 col-form-label font-weight-bold">{{trans('settings_trans.years_of_experince')}}</label>
                                    <div class="col-lg-8">
                                        <input name="years_of_experince" value="{{ $setting['years_of_experince'] }}"
                                               type="text" class="form-control" placeholder="School Acronym">
                                    </div>
                                    <label
                                        class="col-lg-4 col-form-label font-weight-bold">{{trans('settings_trans.footerBGColor')}}</label>
                                    <div class="col-lg-8 input-group colorpicker-component ">
                                        <input type="text" name="footerBGColor" value="{{ $setting['footerBGColor'] }}"
                                               class="form-control m-2"/>
                                    </div>
                                    <label
                                        class="col-lg-4 col-form-label font-weight-bold">{{trans('settings_trans.footerTextColor')}}</label>
                                    <div class="col-lg-8 input-group colorpicker-component ">
                                        <input type="text" name="footerTextColor"
                                               value="{{ $setting['footerTextColor'] }}"
                                               class="form-control m-2"/>
                                    </div>
                                </div>
                                <h3 class="text-center font-weight-bold text-danger m-5">{{trans('settings_trans.Website_Logo')}}</h3>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-4 col-form-label font-weight-bold">{{trans('settings_trans.website_logo')}}</label>
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <img
                                                style="width: {{$setting['logo_width']}}px; height: {{$setting['logo_height']}}px"
                                                src="{{ env('APP_URL').'public/attachments/logo/'.$setting['website_logo'] }}"
                                                alt="">
                                        </div>
                                        <input name="website_logo" accept="image/*" type="file" class="file-input"
                                               data-show-caption="false" data-show-upload="false" data-fouc>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-4 col-form-label font-weight-bold">{{trans('settings_trans.logo_width')}}</label>
                                    <div class="col-lg-8">
                                        <input name="logo_width" value="{{ $setting['logo_width'] }}" type="number"
                                               class="form-control" placeholder="Logo Width">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-4 col-form-label font-weight-bold">{{trans('settings_trans.logo_height')}}</label>
                                    <div class="col-lg-8">
                                        <input name="logo_height" value="{{ $setting['logo_height'] }}" type="number"
                                               class="form-control" placeholder="Logo Height">
                                    </div>
                                </div>

                                <h3 class="text-center font-weight-bold text-danger m-5">{{trans('settings_trans.Dashboard_Logo')}}</h3>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-4 col-form-label font-weight-bold">{{trans('settings_trans.dashboard_logo')}}</label>
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <img
                                                style="width: {{$setting['dashboard_logo_width']}}px; height: {{$setting['dashboard_logo_height']}}px"
                                                src="{{ env('APP_URL').'public/attachments/logo/'.$setting['dashboard_logo'] }}"
                                                alt="">
                                        </div>
                                        <input name="dashboard_logo" accept="image/*" type="file" class="file-input"
                                               data-show-caption="false" data-show-upload="false" data-fouc>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-4 col-form-label font-weight-bold">{{trans('settings_trans.dashboard_logo_width')}}</label>
                                    <div class="col-lg-8">
                                        <input name="dashboard_logo_width"
                                               value="{{ $setting['dashboard_logo_width'] }}" type="number"
                                               class="form-control" placeholder="Logo Width">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        class="col-lg-4 col-form-label font-weight-bold">{{trans('settings_trans.dashboard_logo_height')}}</label>
                                    <div class="col-lg-8">
                                        <input name="dashboard_logo_height"
                                               value="{{ $setting['dashboard_logo_height'] }}" type="number"
                                               class="form-control" placeholder="Logo Height">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <h3 class="text-center font-weight-bold text-info m-5">{{trans('settings_trans.contacts_data')}}</h3>
                                <div class="row font-weight-bold">
                                    <div class="col-md-10">
                                        <label for="write_under_logo"
                                               class="mr-sm-2 text-bold" style="font-size: 20px;">{{trans('settings_trans.Let_get_in_touch')}}
                                        </label>
                                        <textarea class="ckeditor form-control"
                                                  name="contact_textarea">{{ $setting['contact_textarea'] }}</textarea>
                                    </div>
                                    <div class="col-md-10">
                                        <label for="contact_startup"
                                               class="mr-sm-2 text-bold" style="font-size: 20px;">{{trans('settings_trans.Startups')}}
                                        </label>
                                        <textarea class="ckeditor form-control"
                                                  name="contact_startup">{{ $setting['contact_startup'] }}</textarea>
                                    </div>
                                    <div class="col-md-10">
                                        <label for="contact_book"
                                               class="mt-3 mb-3"
                                               style="font-size: 20px;"><strong>{{trans('settings_trans.Book')}}</strong>
                                        </label>
                                        <textarea class="ckeditor form-control"
                                                  name="contact_book">{{ $setting['contact_book'] }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                type="submit">{{trans('settings_trans.submit')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')



    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/css/bootstrap-colorpicker.css"
          integrity="sha512-HcfKB3Y0Dvf+k1XOwAD6d0LXRFpCnwsapllBQIvvLtO2KMTa0nI5MtuTv3DuawpsiA0ztTeu690DnMux/SuXJQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script>
        $('.colorpicker').colorpicker();
    </script>

    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        // ckeditor editor
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/js/bootstrap-colorpicker.min.js"
            integrity="sha512-94dgCw8xWrVcgkmOc2fwKjO4dqy/X3q7IjFru6MHJKeaAzCvhkVtOS6S+co+RbcZvvPBngLzuVMApmxkuWZGwQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.colorpicker-component').colorpicker();
    </script>
@endsection
