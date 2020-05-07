@extends('admin.master')
@section('body')
    <div class="col-md-6">
        <form action="{{ route('product-voucher.update', ['product_voucher' => $product_voucher->id]) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <label>Voucher Code</label>
                <input type="string" class="form-control" name="voucher_code" value="{{ $product_voucher->voucher_code }}">
            </div>
            <div class="form-group">
                <label>Product Type</label>
                <input type="string" class="form-control" name="product_type" value="{{ $product_voucher->product_type }}">
            </div>
            <div class="form-group">
                <label>Percent</label>
                <input type="integer" class="form-control" name="percent" value="{{ $product_voucher->percent }}">
            </div>
            <button class="btn btn-success">Save</button>
        </form>
    </div>
@endsection

