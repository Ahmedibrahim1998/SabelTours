@extends('admin.layouts.master')
@section('css')
@section('title')
    {{trans('main_trans.SocialLinks')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.SocialLinks')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('socialLinks.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('socialLinks_trans.add_socialLinks') }} </a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('socialLinks_trans.icon') }}</th>
                                            <th>{{ trans('socialLinks_trans.link') }}</th>
                                            <th>{{ trans('socialLinks_trans.position') }}</th>
                                            <th>{{ trans('socialLinks_trans.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($socialLinks as $socialLink)
                                            <tr>
                                                <?php $i++; ?>
                                                <td>{{ $i}}</td>
                                                <td>
                                                    @if($socialLink->icon)
                                                        <img
                                                            src="{{env('APP_URL').'public/attachments/icons/'. $socialLink->icon}}"
                                                            class="img-thumbnail" alt="company_log"
                                                            style="width:100px; height:100px;">
                                                    @else
                                                        <img src="{{env('APP_URL').'public/assets/images/faces/6.jpg'}}"
                                                             class="img-thumbnail" alt="company_log"
                                                             style="width:100px; height:100px;">
                                                    @endif
                                                </td>
                                                <td>{{ $socialLink->link }}</td>
                                                <td>
                                                    {{ ($socialLink->position=='up') ? trans('socialLinks_trans.up'):trans('socialLinks_trans.down') }}</td>
                                                <td>
                                                    <a href="{{route('socialLinks.edit',$socialLink->id)}}"
                                                       class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                            class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#delete_SocialLinks{{ $socialLink->id }}"
                                                            title="{{ trans('socialLinks_trans.Delete') }}"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="delete_SocialLinks{{$socialLink->id}}"
                                                 tabindex="-1"
                                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('socialLinks.destroy','test')}}"
                                                          method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title"
                                                                    id="exampleModalLabel">{{ trans('socialLinks_trans.delete_socialLinks') }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p> {{ trans('socialLinks_trans.Warning_ssocialLinks') }}</p>
                                                                <input type="hidden" name="id"
                                                                       value="{{$socialLink->id}}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{ trans('socialLinks_trans.Close') }}</button>
                                                                    <button type="submit"
                                                                            class="btn btn-danger">{{ trans('socialLinks_trans.submit') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
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
