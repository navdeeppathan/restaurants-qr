<!DOCTYPE html>
<html>
<head>
    <title>{{ $item->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        /* Button */
        .view-btn {
            padding: 10px 20px;
            background: #e63946;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 6px;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.7);
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .modal-content {
            background: transparent;
            width: 500px;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            position: relative;
        }

        /* Pizza container */
        .pizza-wrapper {
            width: 100%;
            height: 300px;
            margin: auto;
            perspective: 1000px;
        }

        .pizza {
            width: 100%;
            height: 100%;
            background-image: url('https://img.freepik.com/free-vector/realistic-burger-illustration_23-2151151678.jpg?semt=ais_hybrid&w=740&q=80');
            background-size: cover;
            background-position: center;
            border-radius: 50%;
            cursor: grab;
            transform-style: preserve-3d;
            transition: transform 0.1s linear;
        }

        /* Price tag */
        .price-tag {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #000;
            color: #fff;
            padding: 6px 10px;
            border-radius: 6px;
            font-weight: bold;
        }

        /* Close */
        .close {
            position: absolute;
            top: 10px;
            left: 10px;
            cursor: pointer;
            font-size: 20px;
        }
    </style>
</head>

<body>

<h2>{{ $item->name }}</h2>
<p>{{ $item->description }}</p>
<h3>₹{{ $item->price }}</h3>

<button class="view-btn" onclick="openModal()">View in 3D</button>

<!-- MODAL -->
<div class="modal" id="pizzaModal">
    <div class="modal-content">
        <span style="color: #fff;" class="close" onclick="closeModal()">✖</span>

        <div class="price-tag">₹{{ $item->price }}</div>

        <h3 style="color: #fff;">{{ $item->name }}</h3>

        <div class="pizza-wrapper">
            <div class="pizza" id="pizza"></div>
        </div>

        <p style="font-size:12px;margin-top:10px;">Drag to rotate</p>
    </div>
</div>

<script>
    let pizza = document.getElementById('pizza');
    let rotationY = 0;
    let isDragging = false;
    let startX = 0;
    let autoRotateInterval = null;

    function startAutoRotate() {
        autoRotateInterval = setInterval(() => {
            if (!isDragging) {
                rotationY += 0.4;   // speed control
                pizza.style.transform = `rotateY(${rotationY}deg)`;
            }
        }, 16); // ~60fps
    }

    function stopAutoRotate() {
        clearInterval(autoRotateInterval);
    }

    pizza.addEventListener('mousedown', (e) => {
        isDragging = true;
        startX = e.clientX;
        stopAutoRotate();
        pizza.style.cursor = 'grabbing';
    });

    document.addEventListener('mouseup', () => {
        if (isDragging) {
            isDragging = false;
            pizza.style.cursor = 'grab';
            startAutoRotate();
        }
    });

    document.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        let deltaX = e.clientX - startX;
        rotationY += deltaX * 0.5;
        pizza.style.transform = `rotateY(${rotationY}deg)`;
        startX = e.clientX;
    });

    /* Mobile Touch */
    pizza.addEventListener('touchstart', (e) => {
        isDragging = true;
        startX = e.touches[0].clientX;
        stopAutoRotate();
    });

    pizza.addEventListener('touchend', () => {
        isDragging = false;
        startAutoRotate();
    });

    pizza.addEventListener('touchmove', (e) => {
        let deltaX = e.touches[0].clientX - startX;
        rotationY += deltaX * 0.5;
        pizza.style.transform = `rotateY(${rotationY}deg)`;
        startX = e.touches[0].clientX;
    });

    function openModal() {
        document.getElementById('pizzaModal').style.display = 'flex';
        startAutoRotate();
    }

    function closeModal() {
        document.getElementById('pizzaModal').style.display = 'none';
        stopAutoRotate();
    }
</script>


</body>
</html>
