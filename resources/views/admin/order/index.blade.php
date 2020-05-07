@extends('admin.master')
@section('body')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Check Date</th>
            <th>Total Price</th>
            <th>Customer Phone</th>
            <th>Customer Address</th>
            <th>Status</th>
            <th>Detail</th>
            <th>Actions</th>
        </tr>
        </thead>
        <a class="btn btn-info" href="{{ route('order.create') }}">Add</a>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->check_date }}</td>
                <td>{{ $order->total_price }}</td>
                <td>{{ $order->customer_phone }}</td>
                <td>{{ $order->customer_address }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('get',['id' => $order->id]) }}">Detail</a>
                </td>
                <td>
                    <a class="btn btn-info" href="{{ route("order.edit", ['order' => $order->id]) }}">Edit</a>
                    <button class="btn btn-info" onclick="callDelete({{$order->id}})">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        const urls = {
            'order.destroy': '{{ route('order.destroy', ['order' => ':id']) }}'
        }
        function callDelete(id) {
            if (!confirm('Bạn có chắc muốn xóa?')) return;
            $.ajax({
                method:'delete',
                url: urls['order.destroy'].replace(':id', id),
                success: function (res) {
                    window.location.reload();
                }
            })
        }
    </script>
@endsection
