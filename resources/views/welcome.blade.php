@extends('layouts.app')
# @Date:   2019-11-06T14:41:00+00:00
# @Last modified time: 2019-11-26T13:32:32+00:00




@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">

                  Welcome to the Medical centre
                  <a href="{{ route('admin.doctors.index')}}">Doctors</a>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
