@extends('layouts.layout')

@section('nav-icon', 'visibility')
@section('nav-brand', $profile->full_name)

@section('body')
    @include('notification.notification')
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">My Profile</h4>
                        <p class="card-category">Life so good!!!</p>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Full Name</label>
                                        <p class="form-text">{{$profile->full_name}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email address</label>
                                        <p class="form-text">{{$user->email}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Birthday</label>
                                        <p class="form-text">{{$profile->birthday}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Address</label>
                                        <p class="form-text">{{$profile->address}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Verified Date</label>
                                        <p class="form-text">{{$user->email_verified_at}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About Me</label>
                                        <div class="form-group">
                                            <label class="bmd-label-floating"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</label>
{{--                                            <textarea class="form-control" rows="5"></textarea>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-primary pull-right" href="/profiles/{{$user->id}}/edit">
                                <i class="material-icons">update</i>
                                Update</a>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="javascript:;">
                            <img class="img" src="{{$profile->avatar}}" />
                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray">Role</h6>
                        <h4 class="card-title">{{$role->name_role}}</h4>
                        <p class="card-description">
                            {{$role->description}}
                        </p>
{{--                        <a href="javascript:;" class="btn btn-primary btn-round">Follow</a>--}}
                    </div>
                </div>
            </div>
        </div>
@endsection
