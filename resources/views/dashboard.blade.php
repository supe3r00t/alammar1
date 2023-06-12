@extends('layouts.main')
@section('title','ملتقى جامعة المجمعة الأول الرئيسية')
@section('body')


    <table class="table">
        <thead>
        <tr>



            <div class="input-group mb-3 search-form-wrapper">
            <form action="{{route('search.index')}}" method="GET" name="Search" title="إبحث في الموقع">
                <div class="card-header col-auto" id="Search">
                    <input name="search" type="search" class="form-control">
                    <button class="search__btn ">البحث</button>
                </div>
            </form>
            </div>



            </div>
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
