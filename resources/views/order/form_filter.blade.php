    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Filter Form</h4>
                    <p class="card-category">You can pick dates to filter the orders.</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="/orders" method="GET">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="label-control">From:</label>
                                            <input type="date" name="from_date" id="from_date" class="form-control form-control-user" value="{{$from_date??''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="label-control">To:</label>
                                            <input type="date" name="to_date" id="to_date" class="form-control form-control-user" value="{{$to_date??''}}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="material-icons">find_replace</i>
                                    FIND</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
