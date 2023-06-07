

@extends('layouts.main')
@section('title','استعراض ورش العمل')
@section('body')



<div class="container">
<div class="row row-auto">

{{--  <div class="col">--}}
    <div class="card" style="width: 25rem;">
        <div class="card-header col-auto">

            <h3>{{__('Work meetings')}}</h3>


        </div>


        <ul class="list-group list-group-flush">
            <li class="list-group-item"> <h2>{{__('Meet name')}}:  {{$event->title}}</h2></li>
            <li class="list-group-item"> {{__('The start date of the event')}}:  {{$event->start_date}}</li>
            <li class="list-group-item"> {{__('The end date of the event')}}:  {{$event->end_date}}</li>
            <li class="list-group-item"> {{__('Number of guests allowed')}}:  {{$event->max_guests}}</li>

        </ul>

            @foreach($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach

        @guest
            @if($event->guests->count() < $event->max_guests)
                <form class="card-body" method="post" action="{{route('events.signup', $event)}}">
                    @method('POST')
                    @csrf

                    <div class="card-body" >
                        <h5 class="card-title">{{__('Data required for registration')}}</h5>



                        <select class="form-select" id="floatingSelectGrid" name="title" aria-label="Floating label select example">

                            <option  value="mr">{{__('Mr')}}</option>
                            <option value="mrs">{{__('Mrs')}}</option>
                            <option value="ms">{{__('Ms')}}</option>
                        </select>


                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif


                        <div class="form-floating">
                            <label class="col-auto" for="floatingInputGrid" >{{__('Name')}}</label>
                            <input type="text" class="form-control" id="name" name="name">
                            <label for="phone">{{__('Mobile number')}}</label>
                            <input type="tel" class="form-control" name="phone" id="phone">

                            <button class="btn btn-primary" type="submit">{{__('Register')}}</button>

                            @else
                                <h1>{{__('Registration is closed, the allowed number has expired')}}</h1>
            @endif
                            @endguest
                        </div>

    </div>


    </div>
  </div>
</div>
  </div>


<div>



@endsection
