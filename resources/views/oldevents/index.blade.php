@extends('layouts.main')
@section('title','لقائات المنتهية')
@section('body')

    <div class="container">

        <h1>{{__('Events old')}}</h1>


                @foreach($groupeddates as $date =>$dates)
                    <pre class="card-header col-auto">{{date('Y-m-d', strtotime($date))}} |  عدد الاحداث المسجلة في هذا اليوم({{$dates->count()}}) </pre>
                @foreach($dates as $i=>$date)




                        <li class="list-group-item"><b> <p>   {{$i+1 }} -  اسم لقاء : {{$date->title}}   |   نوع لقاء:  {{$date->type}}  | عدد الزوار : {{$date->max_guests}}</b></p></li>



                                @endforeach

                @endforeach

                </div>





@endsection
