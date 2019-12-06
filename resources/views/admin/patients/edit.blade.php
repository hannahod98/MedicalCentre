@extends('layouts.app')
# @Date:   2019-12-05T14:33:27+00:00
# @Last modified time: 2019-12-05T16:55:32+00:00

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Add new patient
        </div>
        <div class="card-body">
          @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $errors)
                <li>{{ $errors }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form method="POST" action="{{  route('admin.patients.update',$patient->id)  }}">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{  csrf_token()  }}">
              <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$patient->user->name) }}" />
              </div>
              <div class="form-group">
                <label for="title">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address',$patient->user->address) }}" />
              </div>
              <div class="form-group">
                <label for="title">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone',$patient->user->phone) }}" />
              </div>
              <div class="form-group">
                <label for="title">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email',$patient->user->email) }}" />
              </div>
              <div class="form-group">
                <label for="title">Insurance</label>
                  <br>
                  <label for="title">Yes</label>
                <input type="radio" id="insurance" name="insurance" value="{{ old('insurance',$patient->insurance) }}" checked>
                  <br>
                  <label for="title">No</label>
                <input type="radio"  id="insurance" name="insurance" value="{{ old('insurance',$patient->insurance) }}">
              </div>
              <div class="form-group">
                <label for="title">Insurance name</label>
                <input type="text" class="form-control" id="insurance_name" name="insurance_name" value="{{ old('insurance_name',$patient->insurance_name) }}" />
              </div>
              <br>
              <a href="{{ route('admin.patients.index') }}" class="btn btn-link">cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
          </div>
          </div>
          </div>
          </div>
          @endsection
