@extends('admin.layouts.master')
@section('title')
    {{ trans('clients_trans.clients') }}
@stop
@section('content')
    <div class="row font-weight-bold">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a href="{{ route('clients.create') }}" class="btn btn-success mb-3">
                        {{ trans('clients_trans.add_client') }}
                    </a>

                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('clients_trans.image') }}</th>
                            <th>{{ trans('clients_trans.name_' . app()->getLocale()) }}</th>
                            <th>{{ trans('clients_trans.date') }}</th>
                            <th>{{ trans('clients_trans.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($clients as $index => $client)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                @php
                                    // تحقق إذا كان الرابط خارجي، وإذا لم يكن كذلك أضف /public/ في المسار
                                    $imageSrc = Illuminate\Support\Str::startsWith($client->image, ['http://', 'https://'])
                                        ? $client->image
                                        : asset('public/' . ltrim($client->image, '/'));
                                @endphp
                                <td>
                                    @if($client->image)
                                        <img src="{{ $imageSrc }}" height="50" alt="Client Image">
                                    @else
                                        -
                                    @endif
                                </td>

                                <td>{{ $client->getLocalizedName(app()->getLocale()) }}</td>
                                <td>{{ $client->date }}</td>
                                <td>
                                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('clients.show', $client->id) }}" class="btn btn-secondary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST"
                                          style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('{{ trans('clients_trans.confirm_delete') }}')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
