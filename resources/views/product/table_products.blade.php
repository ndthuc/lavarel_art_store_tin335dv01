<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="card-title">Products</h4>
                                <p class="card-category">Products Managements</p>
                            </div>
                            <div class="col-md-7">
                                <form class="" action="/products" method="GET">
                                    <div class="row">
                                        <div class="col-md-11 bg-light rounded">
                                            <select name="category_id" class="nav-item form-control">
                                                <option value="">Choose A Category</option>
                                                @foreach ($categories as $category)
                                                    <option value={{$category->id}}
                                                        @if($category->id == $selected_category)
                                                        selected="selected"
                                                        @endif
                                                    > {{$category->categoryName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="submit" class="nav-item btn btn-success btn-just-icon">
                                                <i class="material-icons">filter_alt</i>
                                            </button></div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-1 text-right">
                                <a class="btn btn-success btn-just-icon" href="/products/create">
                                    <i class="material-icons">add</i>
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
                        <th class="text-center">
                            #
                        </th>
                        <th>
                            Image
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
                        <th class="text-center">Include VAT</th>
                        <th class="text-right">Actions</th>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td class="text-center">
                                    {{$product->id}}
                                </td>
                                <td>
                                    <img src="{{$product->image}}"  height="100" width="100" alt="'product-img">
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
                                <td class="text-center">
                                    <input type="checkbox"
                                           @if($product->include_VAT == "Yes")
                                           checked
                                           @endif
                                           disabled>
                                </td>
                                <td>
                                    <span class="td-actions text-right form-inline pull-right">
                                    <a href="/products/{{$product->id}}" class="btn btn-success btn-just-icon">
                                        <i class="material-icons">visibility</i>
                                    </a>
                                    <a href="/products/{{$product->id}}/edit" class="btn btn-primary btn-just-icon">
                                        <i class="material-icons">update</i>
                                    </a>
                                    <form action = "{{route('products.destroy', $product->id)}}" method = "POST">
                                        @csrf
                                        @method('DELETE')
                                        <button TYPE="submit" class="btn btn-danger btn-just-icon" onclick="return confirm('Are you sure want to delete?')">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </form>
                                    </span>
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
{{$products->appends(request()->input())->links()}}
