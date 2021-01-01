@extends('layouts.layout')

@section('nav-icon', 'receipt')
@section('nav-brand', 'Orders')

@section('body')
    @include('notification.notification')
        @include('order.form_filter')
        @include('order.table_orders')
@endsection
