@extends('layouts.layout')

@section('body')
    @include('notification.notification')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs card-header-primary">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <div class="row">
                                    <div class="col-md-11">
                                        <h4 class="card-title">Users</h4>
                                        <p class="card-category">Users Managements</p>
                                    </div>
                                    <div class="col-md-1 text-right">
                                        <a class="btn btn-success btn-just-icon" href="/users/create">
                                            <i class="material-icons">add</i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <span class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th class="text-center">
                                    #
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
                                <th class="text-right">Actions</th>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="text-center">
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
                                        <td class="td-actions form-inline justify-content-end">
                                            @if($user->has_profile == "Yes")
                                                    <a href="/profiles/{{$user->id}}" class="btn btn-success btn-just-icon">
                                                        <i class="material-icons">visibility</i></a>
                                                    <a href="/profiles/{{$user->id}}/edit" class="btn btn-primary btn-just-icon">
                                                        <i class="material-icons">update</i></a>


                                            @else
                                                <form action="/profiles/create" method="GET">
                                                    @csrf
                                                    @method('GET')
                                                    <input type="text" name="user_id" id="user_id" hidden value="{{$user->id}}">
                                                    <button TYPE="submit" class="btn btn-success btn-just-icon">
                                                        <i class="material-icons">add_task</i>
                                                    </button>
                                                </form>

                                            @endif

                                                <form action = "{{route('users.destroy', $user->id)}}" method = "POST">
                                                @csrf
                                                @method('DELETE')
                                                <button TYPE="submit" class="btn btn-danger btn-just-icon" onclick="return confirm('Are you sure want to delete?')">
                                                    <i class="material-icons">delete</i>
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
    {{$users->links()}}
@endsection
