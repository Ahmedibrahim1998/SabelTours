@extends('admin.layouts.master')
@section('css')
@section('title')
    {{ trans('main_trans.edit_education') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('main_trans.edit_education') }}
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
                            <form action="{{ route('educations.update', 'test') }}" method="post">
                                {{ method_field('patch') }}
                                @csrf
                                <div class="row font-weight-bold">
                                    <div class="col">
                                        <label for="specialize"
                                               class="mr-sm-2">{{ trans('educations_trans.specialize') }}
                                            :</label>
                                        <input type="text" class="form-control" name="specialize"
                                               value="{{ $education->getTranslation('specialize', 'ar') }}"/>
                                        @error('specialize')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="hidden" class="form-control" name="id"
                                               value="{{ $education->id }}"/>
                                    </div>
                                    <div class="col">
                                        <label for="specializ_en"
                                               class="mr-sm-2">{{ trans('educations_trans.specialize_en') }}
                                            :</label>
                                        <input type="text" class="form-control" name="specialize_en"
                                               value="{{ $education->getTranslation('specialize', 'en') }}"/>
                                        @error('specialize_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="hidden" class="form-control" name="id"
                                               value="{{ $education->id }}"/>
                                    </div>
                                </div>
                                <div class="row  font-weight-bold">
                                    <div class="col">
                                        <label
                                            for="scientific_side">{{trans('educations_trans.scientific_side')}}</label>
                                        <input type="text" class="form-control"
                                               name="scientific_side"
                                               value="{{ $education->getTranslation('scientific_side', 'ar') }}"/>
                                        @error('scientific_side')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label
                                            for="scientific_side">{{trans('educations_trans.scientific_side_en')}}</label>
                                        <input type="text" class="form-control"
                                               name="scientific_side_en"
                                               value="{{ $education->getTranslation('scientific_side', 'en') }}"/>
                                        @error('scientific_side_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row  font-weight-bold">
                                    <div class="col">
                                        <label
                                            for="date_from">{{trans('educations_trans.date_from')}}</label>
                                        <input class="form-control" name="date_from"
                                               value="{{$education->date_from}}"/>
                                        @error('date_from')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label
                                            for="date_to">{{trans('educations_trans.date_to')}}</label>
                                        <input class="form-control" name="date_to"
                                               value="{{$education->date_to}}"/>
                                        @error('date_to')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row  font-weight-bold">
                                    <div class="col">
                                        <label
                                            for="note">{{trans('educations_trans.note')}}</label>
                                        <textarea name="note" class="form-control"> {{$education->note}}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit"
                                            class="btn btn-success">{{ trans('educations_trans.Submit') }}</button>
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
