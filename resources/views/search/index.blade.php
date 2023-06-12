@extends('layouts.main')
@section('title','بحث في المقالات')
@section('body')






<div class="container">
    <h1></h1>

    <form method="GET">
        <div class="input-group mb-3">
            <input
                type="search"
                name="search"
                value="{{ request()->get('search') }}"
                class="card-header col-auto"
                placeholder="بحث..."
                aria-label="Search"
                aria-describedby="btn btn-success">
            <button class="btn btn-outline-dark" type="submit" id="button-addon2">بحث</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>اسم لقاء</th>
            <th>{{__('Event type')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $i=>$event)
            <tr>

                <td>{{ $i+1 }}</td>
                <td><a class="btn btn-light" href="{{route('events.show', $event)}}">{{$event->title}}</a></td>
                <td>{{ $event->type }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>




@endsection
