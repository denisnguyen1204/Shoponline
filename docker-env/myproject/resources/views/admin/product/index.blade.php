@extends('admin.master')
@section('body')
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Branch</th>
                <th>Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <a class="btn btn-info" href="{{ route('product.create') }}">Add</a>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->branch }}</td>
                    <td>{{ $product->type }}</td>
                    <td>{{ $product->status }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route("product.edit", ['product' => $product->id]) }}">Edit</a>
                        <button class="btn btn-info" onclick="callDelete({{$product->id}})">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        const urls = {
            'product.destroy': '{{ route('product.destroy', ['product' => ':id']) }}'
        }
        function callDelete(id) {
            if (!confirm('Bạn có chắc muốn xóa?')) return;
            $.ajax({
                method:'delete',
                url: urls['product.destroy'].replace(':id', id),
                success: function (res) {
                    window.location.reload();
                }
            })
        }
    </script>
@endsection
