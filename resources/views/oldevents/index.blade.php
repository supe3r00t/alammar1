@extends('layouts.main')
@section('title','لقائات المنتهية')
@section('body')

    <div class="container">

        <div class="">
            <div class="card">
                <h1>{{__('لقائات المنتهية')}}</h1>
                @foreach($groupeddates as $date =>$dates)
                    <pre>{{date('d-m-Y', strtotime($date))}}</pre>
                @foreach($dates as $date)


                    <ul class="list-group list-group-flush">
{{--                    <li class="list-group-item">{{ date('d-m-Y', strtotime($date->start_date)) }}</li>--}}
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>  <p>  اسم لقاء :  {{$date->title}}   نوع لقاء: {{$date->type}}  عدد الزوار : {{$date->max_guests}}</b></p></li>
                        <li class="list-group-item"></li>
                    </ul>
                </ul>


                                @endforeach

                @endforeach
                </div>

            </div>
        </div>


@endsection
