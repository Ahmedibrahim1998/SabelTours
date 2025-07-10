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
@section('title')
    {{trans('main_trans.training')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.training')}}
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
                                <a href="{{route('trainings.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('trainings_trans.add_training') }} </a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('trainings_trans.course_name') }}</th>
                                            <th>{{ trans('trainings_trans.note') }}</th>
                                            <th>{{ trans('trainings_trans.date') }}</th>
                                            <th>{{ trans('expertises_trans.arrange_it') }}</th>
                                            <th>{{ trans('trainings_trans.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($trainings  as $training)
                                            <tr>
                                                <?php $i++; ?>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $training->course_name }}</td>
                                                    <td>{{ $training->note }}</td>
                                                    <td>{{ $training->date }}</td>
                                                    <td>
                                                        @if($training->arrange_it == 1)
                                                            <a href="{{route('sortTraining',['training'=>$training, 'type' => 'up'])}}"
                                                               style="font-size: 20px" class="up"><i
                                                                    class="fa fa-arrow-up"></i></a>
                                                        @else
                                                            <a href="{{route('sortTraining',['training'=>$training, 'type' => 'up'])}}"
                                                               style="font-size: 20px; color:#000000"><i
                                                                    class="fa fa-arrow-up"></i></a>
                                                        @endif
                                                        &nbsp;&nbsp;
                                                        @php $down = \App\Models\Training::latest('arrange_it')->first(); @endphp
                                                        @if($training->arrange_it == $down->arrange_it)
                                                            <a href="{{route('sortTraining',['training'=>$training, 'type' => 'down'])}}"
                                                               style="font-size: 20px" class="down"><i
                                                                    class="fa fa-arrow-down"></i></a>
                                                        @else
                                                            <a href="{{route('sortTraining',['training'=>$training, 'type' => 'down'])}}"
                                                               style="font-size: 20px; color:#000000"><i
                                                                    class="fa fa-arrow-down"></i></a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                    <a href="{{route('trainings.edit',$training->id)}}"
                                                       class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                            class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#delete_Services{{ $training->id }}"
                                                            title="{{ trans('services.Delete') }}"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="delete_Services{{$training->id}}"
                                                 tabindex="-1"
                                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('trainings.destroy','test')}}"
                                                          method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title"
                                                                    id="exampleModalLabel">{{ trans('trainings_trans.delete_training') }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p> {{ trans('trainings_trans.Warning_training') }}</p>
                                                                <input type="hidden" name="id"
                                                                       value="{{$training->id}}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{ trans('trainings_trans.Close') }}</button>
                                                                    <button type="submit"
                                                                            class="btn btn-danger">{{ trans('trainings_trans.Submit') }}</button>
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
