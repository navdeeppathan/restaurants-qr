<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $category->name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f6f6f6;
        }

        h2 {
            text-align: center;
            margin: 20px 0;
            font-weight: 600;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 0 15px 30px;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
            justify-content: center;
        }

        .menu-card {
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 8px 18px rgba(0,0,0,0.08);
            transition: transform .2s ease, box-shadow .2s ease;
            text-decoration: none;
            color: #000;
        }

        .menu-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 30px rgba(0,0,0,0.15);
        }

        .menu-img {
            height: 200px;
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }

        .open-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: #22c55e;
            color: #fff;
            font-size: 12px;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 500;
        }

        .price-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            background: #e63946;
            color: #fff;
            font-size: 12px;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 500;
        }

        .menu-content {
            padding: 14px;
        }

        .menu-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .menu-address {
            font-size: 13px;
            color: #666;
            margin-bottom: 10px;
            font-weight: 400;
        }

        .rating {
            display: inline-block;
            background: #22c55e;
            color: #fff;
            font-size: 12px;
            padding: 4px 8px;
            border-radius: 6px;
            font-weight: 500;
        }

        @media (max-width: 480px) {
            .menu-img {
                height: 150px;
            }
        }

        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 8px;
        }


        .view-detail {
            font-size: 13px;
            font-weight: 500;
            color: #e63946;
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            transition: gap 0.2s ease;
        }

        .menu-card:hover .view-detail {
            gap: 10px;
        }

    </style>
</head>

<body>

<h2>{{ $category->name }}</h2>

<div class="container">
    <div class="menu-grid">
        @foreach($items as $item)
            <a href="/menu/item/{{ $item->id }}" class="menu-card">
                <div class="menu-img"
                     style="background-image:url('{{ $item->image ? asset($item->image) : 'https://upload.wikimedia.org/wikipedia/commons/d/d3/Supreme_pizza.jpg' }}')">
                    <span class="open-badge">Open</span>
                    <span class="price-badge">₹{{ $item->price }}</span>
                </div>

                <div class="menu-content">
                    <div class="menu-title">{{ $item->name }}</div>
                    <div class="menu-address">{{ $item->address ?? 'York, UK' }}</div>
                    <div class="card-footer">
                        <span class="rating">★ {{ $item->rating ?? '5.0' }}</span>

                        <div class="view-detail">
                            View Details <span>→</span>
                        </div>
                    </div>


                </div>
            </a>
        @endforeach
    </div>
</div>

</body>
</html>
