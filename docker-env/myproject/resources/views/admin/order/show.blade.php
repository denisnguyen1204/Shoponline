@extends('admin.master')
@section('body')
    <div class="col-md-6">
        <form action="{{ route('order.update', ['order' => $order->id]) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <label>Check Date</label>
                <input type="text" class="form-control" name="check_date" value="{{ $order->check_date }}">
            </div>
            <div class="form-group">
                <label>Total Price</label>
                <input type="number" class="form-control" name="total_price" value="{{ $order->total_price }}">
            </div>
            <div class="form-group">
                <label>Customer Phone</label>
                <input type="number" class="form-control" name="customer_phone" value="{{ $order->customer_phone }}">
            </div>
            <div class="form-group">
                <label>Customer Address</label>
                <input type="text" class="form-control" name="customer_address" value="{{ $order->customer_address }}">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" value="{{ $order->status }}">
                    <option>pending</option>
                    <option>processing</option>
                    <option>finish</option>
                    <option>canceled</option>
                </select>
            </div>
            <button class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
