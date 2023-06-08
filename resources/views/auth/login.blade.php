@extends('layouts.main')
@section('title','لوحة تحكم الإدارة')
@section('body')

    <div class="container">
        <div class="row">
            <div class="card-header col-auto">

            <form  class="card-body" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="card-body">
            <label class="col-auto" for="email" >{{__('Email')}}:</label>

            <input type="email" class="form-control" id="email" name="email" value="email">
            <label class="col-auto" for="password" >{{__('Password')}}:</label>

            <input type="password" class="form-control" id="password" name="password" value="password">

            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
            @endif
        </div>


                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif
                <button class="btn btn-primary"  type="submit">{{__('Login')}}</button>






            </form>
    </div>
        </div>
    </div>

    </div>

@endsection
