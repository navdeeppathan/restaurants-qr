<!DOCTYPE html>
<html>
<head>
    <title>Items</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 20px;
        }

        h2 {
            margin-bottom: 15px;
        }

        .card {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
        }

        select, input, textarea {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            background: #1d3557;
            color: #fff;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #16324f;
        }

        .item-table {
            width: 100%;
            border-collapse: collapse;
        }

        .item-table th, .item-table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .item-table th {
            background: #f1f1f1;
        }

        .success {
            color: green;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

<h2>Add Item</h2>

<div class="card">
    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <form method="POST" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label>Category</label>
            <select name="category_id" required>
                <option value="">Select Category</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Item Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Price (₹)</label>
            <input type="number" name="price" required>
        </div>

        <div class="form-group">
            <label>Item Image</label>
            <input type="file" name="image" accept="image/*">
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="3"></textarea>
        </div>

        <button type="submit">Add Item</button>
    </form>
</div>

<h2>Item List</h2>

<div class="card">
    <table class="item-table">
        <thead>
            <tr>
                <th>Item</th>
                <th>Category</th>
                <th>Price</th>
                <th>Image</th>

            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>₹{{ $item->price }}</td>
                    <td>
                        @if($item->image)
                            <img src="{{ asset($item->image) }}" width="60" style="border-radius:8px">
                        @else
                            -
                        @endif
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
