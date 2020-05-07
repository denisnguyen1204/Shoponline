@extends('admin.master')
@section('body')
    <div class="col-md-6">
        <form action="{{ route('news.update', ['news' => $news->id]) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <label>Branch</label>
                <input type="string" class="form-control" name="branch" value="{{ $news->branch }}">
            </div>
            <div class="form-group">
                <label>News</label>
                <input type="string" class="form-control" name="news" value="{{ $news->news }}">
            </div>
            <button class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
