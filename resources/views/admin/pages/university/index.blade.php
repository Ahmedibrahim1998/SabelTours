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
    {{trans('main_trans.university')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.university')}}
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
                                <a href="{{route('universities.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('universities_trans.add_university') }} </a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('universities_trans.university_logo') }}</th>
                                            <th>{{ trans('universities_trans.university_name') }}</th>
                                            <th>{{ trans('expertises_trans.arrange_it') }}</th>
                                            <th>{{ trans('universities_trans.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($universities  as $university)
                                            <tr>
                                                <?php $i++; ?>
                                                <td>{{ $i }}</td>
                                                <td>
                                                    @if($university->university_logo)
                                                        <img
                                                            src="{{env('APP_URL').'public/attachments/university/'. $university->university_logo}}"
                                                            class="img-thumbnail" alt="company_log"
                                                            style="width:100px; height:100px;">
                                                    @else
                                                        <img
                                                            src="{{env('APP_URL').'public/assets/images/university/zain.png'}}"
                                                            class="img-thumbnail" alt="company_log"
                                                            style="width:100px; height:100px;">
                                                    @endif
                                                </td>
                                                <td>{{ $university->university_name }}</td>
                                                <td>
                                                    @if($university->arrange_it == 1)
                                                        <a href="{{route('sortUniversity',['university'=>$university, 'type' => 'up'])}}"
                                                           style="font-size: 20px" class="up"><i
                                                                class="fa fa-arrow-up"></i></a>
                                                    @else
                                                        <a href="{{route('sortUniversity',['university'=>$university, 'type' => 'up'])}}"
                                                           style="font-size: 20px; color:#000000"><i
                                                                class="fa fa-arrow-up"></i></a>
                                                    @endif
                                                    &nbsp;&nbsp;
                                                    @php $down = \App\Models\University::latest('arrange_it')->first(); @endphp
                                                    @if($university->arrange_it == $down->arrange_it)
                                                        <a href="{{route('sortUniversity',['university'=>$university, 'type' => 'down'])}}"
                                                           style="font-size: 20px" class="down"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{route('sortUniversity',['university'=>$university, 'type' => 'down'])}}"
                                                           style="font-size: 20px; color:#000000"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('universities.edit',$university->id)}}"
                                                       class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                            class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#delete_Universities{{ $university->id }}"
                                                            title="{{ trans('universities_trans.Delete') }}"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="delete_Universities{{$university->id}}"
                                                 tabindex="-1"
                                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('universities.destroy','test')}}"
                                                          method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title"
                                                                    id="exampleModalLabel">{{ trans('universities_trans.delete_university') }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p> {{ trans('universities_trans.Warning_university') }}</p>
                                                                <input type="hidden" name="id"
                                                                       value="{{$university->id}}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{ trans('universities_trans.Close') }}</button>
                                                                    <button type="submit"
                                                                            class="btn btn-danger">{{ trans('universities_trans.Submit') }}</button>
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
