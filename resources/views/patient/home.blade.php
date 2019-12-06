@extends('layouts.app')
# @Date:   2019-11-07T19:24:35+00:00
# @Last modified time: 2019-12-01T17:30:03+00:00




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

                    You are logged in as a patient! <a href="{{route('patient.doctors.index')}}">Doctors</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
