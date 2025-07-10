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
    {{trans('main_trans.experience')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.experience')}}
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
                                <a href="{{route('experiences.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('experiences_trans.add_experience') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('experiences_trans.company_logo')}}</th>
                                            <th>{{trans('experiences_trans.title')}}</th>
                                            <th>{{trans('experiences_trans.date_from')}}</th>
                                            <th>{{trans('experiences_trans.date_to')}}</th>
                                            <th>{{trans('expertises_trans.arrange_it')}}</th>
                                            <th>{{ trans('experiences_trans.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($experiences  as $experience)
                                            <tr>
                                                <?php $i++; ?>
                                                <td>{{ $i }}</td>
                                                <td>
                                                    @if($experience->logo)
                                                        <img
                                                            src="{{env('APP_URL').'public/attachments/experience/'. $experience->logo}}"
                                                            class="img-thumbnail" alt="LOGO"
                                                            style="width:100px; height:100px;">
                                                    @else
                                                        <img src="{{env('APP_URL').'public/assets/images/hikiar-n.png' }}"
                                                             class="img-thumbnail" alt="LOGO"
                                                             style="width:100px; height:100px;">
                                                    @endif
                                                </td>
                                                <td>{{$experience->title}}</td>
                                                <td>{{$experience->date_from}}</td>
                                                <td>{{isset($experience->date_to)?$experience->date_to: "Present"}}</td>
                                                <td>
                                                    @if($experience->arrange_it == 1)
                                                        <a href="{{route('sort',['experience'=>$experience, 'type' => 'up'])}}"
                                                           style="font-size: 20px" class="up"><i
                                                                class="fa fa-arrow-up"></i></a>
                                                    @else
                                                        <a href="{{route('sort',['experience'=>$experience, 'type' => 'up'])}}"
                                                           style="font-size: 20px; color:#000000"><i
                                                                class="fa fa-arrow-up"></i></a>
                                                    @endif
                                                    &nbsp;&nbsp;
                                                    @php $down = \App\Models\Experience::latest('arrange_it')->first(); @endphp
                                                    @if($experience->arrange_it == $down->arrange_it)
                                                        <a href="{{route('sort',['experience'=>$experience, 'type' => 'down'])}}"
                                                           style="font-size: 20px" class="down"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{route('sort',['experience'=>$experience, 'type' => 'down'])}}"
                                                           style="font-size: 20px; color:#000000"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('experiences.edit',$experience->id)}}"
                                                       class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                            class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#delete_Experiences{{ $experience->id }}"
                                                            title="{{ trans('experiences_trans.Delete') }}"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="delete_Experiences{{$experience->id}}"
                                                 tabindex="-1"
                                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('experiences.destroy','test')}}"
                                                          method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title"
                                                                    id="exampleModalLabel">{{ trans('experiences_trans.delete_experience') }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p> {{ trans('experiences_trans.Warning_experience') }}</p>
                                                                <input type="hidden" name="id"
                                                                       value="{{$experience->id}}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{ trans('experiences_trans.Close') }}</button>
                                                                    <button type="submit"
                                                                            class="btn btn-danger">{{ trans('experiences_trans.Submit') }}</button>
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
    {{--    <script type="text/javascript">--}}
    {{--        $(document).ready(function () {--}}

    {{--            $('.increment-btn').on('click', function (e) {--}}
    {{--                e.preventDefault();--}}
    {{--                let id = $(this).data('id');--}}
    {{--                changeOrder(id, "increment");--}}
    {{--                let inc_value = $(`.input-${id}`).html();--}}
    {{--                let value = parseInt(inc_value, 10);--}}
    {{--                // let inc_value = parseFloat ($(`.input-${id}`).html());--}}

    {{--                value = isNaN(value) ? 0 : value;--}}
    {{--                if (value < 100) {--}}
    {{--                    value++;--}}
    {{--                    $(`.input-${id}`).html(value);--}}
    {{--                }--}}
    {{--            });--}}

    {{--            // decrement product quantity when - button is clicked--}}
    {{--            $('.decrement-btn').on('click', function (e) {--}}
    {{--                e.preventDefault();--}}

    {{--                let id = $(this).data('id');--}}

    {{--                changeOrder(id, "decrement");--}}


    {{--                let inc_value = $(`.input-${id}`).html();--}}
    {{--                let value = parseInt(inc_value, 10);--}}
    {{--                // let inc_value = parseFloat ($(`.input-${id}`).html());--}}
    {{--                value = isNaN(value) ? 0 : value;--}}
    {{--                if (value > 1) {--}}
    {{--                    value--;--}}
    {{--                    $(`.input-${id}`).html(value);--}}
    {{--                }--}}
    {{--            });--}}

    {{--            function changeOrder(id, type) {--}}
    {{--                $.ajax({--}}
    {{--                    url: `/ar/admin/changeOrderExperience/${id}/${type}`,--}}
    {{--                }).done(function () {--}}
    {{--                    return "success";--}}
    {{--                });--}}
    {{--            }--}}
    {{--        });--}}
    {{--    </script>--}}
@endsection
