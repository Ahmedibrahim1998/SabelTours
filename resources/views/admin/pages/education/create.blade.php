@extends('admin.layouts.master')
@section('css')
@section('title')
    {{ trans('main_trans.add_education') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('main_trans.add_education') }}
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
                            <form action="{{route('educations.store','test')}}" method="POST" id="form">
                                <!-- add_form -->
                                @csrf
                                <div class="row font-weight-bold">
                                    <div class="col">
                                        <label for="specialize"
                                               class="mr-sm-2 text-bold">{{ trans('educations_trans.specialize') }}
                                            :</label>
                                        <input type="text" class="form-control" name="specialize"
                                               value="{{old('specialize')}}"/>
                                        @error('specialize')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="specialize_en"
                                               class="mr-sm-2 text-bold">{{ trans('educations_trans.specialize_en') }}
                                            :</label>
                                        <input type="text" class="form-control" name="specialize_en"
                                               value="{{old('specialize_en')}}"/>
                                        @error('specialize_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row font-weight-bold">
                                    <div class="col">
                                        <label
                                            for="scientific_side"
                                            class="mr-sm-2 text-bold">{{trans('educations_trans.scientific_side')}}</label>
                                        <input type="text" class="form-control" name="scientific_side"
                                               value="{{old('scientific_side')}}"/>
                                        @error('scientific_side')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label
                                            for="scientific_side"
                                            class="mr-sm-2 text-bold">{{trans('educations_trans.scientific_side_en')}}</label>
                                        <input type="text" class="form-control" name="scientific_side_en"
                                               value="{{old('scientific_side_en')}}"/>
                                        @error('scientific_side_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row font-weight-bold">
                                    <div class="col">
                                        <label
                                            for="date_from"
                                            class="mr-sm-2 text-bold">{{trans('educations_trans.date_from')}}</label>
                                        <input class="form-control" name="date_from"
                                               value="{{old('date_from')}}"/>
                                        @error('date_from')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="date_to"
                                               class="mr-sm-2 text-bold">{{trans('educations_trans.date_to')}}</label>
                                        <input class="form-control" name="date_to"
                                               value="{{old('date_to')}}"/>
                                        @error('date_to')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row font-weight-bold">
                                    <div class="col">
                                        <label
                                            for="note"
                                            class="mr-sm-2 text-bold">{{trans('educations_trans.note')}}</label>
                                        <textarea name="note" class="form-control"
                                                  aria-placeholder="Enter text here..."> {{old('note')}}</textarea>
                                    </div>
                                </div>
                                <br><br>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success"
                                            id="ajaxSubmit">{{ trans('educations_trans.Submit') }}</button>
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
        $('input[name="date_from"]').datepicker( {
            format: "mm-yyyy",
            viewMode: "months",
            minViewMode: "months"
        });

        $('input[name="date_to"]').datepicker( {
            format: "mm-yyyy",
            viewMode: "months",
            minViewMode: "months"
        });
    </script>
@endsection
