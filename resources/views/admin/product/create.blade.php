@extends('admin.master')
@section('body')
    <div class="row">
        <div class="col-md-6">
            <form enctype="multipart/form-data" action="{{ route('product.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Code</label>
                    <input type="string" class="form-control" name="code">
                </div>
                <div class="form-group">
                    <label>Branch</label>
                    <input type="string" class="form-control" name="branch">
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <input type="string" class="form-control" name="type">
                </div>
                <div class="form-group">
                    <label>Sex</label>
                    <select class="form-control" name="sex">
                        <option>male</option>
                        <option>female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Size</label>
                    <input type="integer" class="form-control" name="size">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
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
                    <input type="float" class="form-control" name="price">
                </div>
                <button class="btn btn-success">Create</button>
            </form>
        </div>
    </div>
@endsection
