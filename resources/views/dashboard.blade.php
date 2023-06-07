@extends('layouts.main')
@section('title','ملتقى جامعة المجمعة الأول الرئيسية')
@section('body')


    <table class="table">
        <thead>
        <tr>

            <div class="card" style="width: 10rem;">
                <div class="card-body">
                    <a href="{{route('events.events')}}" class="btn btn-secondary stretched-link">{{ __('IndexEvents') }}</a>
                </div>
            </div>
            <div class="card" style="width: 10rem;">
                <div class="card-body">
                    <a href="{{route('oldindex')}}" class="btn btn-danger stretched-link">{{ __('Oldevents') }}</a>
                </div>
            </div>

            <br>

            <div class="card" style="width: 10rem;">
                <div class="card-body">
                    <a href="{{route('events.workshop')}}" class="btn btn-secondary stretched-link">{{ __('Workshop') }}</a>
                </div>
            </div>


    </table>

@endsection
