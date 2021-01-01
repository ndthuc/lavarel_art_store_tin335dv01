@extends('layouts.layout')

@section('nav-icon', 'update')
@section('nav-brand', $profile->full_name)

@section('js')
    <script>
        $('#avatar').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
@endsection
@section('body')
    @include('notification.notification')


    <form class="user" action="/profiles/{{$user->id}}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method('PUT')<!-- khai báo này dùng để thiết lập phương thức PUT
									nếu không khai báo thì khi submit không thiết lập HttpPUT -->
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
                                            <input name="full_name" id="full_name" type="text" class="form-control form-control-user" placeholder="Full Name" value="{{$profile->full_name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Birthday</label>
                                            <input type="date" id="birthday" name="birthday" id="birthday" class="form-control form-control-user" value="{{$profile->birthday}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Address</label>
                                            <input type="text" name="address" id="address" class="form-control form-control-user" value="{{$profile->address}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="bmd-label-floating">Role</label>
                                        <select name="role_id" class="form-control">
                                            @foreach ($roles as $role)
                                                <option value={{$role->id}}
                                                @if($role->id == $user->role_id)
                                                    selected="selected"
                                                @endif
                                                > {{$role->name_role}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Avatar</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="avatar" name="image" >
                                                <label for="avatar" class="custom-file-label">{{$profile->avatar}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">
                                    <i class="material-icons">save</i>
                                    SAVE</button>
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
                            <h6 class="card-category text-gray">About</h6>
                            <h4 class="card-title">{{$profile->full_name}}</h4>
                            <p class="card-description">
                                Hi
                            </p>
                            {{--                        <a href="javascript:;" class="btn btn-primary btn-round">Follow</a>--}}
                        </div>
                    </div>
                </div>
            </div>
    </form>
@endsection
