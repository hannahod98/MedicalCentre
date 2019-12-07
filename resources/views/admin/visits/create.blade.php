@extends('layouts.app')
# @Date:   2019-12-05T14:33:27+00:00
# @Last modified time: 2019-12-07T14:34:06+00:00


@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Add new visit
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
            <form method="POST" action="{{  route('admin.visits.store')  }}">
              <input type="hidden" name="_token" value="{{  csrf_token()  }}">
              <div class="form-group">
                <label for="title">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" />
              </div>
              <div class="form-group">
                <label for="title">Time</label>
                <input type="time" class="form-control" id="time" name="time" value="{{ old('time') }}" />
              </div>
              <div class="form-group">
                <label for="title">Duration</label>
                <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration') }}" />
              </div>
              <div class="form-group">
                <label for="title">patient</label>
                <select name="patient_id">
                  @foreach ($patients as $patient)
                  <option value="{{$patient->id}}" {{ (old('patient_id') == $patient->id) ? "selected" : "" }}>
                    {{$patient->user->name}}
                  </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="title">Doctor</label>
                  <select name="doctor_id">
                    @foreach ($doctors as $doctor)
                    <option value="{{$doctor->id}}" {{ (old('doctor_id') == $doctor->id) ? "selected" : "" }}>
                      {{$doctor->user->name}}
                    </option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label for="title">cost</label>
                <input type="text" class="form-control" id="cost" name="cost" value="{{ old('cost') }}" />
              </div>
              <br>
              <a href="{{ route('admin.visits.index') }}" class="btn btn-link">cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
          </div>
          </div>
          </div>
          </div>
          @endsection
