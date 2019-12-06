# @Date:   2019-12-01T14:55:34+00:00
# @Last modified time: 2019-12-01T15:54:42+00:00
# @Date:   2019-11-26T12:27:33+00:00
# @Last modified time: 2019-12-01T15:54:42+00:00
@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="card">
<div class="card-header">
  Doctor:{{ $doctor->user->name}}

</div>
<div class="card-body">
<table id="table-doctors" class="table table-hover">
  <tbody>
    <tr>
      <td>Name</td>
      <td>{{ $doctor->user->name}}</td>
    </tr>
    <tr>
      <td>Address</td>
      <td>{{ $doctor->user->address}}</td>
    </tr>
    <tr>
      <td>Phone</td>
      <td>{{ $doctor->user->phone}}</td>
    </tr>
    <tr>
      <td>Email</td>
      <td>{{ $doctor->user->email}}</td>
    </tr>
    <tr>
      <td>Start date</td>
      <td>{{ $doctor->start_date}}</td>
    </tr>
  </tbody>
</table>

<a href="{{ route('admin.doctors.index') }}" class="btn btn-default">Back</a>
<a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
<form style="display:inline-block" method="POST" action="{{ route('admin.doctors.destroy', $doctor->id)}}">
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
