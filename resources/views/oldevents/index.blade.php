@extends('layouts.main')
@section('title','لقائات المنتهية')
@section('body')

    <div class="container">

        <div class="">
            <div class="card">
                <h1>{{__('لقائات المنتهية')}}</h1>
                @foreach($groupeddates as $date =>$dates)
                    <pre>{{date('Y-m-d', strtotime($date))}}</pre>
                    <div class="card-btn"> عدد الاحداث المسجلة في هذا اليوم({{$dates->count()}}) </div>
                @foreach($dates as $i=>$date)




                        <ul class="list-group list-group-flush">
                    <li class="list-group-item"></li>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b> <p>   {{$i+1 }} -  اسم لقاء : {{$date->title}}   نوع لقاء:  {{$date->type}}  عدد الزوار : {{$date->max_guests}}</b></p></li>
                        <li class="list-group-item"></li>
                    </ul>
                </ul>


                                @endforeach

                @endforeach
                </div>

            </div>
        </div>


@endsection
