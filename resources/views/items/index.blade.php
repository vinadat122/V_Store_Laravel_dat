<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Item List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fdfdfd;
            margin: 0;
            padding: 0;
        }

        .header {
            background: #e4572e;
            color: white;
            padding: 18px 30px;
            font-size: 24px;
            font-weight: bold;
        }

        .title {
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            margin: 25px 0;
            color: #d28e0c;
        }

        .container {
            width: 90%;
            margin: 20px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #f8f8f8;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #e4572e;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            font-size: 14px;
        }

        .btn-edit {
            background-color: #4CAF50;
        }

        .btn-edit:hover {
            background-color: #45a049;
        }

        .btn-delete {
            background-color: #f44336;
        }

        .btn-delete:hover {
            background-color: #da190b;
        }

        .btn-add {
            display: inline-block;
            background: #e4572e;
            color: white;
            padding: 10px 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-add:hover {
            background: #d14720;
        }

        .message-success {
            background-color: #d4edda;
            color: #155724;
            padding: 12px 20px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="header">V_Store - Items</div>
    <div class="title">Sale Items</div>

    <div class="container">

        <!-- Hiển thị thông báo thành công -->
        @if(session('success'))
            <div class="message-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Nút thêm mới -->
        <a href="{{ route('items.create') }}" class="btn-add">Add New</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Item Code</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Expired Date</th>
                    <th>Note</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->item_code }}</td>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->expired_date }}</td>
                    <td>{{ $item->note }}</td>
                    <td>
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align:center;">No items found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
