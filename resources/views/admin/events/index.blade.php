@extends('layouts.main')
@section('title','لوحة تحكم الإدارة')
@section('body')

    <div class="container">

        <div class="row row-auto">
        <div class="card-header col-auto">



                <a class="btn btn-outline-dark" href="{{route('admin.events.create')}}">{{ __('Create') }}</a>

            <a class="btn btn-outline-danger" href="{{route('oldindex')}}">لقاءات السابقة</a>


                <h1>{{__('Work meetings')}}</h1>

                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead class="col">
                        <tr class="col">
                            <th scope="col"># </th>
                            <th scope="col"> {{__('Title event')}} </th>
                            <th scope="col">{{__('View guest')}} </th>
                            <th scope="col">{{__('Event type')}}</th>
                            <th scope="col">{{__('Registration start date')}}</th>
                            <th scope="col">{{__('Registration end date')}}</th>
                            <th scope="col">{{__('Number of guests allowed')}}</th>
                            <th scope="col">{{ __('Edit') }}</th>
                            <th scope="col">{{ __('Delete') }}</th>


                        </tr>
                        </thead>
                        <tbody class="container">
                        <?php $i=0 ?>
                        @foreach($events as $event)
                            <?php $i++ ?>
                            <tr>


                                <td>



                            <tr>
                                <div class="btn-group col-auto">

                                <td class="btn btn-dark" >{{$i}}-</td>
                                    <td><a class="btn btn-light" href="{{route('events.show', $event)}}">{{$event->title}}</a></td>
                                    <td ><a class="btn btn-outline-dark" href="{{route('admin.events.show', $event)}}">{{$event->max_guests}}</a></td>
                                <td class="">{{$event->type}}</td>
                                <td class="btn btn- ">{{date('d-m-Y', strtotime($event->start_date))}}</td>
                                <td class="">{{date('d-m-Y', strtotime($event->end_date))}}</td>
                                <td class="btn btn-secondary  disabled">{{$event->max_guests}}</td>
                                <td><a class="btn btn-primary btn-sm" href="{{route('admin.events.edit', $event->id)}}">{{ __('Edit') }}</a></td>
                                <td><a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="if (confirm('هل أنت متاكد من الحذف')) { document.getElementById('delete-{{$event->id}}').submit();} else { return false;} ">{{ __('Delete') }}</a>
                                <form action="{{route('admin.events.delete',$event->id)}}" method="post" id="delete-{{$event->id}}" style="display: none;">
                                    @csrf
                                    @method('delete')
                                </form>
                                </td>




                                @endforeach

                            </tr>





                        </tbody>
                    </table>
                </div>

        </div>
        </div>
                </div>
        </div>
    </div>

                </div>
        </div>
    </div>

                </div>
            </div>
        </div>


@endsection
