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
    {{trans('main_trans.investments')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.investments')}}
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
                                <a href="{{route('investmentPortfolios.create')}}" class="btn btn-success btn-sm"
                                   role="button"
                                   aria-pressed="true">{{ trans('investmentportfolios_trans.add_investment') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('investmentportfolios_trans.company_log') }}</th>
                                            <th>{{ trans('investmentportfolios_trans.name') }}</th>
                                            <th>{{ trans('investmentportfolios_trans.type') }}</th>
                                            <th>{{ trans('expertises_trans.arrange_it') }}</th>
                                            <th>{{ trans('investmentportfolios_trans.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($investmentportfolios as $investmentportfolio)
                                            <tr>
                                                <?php $i++; ?>
                                                <td>{{ $i }}</td>
                                                <td>
                                                    @if($investmentportfolio->company_log)
                                                        <img
                                                            src="{{env('APP_URL').'public/attachments/investmentportfolio/'. $investmentportfolio->company_log}}"
                                                            class="img-thumbnail" alt="company_log"
                                                            style="width:100px; height:100px;">
                                                    @else
                                                        <img
                                                            src="{{env('APP_URL').'public/assets/images/investmentportfolio/zain.png'}}"
                                                            class="img-thumbnail" alt="company_log"
                                                            style="width:100px; height:100px;">
                                                    @endif
                                                </td>
                                                <td>{{ $investmentportfolio->name }}</td>
                                                <td>{{ $investmentportfolio->type }}</td>
                                                <td>
                                                    @if($investmentportfolio->arrange_it == 1)
                                                        <a href="{{route('sortInvestmentPortfolio',['investmentPortfolio'=>$investmentportfolio, 'type' => 'up'])}}"
                                                           style="font-size: 20px" class="up"><i
                                                                class="fa fa-arrow-up"></i></a>
                                                    @else
                                                        <a href="{{route('sortInvestmentPortfolio',['investmentPortfolio'=>$investmentportfolio, 'type' => 'up'])}}"
                                                           style="font-size: 20px; color:#000000"><i
                                                                class="fa fa-arrow-up"></i></a>
                                                    @endif
                                                    &nbsp;&nbsp;&nbsp;
                                                    @php $down = \App\Models\InvestmentPortfolio::latest('arrange_it')->first(); @endphp
                                                    @if($investmentportfolio->arrange_it == $down->arrange_it)
                                                        <a href="{{route('sortInvestmentPortfolio',['investmentPortfolio'=>$investmentportfolio, 'type' => 'down'])}}"
                                                           style="font-size: 20px;" class="down"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{route('sortInvestmentPortfolio',['investmentPortfolio'=>$investmentportfolio, 'type' => 'down'])}}"
                                                           style="font-size: 20px; color:#000000"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('investmentPortfolios.edit',$investmentportfolio->id)}}"
                                                       class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                            class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#delete{{ $investmentportfolio->id }}"
                                                            title="{{ trans('investmentportfolios_trans.Delete') }}"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="delete{{$investmentportfolio->id}}"
                                                 tabindex="-1"
                                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('investmentPortfolios.destroy','test')}}"
                                                          method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title"
                                                                    id="exampleModalLabel">{{ trans('investmentportfolios_trans.delete_investmentPortfolio') }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p> {{ trans('investmentportfolios_trans.Warning_investmentPortfolio') }}</p>
                                                                <input type="hidden" name="id"
                                                                       value="{{$investmentportfolio->id}}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{ trans('investmentportfolios_trans.Close') }}</button>
                                                                    <button type="submit"
                                                                            class="btn btn-danger">{{ trans('investmentportfolios_trans.Submit') }}</button>
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
