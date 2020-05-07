@extends('admin.master')
@section('body')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('voucher.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Code</label>
                    <label>
                        <input type="string" class="form-control" name="code">
                    </label>
                </div>
{{--                <div class="form-group">--}}
{{--                    <label>Percent</label>--}}
{{--                    <label>--}}
{{--                        <input type="integer" class="form-control" name="percent">--}}
{{--                    </label>--}}
{{--                </div>--}}
                <button class="btn btn-success">Create</button>
            </form>
        </div>
    </div>
@endsection
