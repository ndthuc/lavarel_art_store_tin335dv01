@extends('layouts.layout')
@section('body')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Order</h4>
                        <p class="card-category">Life so good!!!</p>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">ID</label>
                                        <p class="form-text">{{$order->id}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Status</label>
                                        <p class="form-text">{{$order->status}}</p>
                                    </div>
                                </div>
                            </div>

                            <a class="btn btn-primary" href="/orders/{{$order->id}}/edit">
                                <i class="material-icons">update</i>
                                UPDATE</a>
                            <a class="btn btn-success" href="/profiles/{{$order->user_id}}">
                                <i class="material-icons">visibility</i>
                                VIEW CUSTOMER</a>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs card-header-primary">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <div class="float-left"><span style="font-size: large" class="nav-tabs-title">Products</span></div>
                                <div class="float-right">
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
                                    Price
                                </th>
                                <th>Include VAT</th>
                                <th>
                                    Image
                                </th>
                                <th>Actions</th>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>
                                            {{$product->id}}
                                        </td>
                                        <td>
                                            {{$product->product_name}}
                                        </td>
                                        <td>
                                            {{$product->price}}
                                        </td>
                                        <td>
                                            @if($product->include_VAT == "Yes")
                                                <input type="checkbox" checked disabled>
                                            @else
                                                <input type="checkbox" disabled>
                                            @endif
                                        </td>
                                        <td>
                                            <img src="{{$product->image}}"  height="100" width="100" alt="'product-img">
                                        </td>
                                        <td>
                                            <a href="/products/{{$product->id}}" class="btn btn-success">
                                                <i class="material-icons">visibility</i>
                                                VIEW</a>
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
