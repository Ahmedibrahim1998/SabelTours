@extends('admin.layouts.master')

@section('title', __('contacts_trans.contacts'))

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('contacts_trans.name') }}</th>
                    <th>{{ __('contacts_trans.email') }}</th>
                    <th>{{ __('contacts_trans.phone') }}</th>
                    <th>{{ __('contacts_trans.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $index => $contact)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>
                            <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i></a>
                            <form action="{{ route('clients.destroy', $contact->id) }}" method="POST"
                                  style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('{{ trans('contacts_trans.confirm_delete') }}')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $contacts->links() }}
        </div>
    </div>
@endsection
