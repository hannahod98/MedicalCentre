# @Date:   2019-12-01T17:09:47+00:00
# @Last modified time: 2019-12-01T17:31:56+00:00
# @Date:   2019-11-26T12:27:33+00:00
# @Last modified time: 2019-12-01T17:31:56+00:00
@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
  Doctors
</div>
<div class="card-body">
  @if (count($doctors) === 0)
<p>There are no doctors</p>
@else
<table id="table-doctors" class="table table-hover">
  <thead>
    <th>Name</th>
    <th>Address</th>
    <th>Phone</th>
    <th>email</th>
    <th>Start date</th>
    <th></th>
  </thead>
  <tbody>
@foreach ($doctors as $doctor)
<tr data-id="{{ $doctors[0]->id }}">
   <td>{{ $doctor->user->name }}</td> <!--doctor calls from user table -->
  <td>{{ $doctor->user->address }}</td>
  <td>{{ $doctor->user->phone }}</td>
  <td>{{ $doctor->user->email }}</td>
  <td>{{ $doctor->start_date }}</td>
  <td>
    <a href="{{ route('patient.doctors.show', $doctor->id) }}" class="btn btn-primary">View</a>

  </td>
</tr>
    @endforeach
  </tbody>
  @endif
  </div>
  </div>
  </div>
  </div>
  </div>
@endsection
