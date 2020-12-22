@extends('layouts.layout')

@section('body')
    <ul>
        @foreach($users as $user)
            <li>
                {{$user -> name}}
            </li>
        @endforeach
    </ul>
@endsection
