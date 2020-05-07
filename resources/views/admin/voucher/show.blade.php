@extends('admin.master')
@section('body')
    <div class="col-md-6">
        <form action="{{ route('percent.update', ['voucher' => $voucher->id]) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <label>Percent</label>
                <input type="integer" class="form-control" name="percent" value="{{ $voucher->percent }}">
            </div>
            <button class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
