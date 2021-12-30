@extends('user.user-layout.master')

@section('user-content')
    <div class="container border border-primary p-3 clearFix">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-start">
                    {{-- @if ($company->logo)
                        <img src="{{ asset('storage/company-logos/' . $company->logo) }}" alt="" width="200" height="150">
                    @else
                        <img src="{{ asset('images/company.png') }}" alt="" width="200" height="150">
                    @endif --}}
                    <ul style="list-style: none;">
                        <li>
                            <h2>{{ $user->name }}</h2>
                        </li>
                        <li>Email: {{ $user->email }}</li>
                        <li>Password : {{ $user->password }}</li>
                        <li><a href="{{ route('user.edit', $company->id) }}" class="btn btn-primary mt-3">Edit
                                Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
