@extends('layouts.app')
# @Date:   2019-11-07T18:54:58+00:00
# @Last modified time: 2019-12-07T17:28:29+00:00




@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as an admin!
                    <br>
                    <a href="{{ route('admin.doctors.index')}}">Doctors</a>
                    <br>
                    <a href="{{ route('admin.patients.index')}}">Patients</a>
                    <br>
                    <a href="{{ route('admin.visits.index')}}">Visits</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
