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
    {{trans('main_trans.says')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.says')}}
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
                                <a href="{{route('says.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('says_trans.add_say') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('says_trans.user_image')}}</th>
                                            <th>{{trans('says_trans.user_name')}}</th>
                                            <th>{{trans('says_trans.title')}}</th>
                                            <th>{{trans('says_trans.text__')}}</th>
                                            <th>{{ trans('expertises_trans.arrange_it') }}</th>
                                            <th>{{ trans('says_trans.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($says  as $say)
                                            <tr>
                                                <?php $i++; ?>
                                                <td>{{ $i }}</td>
                                                <td>
                                                    @if($say->logo)
                                                        <img
                                                            src="{{env('APP_URL').'public/attachments/ImageUsers/'. $say->logo}}"
                                                            class="img-thumbnail" alt="company_log"
                                                            style="width:100px; height:100px;">
                                                    @else
                                                        <img src="{{env('APP_URL').'public/assets/images/faces/6.jpg'}}"
                                                             class="img-thumbnail" alt="company_log"
                                                             style="width:100px; height:100px;">
                                                    @endif
                                                </td>
                                                <td>{{$say->name}}</td>
                                                <td>{{$say->title}}</td>
                                                <td>{{\Illuminate\Support\Str::limit($say->text, 40, $end='...')}}</td>
                                                <td>
                                                    @if($say->arrange_it == 1)
                                                        <a href="{{route('sortSays',['say'=>$say, 'type' => 'up'])}}"
                                                           style="font-size: 20px" class="up"><i
                                                                class="fa fa-arrow-up"></i></a>
                                                    @else
                                                        <a href="{{route('sortSays',['say'=>$say, 'type' => 'up'])}}"
                                                           style="font-size: 20px; color:#000000"><i
                                                                class="fa fa-arrow-up"></i></a>
                                                    @endif
                                                    &nbsp;&nbsp;&nbsp;
                                                    @php $down = \App\Models\Say::latest('arrange_it')->first(); @endphp
                                                    @if($say->arrange_it == $down->arrange_it)
                                                        <a href="{{route('sortSays',['say'=>$say, 'type' => 'down'])}}"
                                                           style="font-size: 20px;" class="down"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{route('sortSays',['say'=>$say, 'type' => 'down'])}}"
                                                           style="font-size: 20px; color:#000000"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#view_Says{{ $say->id }}">
                                                        <i class="fa fa-eye"></i></button>
                                                    <a href="{{route('says.edit',$say->id)}}"
                                                       class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                            class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#delete_Says{{ $say->id }}"
                                                            title="{{ trans('says.Delete') }}"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="view_Says{{ $say->id }}" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="modal-title" id="exampleModalLabel">
                                                                <div class="mb-30">
                                                                    <h2 class="">{{trans('says_trans.text__')}}</h2>
                                                                    <hr style="border: 2px solid">
                                                                    <p style="font-size: 20px">{{$say->text}}.</p>
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
                                            <div class="modal fade" id="delete_Says{{$say->id}}"
                                                 tabindex="-1"
                                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('says.destroy','test')}}"
                                                          method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title"
                                                                    id="exampleModalLabel">{{ trans('says_trans.delete_say') }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p> {{ trans('says_trans.Warning_say') }}</p>
                                                                <input type="hidden" name="id"
                                                                       value="{{$say->id}}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{ trans('says_trans.Close') }}</button>
                                                                    <button type="submit"
                                                                            class="btn btn-danger">{{ trans('says_trans.Submit') }}</button>
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
