<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
<table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Provider</th>
            <th>Product Name</th>
            <th>Product Title</th>
            <th>Game List Status</th>
            <th>Game Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($providers as $item)
        <tr>
            <td>{{ $item->provider }}</td>
            <td>{{ $item->product_name }}</td>
            <td>{{ $item->product_title }}</td>
            <td>
                <span class="badge
                    {{ $item->game_list_status == '1' ? 'bg-success' : 'bg-danger' }}">
                    {{ ucfirst($item->game_list_status) }}
                </span>
            </td>
            <td>{{ $item->game_type }}</td>
            <td>
                <a href="/admin/provider-index/{{ $item->id }}"
                   class="btn btn-sm btn-primary">
                   Status Change
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</table>

    </div>
</body>
</html>
