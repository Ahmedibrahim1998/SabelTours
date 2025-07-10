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
    {{trans('main_trans.expertises')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.expertises')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row font-weight-bold">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('expertises.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('expertises_trans.add_expertise') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('expertises_trans.name') }}</th>
                                            <th>{{ trans('expertises_trans.created_at') }}</th>
                                            <th>{{ trans('expertises_trans.arrange_it') }}</th>
                                            <th>{{ trans('expertises_trans.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($expertises as $expertise)
                                            <tr>
                                                <?php $i++; ?>
                                                <td>{{ $i }}</td>
                                                <td>{{ $expertise->name }}</td>
                                                <td>{{$expertise->date}}</td>
                                                <td>
                                                    @if($expertise->arrange_it == 1)
                                                        <a href="{{route('sortExpertise',['expertise'=>$expertise, 'type' => 'up'])}}"
                                                           style="font-size: 20px" class="up"><i
                                                                class="fa fa-arrow-up"></i></a>
                                                    @else
                                                        <a href="{{route('sortExpertise',['expertise'=>$expertise, 'type' => 'up'])}}"
                                                           style="font-size: 20px; color:#000000"><i
                                                                class="fa fa-arrow-up"></i></a>
                                                    @endif
                                                    &nbsp;&nbsp;&nbsp;
                                                    @php $down = \App\Models\Expertie::latest('arrange_it')->first(); @endphp
                                                    @if($expertise->arrange_it == $down->arrange_it)
                                                        <a href="{{route('sortExpertise',['expertise'=>$expertise, 'type' => 'down'])}}"
                                                           style="font-size: 20px;" class="down"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{route('sortExpertise',['expertise'=>$expertise, 'type' => 'down'])}}"
                                                           style="font-size: 20px; color:#000000"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('expertises.edit',$expertise->id)}}"
                                                       class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                            class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#delete{{ $expertise->id }}"
                                                            title="{{ trans('expertises_trans.Delete') }}"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="delete{{$expertise->id}}"
                                                 tabindex="-1"
                                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('expertises.destroy','test')}}"
                                                          method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title"
                                                                    id="exampleModalLabel">{{ trans('expertises_trans.delete_expertise') }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p> {{ trans('expertises_trans.Warning_expertise') }}</p>
                                                                <input type="hidden" name="id"
                                                                       value="{{$expertise->id}}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{ trans('expertises_trans.Close') }}</button>
                                                                    <button type="submit"
                                                                            class="btn btn-danger">{{ trans('expertises_trans.Submit') }}</button>
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
