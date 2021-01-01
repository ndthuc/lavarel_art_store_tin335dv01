@extends('layouts.layout')

@section('nav-icon', 'update')
@section('nav-brand', 'Order')

@section('body')
    @include('notification.notification')

    <form action="{{ route('orders.update', ['order' => $order->id]) }}" method="POST">
    @csrf
    @method('PUT')<!-- khai báo này dùng để thiết lập phương thức PUT
									nếu không khai báo thì khi submit không thiết lập HttpPUT -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Order Details</h4>
                            <p class="card-category">Have A Nice Day!!!</p>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Order ID</label>
                                            <p class="form-text">{{$order->id}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Order Status</label>
                                            <select name="status" class="form-control">
                                                @foreach ($statuses as $status)
                                                    <option value={{$status->status_name}}
                                                        @if($order->status == $status->status_name)
                                                            selected="selected"
                                                        @endif
                                                    > {{$status->status_name}}</option>
                                                @endforeach
                                            </select>
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
            </div>
    </form>
@endsection
