@extends('layouts.layout')

@section('body')
    @include('notification.notification')
        @include('order.form_filter')
        @include('order.table_orders')
@endsection
