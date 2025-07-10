@extends('admin.layouts.master')
@section('css')
    <style>
        a.up {
            pointer-events: none;
            cursor: default;
        }

        a.down {
            pointer-events: none;
            cursor: default;
        }
    </style>
@endsection
@section('title')
    {{trans('main_trans.otherJobs')}}
@endsection
@section('page-header')
    <!-- breadcrumb -->
@endsection
@section('PageTitle')
    {{trans('main_trans.otherJobs')}}
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
                                <a href="{{route('otherJobs.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('otherJobs_trans.add_otherJobs') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('otherJobs_trans.title_job')}}</th>
                                            <th>{{trans('otherJobs_trans.arrange_it')}}</th>
                                            <th>{{ trans('otherJobs_trans.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($otherJobs  as $otherJob)
                                            <tr>
                                                <?php $i++; ?>
                                                <td>{{ $i }}</td>
                                                <td>{{$otherJob->title_job}}</td>
                                                <td>
                                                    @if($otherJob->arrange_it == 1)
                                                        <a href="{{route('sortOtherJobs',['otherJob'=>$otherJob, 'type' => 'up'])}}"
                                                           style="font-size: 20px" class="up"><i
                                                                class="fa fa-arrow-up"></i></a>
                                                    @else
                                                        <a href="{{route('sortOtherJobs',['otherJob'=>$otherJob, 'type' => 'up'])}}"
                                                           style="font-size: 20px; color:#000000"><i
                                                                class="fa fa-arrow-up"></i></a>
                                                    @endif
                                                    &nbsp;&nbsp;
                                                    @php $down = \App\Models\OtherJob::latest('arrange_it')->first(); @endphp
                                                    @if($otherJob->arrange_it == $down->arrange_it)
                                                        <a href="{{route('sortOtherJobs',['otherJob'=>$otherJob, 'type' => 'down'])}}"
                                                           style="font-size: 20px" class="down"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{route('sortOtherJobs',['otherJob'=>$otherJob, 'type' => 'down'])}}"
                                                           style="font-size: 20px; color:#000000"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('otherJobs.edit',$otherJob->id)}}"
                                                       class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                            class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#delete_Experiences{{ $otherJob->id }}"
                                                            title="{{ trans('otherJobs_trans.Delete') }}"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="delete_Experiences{{$otherJob->id}}"
                                                 tabindex="-1"
                                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('otherJobs.destroy','test')}}"
                                                          method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title"
                                                                    id="exampleModalLabel">{{ trans('otherJobs_trans.delete_otherJobs') }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p> {{ trans('otherJobs_trans.Warning_otherJobs') }}</p>
                                                                <input type="hidden" name="id"
                                                                       value="{{$otherJob->id}}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{ trans('otherJobs_trans.Close') }}</button>
                                                                    <button type="submit"
                                                                            class="btn btn-danger">{{ trans('otherJobs_trans.Submit') }}</button>
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
