@extends('layouts.layout')

@section('body')
    @include('notification.notification')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs card-header-primary">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <div class="float-left"><span style="font-size: large" class="nav-tabs-title">User</span></div>
                                <div class="float-right">
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link bg-success" href="/users/create">
                                                <i class="material-icons">add</i> ADD
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Verified Date
                                </th>
                                <th>Actions</th>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            {{$user->id}}
                                        </td>
                                        <td>
                                            {{$user->name}}
                                        </td>
                                        <td>
                                            {{$user->email}}
                                        </td>
                                        <td>
                                            {{$user->email_verified_at}}
                                        </td>
                                        <td>
                                            @if($user->has_profile == "Yes")
                                                    <a href="/profiles/{{$user->id}}" class="btn btn-success">
                                                        <i class="material-icons">visibility</i>
                                                        VIEW</a>
                                                    <a href="/profiles/{{$user->id}}/edit" class="btn btn-primary">
                                                        <i class="material-icons">update</i>
                                                        UPDATE</a>
                                            @else
                                                <form action="/profiles/create" method="GET">
                                                    @csrf
                                                    @method('GET')
                                                    <input type="text" name="user_id" id="user_id" hidden value="{{$user->id}}">
                                                    <button TYPE="submit" class="btn btn-success">
                                                        <i class="material-icons">create</i>
                                                        CREATE PROFILE
                                                    </button>
                                                </form>

                                            @endif

                                                <form action = "{{route('users.destroy', $user->id)}}" method = "POST">
                                                @csrf
                                                @method('DELETE')
                                                <button TYPE="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">
                                                    <i class="material-icons">delete</i>
                                                    DELETE
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
