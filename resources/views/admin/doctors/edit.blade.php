# @Date:   2019-12-01T16:11:45+00:00
# @Last modified time: 2019-12-03T14:18:07+00:00
@extends('layouts.app')
# @Date:   2019-11-16T11:14:39+00:00
# @Last modified time: 2019-12-03T14:18:07+00:00




@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
        Edit doctor
        </div>
        <div class="card-body">
          @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form method="POST" action="{{  route('admin.doctors.update', $doctor->id)  }}">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{  csrf_token()  }}">
              <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$doctor->user->name) }}" />
              </div>
              <div class="form-group">
                <label for="title">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $doctor->user->address) }}" />
              </div>
              <div class="form-group">
                <label for="title">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone',$doctor->user->phone) }}" />
              </div>
              <div class="form-group">
                <label for="title">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $doctor->user->email) }}" />
              </div>
              <div class="form-group">
                <label for="title">Start date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $doctor->start_date) }}" />
              </div>
              <br>
              <a href="{{ route('admin.doctors.index') }}" class="btn btn-link">cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
          </div>
          </div>
          </div>
          </div>
          @endsection
