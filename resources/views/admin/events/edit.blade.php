


@extends('layouts.main')
@section('title','تعديل')
@section('body')



    <div class="container">
        <div class="row">
            <div class="card-header col-auto">


                <h3> {{__('To edit')}} </h3>


                <form class="card-body" action="{{route('admin.events.update',$event->id)}} " method="post">
                    @csrf
                    @method('patch')
                    <label class="col-auto" for="title" > {{__('Title event')}}:</label>

                    <input type="text" name="title" value="{{$event->title}}"  id="title"><br>
                    <select class="form-select" id="floatingSelectGrid" name="type" aria-label="Floating label select example">

                        <option value="event" @if($event->type === 'event') selected @endif>{{__('Work meetings')}}</option>
                        <option value="workshop" @if($event->type ==='workshop') selected @endif>{{__('Workshop')}}</option>
                    </select>

                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {{Session::get('error')}}
                        </div>
                    @endif

                    <div class="form-floating">
                        <label class="col-auto" for="start_date" >{{__('The start date of the event')}}:</label>
                        <label class="col-auto" for="start_date" >{{$event->start_date}}</label>
                        <input type="date"  id="start_date" class="form-control"  name="start_date" value="{{$event->start_date}}">
                        <div>
                        <label class="col-auto" for="end_date" >{{__('The end date of the event')}}:</label>
                            <label class="col-auto" for="end_date" >{{$event->end_date}}</label>
                            <input type="date"  id="end_date" class="form-control"   name="end_date" value="{{$event->end_date}}">
                        <label class="col-auto" for="max_guests"> {{__('Number of guests allowed')}}</label>
                        <input  class="form-control col-auto" type="max_guests"  name="max_guests" value="{{$event->max_guests}}">


                        <button class="btn btn-primary"  type="submit">{{__('Edit')}}</button>


                    </div>


            </div>




            </form>
        </div>
    </div>
    </div>

@endsection
