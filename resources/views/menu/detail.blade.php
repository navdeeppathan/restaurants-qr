{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $item->name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            text-align: center;
            padding: 20px;
        }

        h2 { margin-bottom: 5px; }
        p { font-size: 14px; color: #555; }
        h3 { color: #e63946; }

        .view-btn {
            padding: 12px 25px;
            background: #e63946;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 15px;
        }

        /* ================= AR MODAL ================= */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: #000;
            z-index: 999;
        }

        /* Camera */
        video {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Close Button */
        .close {
            position: absolute;
            top: 15px;
            left: 15px;
            z-index: 5;
            font-size: 22px;
            color: #fff;
            cursor: pointer;
        }

        /* Overlay Content */
        .overlay {
            position: relative;
            z-index: 4;
            margin-top: 80px;
            color: #fff;
        }

        /* Price */
        .price-tag {
            background: rgba(0,0,0,0.75);
            display: inline-block;
            padding: 8px 14px;
            border-radius: 8px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* 3D Container */
        .pizza-wrapper {
            width: 460px;
            height: 460px;
            margin: 15px auto;
            perspective: 1000px;
        }

        .pizza {
            width: 100%;
            height: 100%;
            /*background-image: url('{{ asset($item->image ?? "https://img.freepik.com/free-vector/realistic-burger-illustration_23-2151151678.jpg") }}');*/
            background-image: url('https://png.pngtree.com/png-vector/20240521/ourlarge/pngtree-tasty-burger-and-fries-on-transparent-background-png-image_12498956.png');
            background-size: cover;
            background-position: center;
            border-radius: 50%;
            transform-style: preserve-3d;
            cursor: grab;
            transition: transform 0.3s ease;
        }

        .hint {
            font-size: 12px;
            opacity: 0.85;
        }
    </style>
</head>

<body>

    <h2>{{ $item->name }}</h2>
    <p>{{ $item->description }}</p>
    <h3>₹{{ $item->price }}</h3>

    <button class="view-btn" onclick="openAR()">View in 3D</button>

    <div class="modal" id="arModal">
        <span class="close" onclick="closeAR()">✖</span>

       
        <video id="camera" autoplay playsinline></video>

        
        <div class="overlay">
            <div class="price-tag">₹{{ $item->price }}</div>

            <div class="pizza-wrapper">
                <div class="pizza" id="pizza"></div>
            </div>

            <h3>{{ $item->name }}</h3>
            <p class="hint">Drag to rotate</p>
        </div>
    </div>



<script>
    let video = document.getElementById("camera");
    let pizza = document.getElementById("pizza");

    let rotationY = 0;
    let isDragging = false;
    let startX = 0;

    async function openAR() {
        document.getElementById("arModal").style.display = "block";

        try {
            const stream = await navigator.mediaDevices.getUserMedia({
                video: { facingMode: "environment" },
                audio: false
            });
            video.srcObject = stream;
        } catch (e) {
            alert("Please allow camera permission");
        }
    }

    function closeAR() {
        document.getElementById("arModal").style.display = "none";
        if (video.srcObject) {
            video.srcObject.getTracks().forEach(track => track.stop());
        }
    }

   
    window.onload = () => {
        openAR();
    };

    /* Mouse */
    pizza.addEventListener("mousedown", e => {
        isDragging = true;
        startX = e.clientX;
    });

    document.addEventListener("mouseup", () => isDragging = false);

    document.addEventListener("mousemove", e => {
        if (!isDragging) return;
        let delta = e.clientX - startX;
        rotationY += delta * 0.6;
        pizza.style.transform = `rotateY(${rotationY}deg)`;
        startX = e.clientX;
    });

   
    pizza.addEventListener("touchstart", e => {
        isDragging = true;
        startX = e.touches[0].clientX;
    });

    pizza.addEventListener("touchend", () => isDragging = false);

    pizza.addEventListener("touchmove", e => {
        if (!isDragging) return;
        let delta = e.touches[0].clientX - startX;
        rotationY += delta * 0.6;
        pizza.style.transform = `rotateY(${rotationY}deg)`;
        startX = e.touches[0].clientX;
    });
</script>


</body>
</html> --}}





<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>{{ $item->name }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #f5f5f5;
        text-align: center;
        padding: 16px;
    }

    h2 { margin-bottom: 5px; }
    p { font-size: 14px; color: #555; }
    h3 { color: #e63946; }

    .view-btn {
        padding: 12px 22px;
        background: #e63946;
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 15px;
        cursor: pointer;
        margin-top: 15px;
        width: 100%;
        max-width: 280px;
    }

    /* ================= AR MODAL ================= */
    .modal {
        display: none;
        position: fixed;
        inset: 0;
        background: #000;
        z-index: 999;
        overflow: hidden;
    }

    /* Camera */
    video {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Close Button */
    .close {
        position: fixed;
        top: 15px;
        left: 15px;
        z-index: 5;
        font-size: 22px;
        color: #fff;
        cursor: pointer;
        background: rgba(0,0,0,0.6);
        padding: 8px 12px;
        border-radius: 50%;
    }

    /* Overlay Content */
    .overlay {
        position: relative;
        z-index: 4;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: #fff;
        padding: 16px;
    }

    /* Price */
    .price-tag {
        background: rgba(0,0,0,0.75);
        padding: 8px 14px;
        border-radius: 8px;
        font-weight: bold;
        margin-bottom: 10px;
        font-size: 14px;
    }

    /* 3D Container */
    .pizza-wrapper {
        width: min(80vw, 360px);
        height: min(80vw, 360px);
        perspective: 1000px;
        margin: 10px auto;
    }

    .pizza {
        width: 100%;
        height: 100%;
        /* background-image: url('https://png.pngtree.com/png-vector/20240705/ourlarge/pngtree-real-burger-fast-food-png-image_12959659.png'); */
        background-image: url("{{ asset('burgur.png') }}");

        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        transform-style: preserve-3d;
        cursor: grab;
        transition: transform 0.2s ease;
    }

    .hint {
        font-size: 12px;
        opacity: 0.8;
        margin-top: 6px;
    }

    /* Tablets */
    @media (min-width: 768px) {
        .pizza-wrapper {
            width: 420px;
            height: 420px;
        }
    }

    /* Desktop */
    @media (min-width: 1024px) {
        .pizza-wrapper {
            width: 460px;
            height: 460px;
        }
    }
</style>
</head>

<body>

<button class="view-btn" onclick="openAR()">View in 3D</button>

<!-- ================= AR MODAL ================= -->
<div class="modal" id="arModal">
    <span class="close" onclick="closeAR()">✖</span>

    <video id="camera" autoplay playsinline></video>

    <div class="overlay">
        <div class="pizza-wrapper">
            <div class="pizza" id="pizza"></div>
        </div>
        <p class="hint">Drag to rotate</p>
    </div>
</div>

<script>
let video = document.getElementById("camera");
let pizza = document.getElementById("pizza");

let rotationY = 0;
let isDragging = false;
let startX = 0;

async function openAR() {
    document.getElementById("arModal").style.display = "block";

    try {
        const stream = await navigator.mediaDevices.getUserMedia({
            video: { facingMode: "environment" },
            audio: false
        });
        video.srcObject = stream;
    } catch (e) {
        alert("Please allow camera permission");
    }
}

function closeAR() {
    document.getElementById("arModal").style.display = "none";
    if (video.srcObject) {
        video.srcObject.getTracks().forEach(track => track.stop());
    }
}

/* AUTO OPEN */
window.onload = () => openAR();

/* Mouse */
pizza.addEventListener("mousedown", e => {
    isDragging = true;
    startX = e.clientX;
});
document.addEventListener("mouseup", () => isDragging = false);
document.addEventListener("mousemove", e => {
    if (!isDragging) return;
    let delta = e.clientX - startX;
    rotationY += delta * 0.6;
    pizza.style.transform = `rotateY(${rotationY}deg)`;
    startX = e.clientX;
});

/* Touch */
pizza.addEventListener("touchstart", e => {
    isDragging = true;
    startX = e.touches[0].clientX;
});
pizza.addEventListener("touchend", () => isDragging = false);
pizza.addEventListener("touchmove", e => {
    if (!isDragging) return;
    let delta = e.touches[0].clientX - startX;
    rotationY += delta * 0.6;
    pizza.style.transform = `rotateY(${rotationY}deg)`;
    startX = e.touches[0].clientX;
});
</script>

</body>
</html>
