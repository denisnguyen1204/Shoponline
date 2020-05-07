@extends('admin.master')
@section('body')
    <div class="col-md-6">
        <form action="{{ route('order-detail.update', ['order_detail' => $order_detail->id]) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <label>Order Id</label>
                <input type="text" class="form-control" name="order_id" value="{{ $order_detail->order_id }}">
            </div>
            <div class="form-group">
                <label>Product Code</label>
                <input type="text" class="form-control" name="product_code" value="{{ $order_detail->product_code }}">
            </div>
            <div class="form-group">
                <label>Product Price</label>
                <input type="number" class="form-control" name="product_price" value="{{ $order_detail->product_price }}">
            </div>
            <div class="form-group">
                <label>Product Quantity</label>
                <input type="number" class="form-control" name="product_qty" value="{{ $order_detail->product_qty }}">
            </div>
            <div class="form-group">
                <label>Voucher Code</label>
                <input type="text" class="form-control" name="voucher_code" value="{{ $order_detail->voucher_code }}">
            </div>
            <div class="form-group">
                <label>Percent</label>
                <input type="number" class="form-control" name="percent" value="{{ $order_detail->percent }}">
            </div>
            <button class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
