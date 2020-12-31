@extends('layouts.layout')
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

    <form class="user" action="/profiles" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')<!-- khai báo này dùng để thiết lập phương thức PUT
									nếu không khai báo thì khi submit không thiết lập HttpPUT -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">My Profile</h4>
                            <p class="card-category">Life so good!!!</p>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">User ID</label>
                                            <input type="text" name="user_id" id="user_id" class="form-control form-control-user" value="{{$user_id}}" readonly placeholder="User ID">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">User Name</label>
                                            <input type="text" name="full_name" id="full_name" class="form-control form-control-user" placeholder="User Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Birthday</label>
                                            <input type="date" id="birthday" name="birthday" id="birthday" class="form-control form-control-user" placeholder="Birthday">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Address</label>
                                            <input type="text" name="address" id="address" class="form-control form-control-user" placeholder="Address">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="bmd-label-floating">Avatar</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="avatar" name="avatar" >
                                            <label for="avatar" class="custom-file-label"></label>
                                        </div>
                                    </div>
                                </div>
{{--                                <input type="submit" class="btn btn-primary" value="CREATE">--}}
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
