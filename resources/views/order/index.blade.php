@extends('layouts.layout')

@section('body')
    @include('notification.notification')

    <div class="container-fluid">
        @include('order.form_filter')
        @include('order.table_orders')
    </div>
@endsection
