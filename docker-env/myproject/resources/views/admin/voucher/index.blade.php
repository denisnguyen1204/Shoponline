@extends('admin.master')
@section('body')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Code</th>
{{--            <th>Percent</th>--}}
            <th>Action</th>
        </tr>
        </thead>
        <a class="btn btn-info" href="{{ route('voucher.create') }}">Add</a>
        <tbody>
        @foreach($vouchers as $voucher)
            <tr>
                <td>{{ $voucher->code }}</td>
                <td>
{{--                    <a class="btn btn-info" href="{{ url("admin/voucher/{$voucher->id}/edit") }}">Edit</a>--}}
                    <button class="btn btn-info" onclick="callDelete({{$voucher->id}})">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        const urls = {
            'voucher.destroy': '{{ route('voucher.destroy', ['voucher' => ':id']) }}'
        }
        function callDelete(id) {
            if (!confirm('Bạn có chắc muốn xóa?')) return;
            $.ajax({
                method: 'delete',
                url: urls['voucher.destroy'].replace(':id',id),
                success: function (res) {
                    window.location.reload();
                }
            })
        }
    </script>
@endsection
