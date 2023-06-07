

@extends('layouts.main')
@section('title','أنشاء ورش جديدة')
@section('body')



    <div class="container">
<div class="row">
        <div class="card-header col-auto">


            <h3>{{__('The data required to create the event')}}</h3>


        <form class="card-body" action="{{route('admin.events.store','$event','$workshop')}} " method="post"  >
@csrf
            <label class="col-auto" for="title" >{{__('Title event')}}:</label>

            <input type="text" name="title"  id="title"><br>
        <select class="form-select" id="floatingSelectGrid" name="type" aria-label="Floating label select example">

            <option value="event">{{__('Work meetings')}}</option>
            <option value="workshop">{{__('Workshop')}}</option>
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
            <input type="date" class="form-control" id="start_date" name="start_date">
            <label class="col-auto" for="end_date" >{{__('The end date of the event')}}:</label>
            <input type="date" class="form-control" id="end_date" name="end_date">
            <label class="col-auto" for="max_guests"> {{__('Number of guests allowed')}}</label>
            <input type="max_guests" class="form-control col-auto" name="max_guests">


            <button class="btn btn-primary"  type="submit">{{__('Register')}}</button>


        </div>


    </div>




</form>
        </div>
</div>
    </div>

        </div>
    </div>
</div>
    </div>

@endsection
