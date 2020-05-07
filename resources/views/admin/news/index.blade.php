@extends('admin.master')
@section('body')
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Code</th>
                <th>Branch</th>
                <th>News</th>
                <th>Action</th>
            </tr>
        </thead>
        <a class="btn btn-info" href="{{ route('news.create') }}">Add</a>
        <tbody>
            @foreach($newss as $news)
                <tr>
                    <td>{{ $news->code }}</td>
                    <td>{{ $news->branch }}</td>
                    <td>{{ $news->news }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('news.edit', ['news' => $news->id]) }}">Edit</a>
                        <button class="btn btn-info" onclick="callDelete({{$news->id}})">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        const urls = {
            'news.destroy': '{{ route('news.destroy', ['news' => ':id']) }}'
        }
        function callDelete(id) {
            if (!confirm('Bạn có chắc muốn xóa?')) return;
            $.ajax({
                method: 'delete',
                url: urls['news.destroy'].replace(':id', id),
                success: function (res) {
                    window.location.reload();
                }
            })
        }
    </script>
@endsection
