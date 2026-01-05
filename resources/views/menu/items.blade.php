<!DOCTYPE html>
<html>
<head>
    <title>{{ $category->name }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f6f6;
            margin: 0;
            padding: 15px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 15px;
        }

        .menu-card {
            background: #fff;
            border-radius: 12px;
            padding: 12px;
            text-decoration: none;
            color: #000;
            box-shadow: 0 6px 15px rgba(0,0,0,0.08);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            position: relative;
        }

        .menu-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }

        .menu-img {
            width: 100%;
            height: 120px;
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/d/d3/Supreme_pizza.jpg');
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .menu-title {
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .menu-price {
            color: #e63946;
            font-weight: bold;
            font-size: 14px;
        }

        .price-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #e63946;
            color: #fff;
            padding: 4px 8px;
            font-size: 12px;
            border-radius: 6px;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>

<h2>{{ $category->name }}</h2>

<div class="menu-grid">
    @foreach($items as $item)
        <a href="/menu/item/{{ $item->id }}" class="menu-card">
            <div class="price-badge">₹{{ $item->price }}</div>

            <div class="menu-img"
                 style="background-image:url('{{ $item->image ? asset($item->image) : 'https://upload.wikimedia.org/wikipedia/commons/d/d3/Supreme_pizza.jpg' }}')">
            </div>

            <div class="menu-title">{{ $item->name }}</div>
            <div class="menu-price">View Details</div>
        </a>
    @endforeach
</div>


</body>
</html>
