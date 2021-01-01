@extends('layouts.layout')

@section('nav-icon', 'person')
@section('nav-brand', 'Users')

@section('body')
    @include('notification.notification')
    <form class="category" action="{{ route('users.store')}}" method="POST" >
        @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Create a new User</h4>
                            <p class="card-category">Life so good!!!</p>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">User Name</label>
                                            <input name="name" id="name" type="text" class="form-control form-control-user" placeholder="User Name" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="bmd-label-floating">Role</label>
                                        <select name="role_id" id="role_id" class="form-control">
                                            @foreach ($roles as $role)
                                                <option value={{$role->id}}> {{$role->name_role}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email</label>
                                            <input type="email" name="email" id="email" class="form-control form-control-user" placeholder="User Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Password</label>
                                            <input type="password" name="password" id="password" class="form-control form-control-user" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Confirm Password</label>
                                            <input type="password" name="confirm_password" id="confirm_password" class="form-control form-control-user" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="material-icons">create</i>
                                    CREATE</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </form>

@endsection
