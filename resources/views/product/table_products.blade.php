<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <div class="row">
                            <div class="col-md-3">
                                <span style="font-size: large" class="nav-tabs-title">Products</span>
                            </div>
                            <div class="col-md-7">
                                <form class="" action="/products" method="GET">
                                    <div class="row">
                                        <div class="col-md-9 bg-light rounded">
                                            <select name="category_id" class="nav-item form-control">
                                                <option value="">Choose A Category</option>
                                                @foreach ($categories as $category)
                                                    <option value={{$category->id}}> {{$category->categoryName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="nav-item btn btn-success">
                                                <i class="material-icons">filter_alt</i>
                                            </button></div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2 pull-right">
                                <a class="btn btn-success" href="/products/create">
                                    <i class="material-icons">add</i> ADD
                                </a>
                            </div>
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
                            Description
                        </th>
                        <th>
                            Price
                        </th>
                        <th>
                            Creation Date
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
                                    {{$product->description}}
                                </td>
                                <td>
                                    {{$product->price}}
                                </td>
                                <td>
                                    {{$product->creation_date}}
                                </td>
                                <td>
                                    @if($product->include_VAT)
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
                                    <a href="/products/{{$product->id}}/edit" class="btn btn-primary">
                                        <i class="material-icons">update</i>
                                        UPDATE</a>
                                    <form action = "{{route('products.destroy', $product->id)}}" method = "POST">
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
