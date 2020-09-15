@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Profile</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
<br><br>

                    <p><b>Name:</b>{!! Auth::user()->name !!}</p>
                    <p><b>Email:</b>{!! Auth::user()->email !!}</p>

                    <a href="{{route('allproducts')}}" class="btn btn-warning">Main website</a>
                    @if($userData->isAdmin())
                    <a href="{{route('adminDisplayProducts')}}" class="btn btn-primary">Admin Dashboard</a>
                    @else
                      <a href="#" class="btn btn-primary">You are not admin</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
