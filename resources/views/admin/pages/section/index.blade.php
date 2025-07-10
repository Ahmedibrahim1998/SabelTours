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
    {{trans('main_trans.sections')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.sections')}}
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
                                <a href="{{route('sections.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('sections_trans.add_section') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('sections_trans.section_font_awesome') }}</th>
                                            <th>{{ trans('sections_trans.section_name') }}</th>
                                            <th>{{ trans('sections_trans.section_name_en') }}</th>
                                            <th>{{ trans('sections_trans.section_url') }}</th>
                                            <th>{{ trans('sections_trans.arrange_it') }}</th>
                                            <th>{{ trans('sections_trans.status_view') }}</th>
                                            <th>{{ trans('sections_trans.status_view_up') }}</th>
                                            <th>{{ trans('sections_trans.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($sections as $section)
                                            <tr>
                                                <?php $i++; ?>
                                                <td>{{ $i }}</td>
                                                <td><i class="{{$section->section_font_awesome}} m-2"
                                                       style="font-size: x-large"></i></td>
                                                <td>{{ $section->getTranslation('section_name', 'ar') }}</td>
                                                <td>{{ $section->getTranslation('section_name', 'en')  }}</td>
                                                <td>{{ $section->section_url }}</td>
                                                <td>
                                                    @if($section->arrange_it == 1)
                                                        <a href="{{route('sortSection',['section'=>$section, 'type' => 'up'])}}"
                                                           style="font-size: 20px" class="up"><i
                                                                class="fa fa-arrow-up"></i></a>
                                                    @else
                                                        <a href="{{route('sortSection',['section'=>$section, 'type' => 'up'])}}"
                                                           style="font-size: 20px; color:#000000"><i
                                                                class="fa fa-arrow-up"></i></a>
                                                    @endif
                                                    &nbsp;&nbsp;&nbsp;
                                                    @php $down = \App\Models\Section::latest('arrange_it')->first(); @endphp
                                                    @if($section->arrange_it == $down->arrange_it)
                                                        <a href="{{route('sortSection',['section'=>$section, 'type' => 'down'])}}"
                                                           style="font-size: 20px;" class="down"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{route('sortSection',['section'=>$section, 'type' => 'down'])}}"
                                                           style="font-size: 20px; color:#000000"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="form-group mb-3">
                                                        <div class="checkbox checbox-switch switch-success m-4">
                                                            <label
                                                                class="switch s-icons s-outline s-outline-primary mr-2">
                                                                <input type="checkbox"
                                                                       @if($section->status_view == 1) checked
                                                                       @endif data-id="{{$section->id}}"
                                                                       data-url="">
                                                                <span class="slider round" style="padding-left: 25px;"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <div class="checkbox checbox-switch switch-success m-4">
                                                            <label style="font-size: 3px"
                                                                class="switch_1 s-icons s-outline s-outline-primary mr-2">
                                                                <input type="checkbox"
                                                                       @if($section->status_view_up == 1) checked
                                                                       @endif data-id="{{$section->id}}"
                                                                       data-url="">
                                                                <span class="slider round" style="padding-left: 25px;"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="{{route('sections.edit',$section->id)}}"
                                                       class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                            class="fa fa-edit"></i></a>
                                                </td>
                                            </tr>
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
    <script>
        $("body").on("click", '.switch input', function (e) {
            let url = "{{route('changeStatusView',[':id'])}}"
            let col_name = $(this).data('status_view');
            let id = $(this).data('id');
            url = url.replace(':col_name', col_name).replace(':id', id);
            $.ajax({
                url,
                type: 'GET',
                cache: false,
                contentType: false,
                processData: false,
                error: function (response) {
                    console.log('error');
                }
            });

            location.reload(true);
        });
    </script>
    <script>
        $("body").on("click", '.switch_1 input', function (e) {
            let url = "{{route('changeStatusViewUp',[':id'])}}"
            let col_name = $(this).data('status_view_up');
            let id = $(this).data('id');
            url = url.replace(':col_name', col_name).replace(':id', id);
            $.ajax({
                url,
                type: 'GET',
                cache: false,
                contentType: false,
                processData: false,
                error: function (response) {
                    console.log('error');
                }
            });
        });
    </script>
@endsection
