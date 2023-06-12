@extends('layouts.main')
@section('title','ملتقى جامعة المجمعة الأول الرئيسية')
@section('body')


    <div class="card text-center">
        <div class="card-header">

            ملتقى جامعة المجمعة الأول


        </div>
        <div class="card-body">

            <h5 class="card-title"> </h5>
            <div class="input-group mb-3 search-form-wrapper">
                <form action="{{route('search.index')}}" method="GET" name="Search" title="إبحث في الموقع">
                    <div class="card-header col-auto" id="Search">
                        <input name="search" type="search" class="form-control">
                        <button class="search__btn ">البحث</button>
                    </div>
                </form>


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

                <div class="card" style="width: 10rem;">
                    <div class="card-body">
                        <a href="{{route('events.workshop')}}" class="btn btn-secondary stretched-link">{{ __('Workshop') }}</a>
                    </div>
                </div>


@guest
                <div class="card" style="width: 10rem;">
                    <div class="card-body">
                        <a href="{{route('login')}}" class="btn btn-secondary stretched-link">{{ __('Login') }}</a>
                    </div>
                </div>
                @endguest


                @auth
                    <div class="card" style="width: 10rem;">
                        <div class="card-body">
                            <a href="{{route('admin.events.index')}}" class="btn btn-dark stretched-link">{{ __('لوحة التحكم') }}</a>
                        </div>
                    </div>
                    <div class="card" style="width: 10rem;">
                        <div class="card-body">
                            <a href="{{route('admin.events.create')}}" class="btn btn-dark stretched-link">{{ __('Create') }}</a>
                        </div>
                    </div>


                @endauth
                <p class="card-text"></p>




            </div>



            </div>



            <br>






    </div>
    <div class="card-footer text-body-secondary">
    </div>
    </div>



@endsection
