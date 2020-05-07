@extends('admin.master')
@section('body')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('product-voucher.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Voucher Code</label>
                    <input type="string" class="form-control" name="voucher_code">
                </div>
                <div class="form-group">
                    <label>Product Type</label>
                    <input type="string" class="form-control" name="product_type">
                </div>
                <div class="form-group">
                    <label>Percent</label>
                    <input type="integer" class="form-control" name="percent">
                </div>
                <button class="btn btn-success">Create</button>
            </form>
        </div>
    </div>
@endsection
