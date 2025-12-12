<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Item</title>
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

        .form-container {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background: #f8f8f8;
            border-radius: 8px;
            box-shadow: 0px 0px 10px #ccc;
        }

        label {
            display: block;
            margin: 12px 0 6px;
            font-weight: bold;
        }

        input[type=text],
        input[type=number],
        input[type=date] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .submit-btn {
            background: #e4572e;
            color: white;
            border: none;
            padding: 10px 15px;
            margin-top: 15px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        .submit-btn:hover {
            background: #d14720;
        }

        .error-msg {
            color: red;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <!-- HEADER -->
    <div class="header">V_Store - Edit Item</div>

    <div class="title">Edit Item</div>

    <!-- FORM -->
    <div class="form-container">
        <form method="POST" action="{{ route('items.update', $item->id) }}">
            @csrf

            <label>Item Code:</label>
            <input type="text" name="item_code" value="{{ old('item_code', $item->item_code) }}" required>
            @error('item_code')
                <div class="error-msg">{{ $message }}</div>
            @enderror

            <label>Item Name:</label>
            <input type="text" name="item_name" value="{{ old('item_name', $item->item_name) }}" required>
            @error('item_name')
                <div class="error-msg">{{ $message }}</div>
            @enderror

            <label>Quantity:</label>
            <input type="number" name="quantity" value="{{ old('quantity', $item->quantity) }}" required>
            @error('quantity')
                <div class="error-msg">{{ $message }}</div>
            @enderror

            <label>Expired Date:</label>
            <input type="date" name="expired_date" value="{{ old('expired_date', $item->expired_date) }}" required>
            @error('expired_date')
                <div class="error-msg">{{ $message }}</div>
            @enderror

            <label>Note:</label>
            <input type="text" name="note" value="{{ old('note', $item->note) }}">
            @error('note')
                <div class="error-msg">{{ $message }}</div>
            @enderror

            <button type="submit" class="submit-btn">Update</button>
        </form>
    </div>
</body>
</html>
