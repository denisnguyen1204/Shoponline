@extends('admin.master')
@section('body')
    <div class="col-md-6">
        <form enctype="multipart/form-data" action="{{ route('product.update', ['product' => $product->id]) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <label>Branch</label>
                <input type="string" class="form-control" name="branch" value="{{ $product->branch }}">
            </div>
            <div class="form-group">
                <label>Type</label>
                <input type="string" class="form-control" name="type" value="{{ $product->type }}">
            </div>
            <div class="form-group">
                <label>Sex</label>
                <select class="form-control" name="sex" value="{{ $product->sex }}">
                    <option>male</option>
                    <option>female</option>
                </select>
            </div>
            <div class="form-group">
                <label>Size</label>
                <input type="integer" class="form-control" name="size" value="{{ $product->size }}">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" value="{{ $product->status }}">
                    <option>new</option>
                    <option>hot</option>
                    <option>none</option>
                    <option>available</option>
                </select>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="float" class="form-control" name="price" value="{{ $product->price }}">
            </div>
            <button class="btn btn-success">Save</button>
        </form>
    </div>
@endsection

