@extends('layouts.main')
@section('title','لقائات العمل')
@section('body')

    <div class="container">

                    <div class="card-header col-auto">

<div class="container">
    <h1>{{__('Work meetings')}}</h1>

    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>

            <th scope="col"></th>
            <th scope="col">{{__('Transition to register')}}</th>
            <th scope="col">{{__('Title event')}}</th>
            <th scope="col">{{__('Registration start date')}}</th>
            <th scope="col">{{__('Registration end date')}}</th>


        </tr>
        </thead>
        <tbody>
        @if($events->count())
            <?php $i=0 ?>
            @foreach($events as $event)
                <?php $i++ ?>
                <tr>

                    <th scope="row"></th>
                    <td>

                        <a class="btn btn-secondary" href="{{route('events.show', $event)}}" role="button">{{$i}}</a>
                    </td>
                    <td>{{$event->title}}</td>
                    <td>{{$event->start_date}}</td>
                    <td>{{$event->end_date}}</td>


                </tr>
            @endforeach
        @endif


        </tbody>
    </table>
    </div>
</div>
                    </div>
                </div>
            </div>
        </div>
@endsection
