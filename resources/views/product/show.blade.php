@extends('layouts.layout')
@section('body')

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Product</h4>
                        <p class="card-category">Life so good!!!</p>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">ID</label>
                                        <p class="form-text">{{$product->id}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Product Name</label>
                                        <p class="form-text">{{$product->product_name}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Category</label>
                                        <p class="form-text">{{$category->categoryName}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Description</label>
                                        <p class="form-text">{{$product->description}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Quantity</label>
                                        <p class="form-text">{{$product->quantity}}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Price</label>
                                        <p class="form-text">{{$product->price}}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Include VAT</label>
                                        <input type="checkbox"
                                               @if($product->include_VAT == "Yes")
                                               checked
                                               @endif
                                               disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Quantity</label>
                                        <p class="form-text">{{$product->quantity}}</p>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-primary" href="/products/{{$product->id}}/edit">
                                <i class="material-icons">update</i>
                                Update Product</a>
                            {{--                            <button type="submit" class="btn btn-primary pull-right">Update Profile</button>--}}
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="javascript:;">
                            <img class="img" src="{{$product->image}}" alt="product-image"/>
                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray">Product Name</h6>
                        <h4 class="card-title">{{$product->product_name}}</h4>
                    </div>
                </div>
            </div>
        </div>
@endsection
