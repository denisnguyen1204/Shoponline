@extends('admin.master')
@section('body')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('news.store') }}" method="post">
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
                    <label>News</label>
                    <input type="text" class="form-control" name="news">
                </div>
                <button class="btn btn-success">Create</button>
            </form>
        </div>
    </div>
@endsection
