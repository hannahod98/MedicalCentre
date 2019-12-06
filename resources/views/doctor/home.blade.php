@extends('layouts.app')
# @Date:   2019-11-07T19:23:59+00:00
# @Last modified time: 2019-11-16T10:39:31+00:00

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

                    You are logged in as a doctor!
                  </br>
                    Hi {{Auth::user()->name}}
                    </br>
                    email: {{Auth::user()->email}}
                    </br>
                    Address: {{Auth::user()->address}}
                    </br>
                    Phone: {{Auth::user()->phone}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
