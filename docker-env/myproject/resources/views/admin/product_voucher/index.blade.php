@extends('admin.master')
@section('body')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Voucher Code</th>
            <th>Product Type</th>
            <th>Percent</th>
            <th>Action</th>
        </tr>
        </thead>
        <a class="btn btn-info" href="{{ route('product-voucher.create') }}">Add</a>
        <tbody>
        @foreach($product_vouchers as $product_voucher)
            <tr>
                <td>{{ $product_voucher->voucher_code }}</td>
                <td>{{ $product_voucher->product_type }}</td>
                <td>{{ $product_voucher->percent }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route("product-voucher.edit", ['product_voucher' => $product_voucher->id]) }}">Edit</a>
                    <button class="btn btn-info" onclick="callDelete({{$product_voucher->id}})">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        const urls = {
            'product-voucher.destroy': '{{ route('product-voucher.destroy', ['product_voucher' => ':id']) }}'
        }
        function callDelete(id) {
            if (!confirm('Bạn có chắc muốn xóa?')) return;
            $.ajax({
                method:'delete',
                url: urls['product-voucher.destroy'].replace(':id', id),
                success: function (res) {
                    window.location.reload();
                }
            })
        }
    </script>
@endsection
