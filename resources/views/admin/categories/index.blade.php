<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 20px;
        }

        h2 {
            margin-bottom: 15px;
        }

        /* Form */
        .add-form {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
        }

        .add-form input {
            flex: 1;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .add-form button {
            padding: 10px 18px;
            background: #1d3557;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .add-form button:hover {
            background: #16324f;
        }

        /* Cards */
        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
        }

        .category-card {
            background: #fff;
            padding: 16px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            position: relative;
        }

        .category-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .qr-img {
            width: 150px;
            margin: 10px auto;
            display: block;
            border: 1px dashed #ddd;
            padding: 10px;
            border-radius: 10px;
        }

        .qr-btn {
            display: inline-block;
            margin-top: 8px;
            padding: 8px 14px;
            background: #e63946;
            color: #fff;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
        }

        .qr-btn:hover {
            background: #c92f3b;
        }

        hr {
            margin: 20px 0;
            border: none;
            border-top: 1px solid #ddd;
        }
    </style>
</head>

<body>

<h2>Categories</h2>
{{-- <div style="margin-bottom: 20px;">
    <a href="{{url('admin/items')}}" style="background: #1d3557; padding: 10px 18px; color: #fff; border-radius: 6px; text-decoration: none;">Add Items</a>
</div> --}}

{{-- <form method="POST" class="add-form">
    @csrf
    <input name="name" placeholder="Category Name" required>
    <button type="submit">Add Category</button>
</form> --}}

<div class="category-grid">
    @foreach($categories as $cat)
        <div class="category-card">
            <div class="category-title">{{ $cat->name }}</div>

            {{-- <a href="/admin/category/{{ $cat->id }}/qr" class="qr-btn">
                Generate QR
            </a> --}}
            <a href="/admin/category/{{ $cat->id }}/qr" class="qr-btn">
                Generate QR
            </a>

            @if($cat->qr_code)
                <img src="{{ asset('storage/'.$cat->qr_code) }}" class="qr-img">
            @else
                <p style="font-size:13px;color:#777;margin-top:10px;">
                    QR not generated yet
                </p>
            @endif
        </div>
    @endforeach
</div>

</body>
</html>
