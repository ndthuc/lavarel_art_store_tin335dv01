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
@endsection('js')
@section('body')
    @include('notification.notification')

    <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')<!-- khai báo này dùng để thiết lập phương thức PUT
									nếu không khai báo thì khi submit không thiết lập HttpPUT -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Update A Product</h4>
                            <p class="card-category">Have A Nice Day!!!</p>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Product Name</label>
                                            <input name="product_name" id="product_name" type="text" class="form-control form-control-user" placeholder="Product Name" value="{{$product->product_name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="bmd-label-floating">Category</label>
                                        <select name="category_id" class="form-control">
                                            @foreach ($categories as $category)
                                                <option value={{$category->id}}
                                                @if($category->id == $product->category_id)
                                                    selected="selected"
                                                @endif
                                                > {{$category->categoryName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>
                                            <input type="text" name="description" id="description" class="form-control form-control-user" placeholder="Description" value="{{$product->description}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Price</label>
                                            <input type="number" id="price" name="price" min="1" class="form-control form-control-user" placeholder="Price" value="{{$product->price}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Quantity</label>
                                            <input type="number" id="quantity" name="quantity" min="1" class="form-control form-control-user" placeholder="Quantity" value="{{$product->quantity}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Include VAT</label>
                                            <select name="include_VAT" id="include_VAT" class="form-control">
                                                @foreach($VAT_statuses as $VAT_status)
                                                    <option value="{{$VAT_status}}"
                                                            @if($VAT_status == $product->include_VAT)
                                                            selected="selected"
                                                        @endif
                                                    >{{$VAT_status}}</option>
                                                @endforeach
                                            </select>
{{--                                            <input type="checkbox" id="include_VAT" name="include_VAT" class="form-control form-control-user" value="{{$product->include_VAT}}">--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Product Image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input " id="avatar" name="image" >
                                                <label for="avatar" class="custom-file-label">{{$product->image}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
{{--                                <input type="submit" class="btn btn-primary" value="SAVA">--}}
                                <button type="submit" class="btn btn-primary">
                                    <i class="material-icons">save_alt</i>
                                    SAVE</button>
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
    </form>
@endsection
