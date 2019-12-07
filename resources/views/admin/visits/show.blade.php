# @Date:   2019-12-07T12:07:55+00:00
# @Last modified time: 2019-12-07T16:14:16+00:00
@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="card">
<div class="card-header">
  visit

</div>
<div class="card-body">
<table id="table-visits" class="table table-hover">
  <tbody>
    <tr>
      <td>Date</td>
      <td>{{ $visit->date}}</td>
    </tr>
    <tr>
      <td>Time</td>
      <td>{{ $visit->time}}</td>
    </tr>
    <tr>
      <td>Duration</td>
      <td>{{ $visit->duration}}</td>
    </tr>
    <tr>
      <td>Patient</td>
      <td>{{ $visit->patient_id}}</td>
    </tr>
    <tr>
      <td>Doctor</td>
      <td>{{ $visit->doctor_id}}</td>
    </tr>
    <tr>
      <td>Cost</td>
      <td>{{ $visit->cost}}</td>
    </tr>
  </tbody>
</table>

<a href="{{ route('admin.visits.index') }}" class="btn btn-default">Back</a>
<a href="{{ route('admin.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
<form style="display:inline-block" method="POST" action="{{ route('admin.visits.destroy', $visit->id)}}">
  <input type="hidden" name="_method" value="DELETE">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <button type="submit" class="form-control btn btn-danger">Delete</a>
  </form>
  </div>
  </div>
  </div>
  </div>
  </div>
@endsection
