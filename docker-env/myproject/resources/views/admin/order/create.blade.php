@extends('admin.master')
@section('body')
    <div class="row">
        <div class="col-md-6">
            <form enctype="multipart/form-data" action="{{ route('order.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Check Date</label>
                    <input type="text" class="form-control" name="check_date">
                </div>
                <div class="form-group">
                    <label>Total Price</label>
                    <input type="number" class="form-control" name="total_price">
                </div>
                <div class="form-group">
                    <label>Customer Phone</label>
                    <input type="number" class="form-control" name="customer_phone">
                </div>
                <div class="form-group">
                    <label>Customer Address</label>
                    <input type="text" class="form-control" name="customer_address">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option>pending</option>
                        <option>processing</option>
                        <option>finish</option>
                        <option>canceled</option>
                    </select>
                </div>
                <button class="btn btn-success">Create</button>
            </form>
        </div>
    </div>
@endsection
