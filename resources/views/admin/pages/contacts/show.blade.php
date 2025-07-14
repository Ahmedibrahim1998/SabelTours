@extends('admin.layouts.master')

@section('title', __('contacts_trans.message_details'))

@section('content')
    <div class="card">
        <div class="card-body">
            <h5>{{ __('contacts_trans.name') }}</h5>
            <p>{{ $contact->name }}</p>

            <h5>{{ __('contacts_trans.email') }}</h5>
            <p>{{ $contact->email }}</p>

            <h5>{{ __('contacts_trans.phone') }}</h5>
            <p>{{ $contact->phone }}</p>

            <h5>{{ __('contacts_trans.message') }}</h5>
            <p>{{ $contact->message }}</p>

            <a href="{{ route('contacts.index') }}" class="btn btn-secondary">{{ __('contacts_trans.back') }}</a>
        </div>
    </div>
@endsection
