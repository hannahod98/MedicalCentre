# @Date:   2019-12-07T12:07:41+00:00
# @Last modified time: 2019-12-07T16:55:08+00:00
@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
Visits
  <a href="{{ route('admin.visits.create')}}" class="btn btn-primary float-right">Add</a>
</div>
<div class="card-body">
  @if (count($visits) === 0)
<p>There are no visits</p>
@else
<table id="table-visits" class="table table-hover">
  <thead>
    <th>Date</th>
    <th>Time</th>
    <th>Duration</th>
    <th>Patient</th>
    <th>Doctor</th>
    <th>cost</th>
    <th>Actions</th>
  </thead>
  <tbody>
@foreach ($visits as $visit)
<tr data-id="{{ $visits[0]->id }}">
   <td>{{ $visit->date }}</td> <!--doctor calls from user table -->
  <td>{{ $visit->time }}</td>
  <td>{{ $visit->duration }}</td>
  <td>{{ $visit->patient_id}}</td>
<td>{{ $visit->doctor_id}}</td>
    <td>{{ $visit->cost }}</td>
  <td>
    <a href="{{ route('admin.visits.show', $visit->id) }}" class="btn btn-default">View</a>
    <a href="{{ route('admin.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
    <form style="display:inline-block" method="POST" action="{{ route('admin.visits.destroy', $visits[0]->id)}}">
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
