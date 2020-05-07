@extends('admin.master')
@section('body')
    <div class="row">
        <div class="col-md-6">
            <form enctype="multipart/form-data" action="{{ route('order-detail.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Order Id</label>
                    <input type="text" class="form-control" name="order_id">
                </div>
                <div class="form-group">
                    <label>Product Code</label>
                    <input type="text" class="form-control" name="product_code">
                </div>
                <div class="form-group">
                    <label>Product Price</label>
                    <input type="number" class="form-control" name="product_price">
                </div>
                <div class="form-group">
                    <label>Product Quantity</label>
                    <input type="number" class="form-control" name="product_qty">
                </div>
                <div class="form-group">
                    <label>Voucher Code</label>
                    <input type="text" class="form-control" name="voucher_code">
                </div>
                <div class="form-group">
                    <label>Percent</label>
                    <input type="number" class="form-control" name="percent">
                </div>
                <button class="btn btn-success">Create</button>
            </form>
        </div>
    </div>
@endsection
