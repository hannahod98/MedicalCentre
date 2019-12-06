# @Date:   2019-12-05T15:30:38+00:00
# @Last modified time: 2019-12-05T15:37:18+00:00

@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
  Patients
  <a href="{{ route('admin.patients.create')}}" class="btn btn-primary float-right">Add</a>
</div>
<div class="card-body">
  @if (count($patients) === 0)
<p>There are no patients</p>
@else
<table id="table-patients" class="table table-hover">
  <thead>
    <th>Name</th>
    <th>Address</th>
    <th>Phone</th>
    <th>email</th>
    <th>Insurance</th>
    <th>Actions</th>
  </thead>
  <tbody>
@foreach ($patients as $patient)
<tr data-id="{{ $patients[0]->id }}">
   <td>{{ $patient->user->name }}</td> <!--doctor calls from user table -->
  <td>{{ $patient->user->address }}</td>
  <td>{{ $patient->user->phone }}</td>
  <td>{{ $patient->user->email }}</td>
  <td>{{ $patient->insurance_name }}</td>
  <td>
    <a href="{{ route('admin.patients.show', $patient->id) }}" class="btn btn-default">View</a>
    <a href="{{ route('admin.patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
    <form style="display:inline-block" method="POST" action="{{ route('admin.patients.destroy', $patients[0]->id)}}">
      <input type="hidden" name="_method" value="DELETE">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="submit" class="form-control btn btn-danger">Delete</a>
      </form>
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
