<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <div class="row">
                            <div class="col-md-5">
                                <h4 class="card-title">Orders</h4>
                                <p class="card-category">Orders Managements</p>
                            </div>
                            <div class="col-md-7">
                                <form class="" action="/orders" method="GET">
                                    <div class="row">
                                        <div class="col-md-10 bg-light rounded">
                                            <select name="status" class="form-control">
                                                <option value="">Select some status to filter</option>
                                                @foreach ($statuses as $status)
                                                    <option value={{$status->status_name}}
                                                    @if($status->status_name == $selected_status)
                                                        selected="selected"
                                                        @endif>{{$status->status_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="nav-item btn btn-success btn-just-icon">
                                                <i class="material-icons">filter_alt</i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
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
                            Status
                        </th>
                        <th>
                            Order Date
                        </th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th class="text-center">
                            Customer ID
                        </th>
                        <th class="text-right">
                            Actions
                        </th>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td class="text-center">
                                    {{$order->id}}
                                </td>
                                <td>
                                    {{$order->status}}
                                </td>
                                <td>
                                    {{$order->order_date}}
                                </td>
                                <td></td>
                                <td></td>
                                <td class="text-center">
                                    {{$order->user_id}}
                                </td>
                                <td class="td-actions text-right">
                                    <a href="/orders/{{$order->id}}" class="btn btn-success btn-just-icon">
                                        <i class="material-icons">visibility</i>
                                    </a>
                                    <a href="/orders/{{$order->id}}/edit" class="btn btn-primary btn-just-icon">
                                        <i class="material-icons">update</i>
                                    </a>
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
{{$orders->appends(request()->input())->links()}}
