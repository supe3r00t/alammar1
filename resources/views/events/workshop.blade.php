@extends('layouts.main')
@section('title','ورش العمل')
@section('body')
    <div class="container">

        <div class="card-header col-auto">

            <div class="container">
                <h3>{{__('Workshop')}}</h3>

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
                            <?php $i=0 ?>
            @if($workshops->count())
                @foreach($workshops as $workshop)
                    <?php $i++ ?>
                    <tr>

                        <th scope="row"></th>
                        <td>

                        <a class="btn btn-secondary" href="{{route('workshops.show', $workshop)}}" role="button">{{$i}}</a>
                        </td>
                        <td>{{$workshop->title}}</td>
                        <td>{{ date('Y-m-d', strtotime($workshop->start_date))}}</td>
                        <td>{{ date('Y-m-d', strtotime($workshop->end_date))}}</td>


                    </tr>
                @endforeach
            @endif


            </tbody>
        </table>

    </div>
</div>
</div>
@endsection





