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
    </style>
</head>
<body>
    <div class="header">V_Store - Item List</div>
    <div class="title">Item List</div>

    <div class="container">
        <a href="{{ route('items.create') }}" class="btn-add">Add New Item</a>
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
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->item_code }}</td>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->expired_date }}</td>
                    <td>{{ $item->note }}</td>
                    <td>
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-edit">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
