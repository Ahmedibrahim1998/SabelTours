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
    {{trans('main_trans.services')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.service')}}
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
                                <a href="{{route('services.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('services_trans.add_service') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('services_trans.image_icon')}}</th>
                                            <th>{{trans('services_trans.service_name')}}</th>
                                            <th>{{trans('services_trans.about_service')}}</th>
                                            <th>{{ trans('expertises_trans.arrange_it') }}</th>
                                            <th>{{ trans('services_trans.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($services  as $service)
                                            <tr>
                                                {{--<!--                                                --><?php //$i++; ?>--}}
                                                <td>{{ $service->id }}</td>
                                                <td>
                                                    @if($service->image_icon)
                                                        <img
                                                            src="{{env('APP_URL').'public/attachments/services/'. $service->image_icon}}"
                                                            class="img-thumbnail" alt="LOGO"
                                                            style="width:100px; height:100px;">
                                                    @else
                                                        <img
                                                            src="{{env('APP_URL').'public/assets/images/services/business.png'}}"
                                                            class="img-thumbnail" alt="company_log"
                                                            style="width:100px; height:100px;">
                                                    @endif
                                                </td>
                                                <td>{{$service->service_name}}</td>
                                                <td>{{\Illuminate\Support\Str::limit($service->about_service, 55, $end='...')}}</td>
                                                <td>
                                                    @if($service->arrange_it == 1)
                                                        <a href="{{route('sortService',['service'=>$service, 'type' => 'up'])}}"
                                                           style="font-size: 20px" class="up"><i
                                                                class="fa fa-arrow-up"></i></a>
                                                    @else
                                                        <a href="{{route('sortService',['service'=>$service, 'type' => 'up'])}}"
                                                           style="font-size: 20px; color:#000000"><i
                                                                class="fa fa-arrow-up"></i></a>
                                                    @endif
                                                    &nbsp;&nbsp;
                                                    @php $down = \App\Models\Service::latest('arrange_it')->first(); @endphp
                                                    @if($service->arrange_it == $down->arrange_it)
                                                        <a href="{{route('sortService',['service'=>$service, 'type' => 'down'])}}"
                                                           style="font-size: 20px" class="down"><i class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{route('sortService',['service'=>$service, 'type' => 'down'])}}"
                                                           style="font-size: 20px; color:#000000"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#view_Service{{ $service->id }}">
                                                        <i class="fa fa-eye"></i></button>
                                                    <a href="{{route('services.edit',$service->id)}}"
                                                       class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                            class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#delete_Services{{ $service->id }}"
                                                            title="{{ trans('services.Delete') }}"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="view_Service{{ $service->id }}" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="modal-title" id="exampleModalLabel">
                                                                <div class="mb-30">
                                                                    <h2 class="">{{trans('services_trans.about_service')}}</h2>
                                                                    <hr style="border: 2px solid">
                                                                    <p style="font-size: 20px">{{$service->about_service}}.</p>
                                                                </div>
                                                            </div>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('contacts_trans.Close')}}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="delete_Services{{$service->id}}"
                                                 tabindex="-1"
                                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('services.destroy','test')}}"
                                                          method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title"
                                                                    id="exampleModalLabel">{{ trans('services_trans.delete_service') }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p> {{ trans('services_trans.Warning_service') }}</p>
                                                                <input type="hidden" name="id"
                                                                       value="{{$service->id}}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{ trans('services_trans.Close') }}</button>
                                                                    <button type="submit"
                                                                            class="btn btn-danger">{{ trans('services_trans.Submit') }}</button>
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
    <script type="text/javascript">
        $(document).ready(function () {

            $('.increment-btn').on('click', function (e) {
                e.preventDefault();
                let id = $(this).data('id');
                changeOrder(id, "increment");
                let inc_value = $(`.input-${id}`).html();
                let value = parseInt(inc_value, 10);
                // let inc_value = parseFloat ($(`.input-${id}`).html());

                value = isNaN(value) ? 0 : value;
                if (value < 100) {
                    value++;
                    $(`.input-${id}`).html(value);
                }
            });

            // decrement product quantity when - button is clicked
            $('.decrement-btn').on('click', function (e) {
                e.preventDefault();

                let id = $(this).data('id');

                changeOrder(id, "decrement");


                let inc_value = $(`.input-${id}`).html();
                let value = parseInt(inc_value, 10);
                // let inc_value = parseFloat ($(`.input-${id}`).html());
                value = isNaN(value) ? 0 : value;
                if (value > 1) {
                    value--;
                    $(`.input-${id}`).html(value);
                }
            });

            function changeOrder(id, type) {
                $.ajax({
                    url: `/ar/admin/changeOrderServices/${id}/${type}`,
                }).done(function () {
                    return "success";
                });
            }
        });
    </script>
@endsection
