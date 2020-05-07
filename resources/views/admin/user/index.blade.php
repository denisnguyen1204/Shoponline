@extends('admin.master')
@section('body')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Order</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>{{ $user->address }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('getOrder',['phone_number'=>$user->phone_number]) }}">Order</a>
                </td>
{{--                <td>--}}
{{--                    <a class="btn btn-info" href="{{ route("order.edit", ['order' => $order->id]) }}">Edit</a>--}}
{{--                    <button class="btn btn-info" onclick="callDelete({{$order->id}})">--}}
{{--                        Delete--}}
{{--                    </button>--}}
{{--                </td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>

{{--    <script>--}}
{{--        const urls = {--}}
{{--            'order.destroy': '{{ route('order.destroy', ['order' => ':id']) }}'--}}
{{--        }--}}
{{--        function callDelete(id) {--}}
{{--            if (!confirm('Bạn có chắc muốn xóa?')) return;--}}
{{--            $.ajax({--}}
{{--                method:'delete',--}}
{{--                url: urls['order.destroy'].replace(':id', id),--}}
{{--                success: function (res) {--}}
{{--                    window.location.reload();--}}
{{--                }--}}
{{--            })--}}
{{--        }--}}
{{--    </script>--}}
@endsection
