<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="card-title">Orders</h4>
                                <p class="card-category">Orders Managements</p>
                            </div>
                            <div class="col-md-8">
                                <form class="" action="/orders" method="GET">
                                    <div class="row">
                                        <div class="col-md-9 bg-light rounded pull-right">
                                            <select name="status" class="form-control">
                                                <option value="">Select some status to filter</option>
                                                @foreach ($statuses as $status)
                                                    <option value={{$status->status_name}}>{{$status->status_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="nav-item btn btn-success pull-right">
                                                <i class="material-icons">filter_alt</i>
                                            </button></div>
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
                        <th>
                            ID
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Order Date
                        </th>
                        <th>
                            Customer ID
                        </th>
                        <th>
                            Actions
                        </th>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    {{$order->id}}
                                </td>
                                <td>
                                    {{$order->status}}
                                </td>
                                <td>
                                    {{$order->order_date}}
                                </td>
                                <td>
                                    {{$order->user_id}}
                                </td>
                                <td>
                                    <a href="/orders/{{$order->id}}" class="btn btn-success">
                                        <i class="material-icons">visibility</i>
                                        VIEW</a>
                                    <a href="/orders/{{$order->id}}/edit" class="btn btn-primary">
                                        <i class="material-icons">update</i>
                                        UPDATE</a>
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
