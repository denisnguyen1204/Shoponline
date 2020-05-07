@extends('admin.master')
@section('body')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Order Id</th>
            <th>Product Code</th>
            <th>Product Price</th>
            <th>Product Qty</th>
            <th>Voucher Code</th>
            <th>Percent</th>
{{--            <th>Actions</th>--}}
        </tr>
        </thead>
{{--        <a class="btn btn-info" href="{{ route('order-detail.create') }}">Add</a>--}}
        <tbody>
        @foreach($order_details as $order_detail)
            <tr>
                <td>{{ $order_detail->order_id }}</td>
                <td>{{ $order_detail->product_code }}</td>
                <td>{{ $order_detail->product_price }}</td>
                <td>{{ $order_detail->product_qty }}</td>
                <td>{{ $order_detail->voucher_code }}</td>
                <td>{{ $order_detail->percent }}</td>
{{--                <td>--}}
{{--                    <a class="btn btn-info" href="{{ route('order-detail.edit', ['order_detail' => $order_detail->id]) }}">Edit</a>--}}
{{--                    <button class="btn btn-info" onclick="callDelete({{$order_detail->id}})">--}}
{{--                        Delete--}}
{{--                    </button>--}}
{{--                </td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        const urls = {
            'order-detail.destroy': '{{ route('order-detail.destroy', ['order_detail' => ':id']) }}'
        }
        function callDelete(id) {
            if (!confirm('Bạn có chắc muốn xóa?')) return;
            $.ajax({
                method:'delete',
                url: urls['order_detail.destroy'].replace(':id', id),
                success: function (res) {
                    window.location.reload();
                }
            })
        }
    </script>
@endsection
