<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save Bite</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Helvetica', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        header {
            background-color: #107873;
            color: rgb(255, 255, 255);
            text-align: center;
            padding: 1rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        nav {
            background-color: #333;
            color: white;
            padding: 0.5rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        nav ul {
            list-style-type: none;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 1rem;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #107873;
        }

        main {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .hero {
            background-image: url('/api/placeholder/1200/600');
            background-size: cover;
            background-position: center;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: rgb(241, 241, 241);
            position: relative;
        }

        .hero video {
            position: absolute;
            width: 150%;
            height: 150%;
            object-fit: cover;
            z-index: -1;
        }

        .hero h1 {
            font-size: 3rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .restaurant-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .restaurant-card {
            background-color: #107873;
            border-radius: 8px;
            padding: 1rem;
            box-shadow: 0 4px 6px rgba(255, 255, 255, 0.1);
            transition: transform 0.3s;
        }

        #restaurants h2 {
            background: linear-gradient(to right, #107873, #0a4f4c);
            color: white;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .restaurant-card:hover {
            transform: translateY(-5px);
        }

        .restaurant-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .restaurant-card h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .restaurant-card button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
            margin-top: 1rem;
            border-radius: 5px;
        }

        .restaurant-card button:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #107873;
            color: rgb(0, 0, 0);
            text-align: center;
            padding: 1rem;
            margin-top: 2rem;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2);
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #ffffff;
            background-image: linear-gradient(to bottom right, #ffffff, #f0f0f0);
            margin: 5% auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 600px;
            position: relative;
        }

        .modal-content::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100px;
            background-image: url('img/food-pattern.png');
            background-size: cover;
            opacity: 0.1;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .modal-content h2 {
            color: #107873;
            margin-bottom: 20px;
            text-align: center;
            position: relative;
        }

        .close {
            position: absolute;
            right: 20px;
            top: 20px;
            color: #107873;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
        }

        #foodList {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            list-style-type: none;
            padding: 0;
        }

        #foodList li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 10px;
        }

        input[type="number"] {
            width: 50px;
            margin-right: 10px;
        }

        #foodList li:last-child {
            border-bottom: none;
        }

        input[type="number"],
        input[type="text"],
        input[type="tel"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        #orderForm button[type="submit"] {
            background-color: #107873;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
            border-radius: 5px;
            width: 100%;
        }

        #orderForm button[type="submit"]:hover {
            background-color: #0a4f4c;
        }

        #receiptModal {
            display: none;
            position: fixed;
            z-index: 2;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
        }

        #receipt {
            background-color: #fefefe;
            border-radius: 8px;
            margin: 10% auto;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            width: 80%;
            max-width: 400px;
        }

        .qr-code-image {
            max-width: 150px;
            height: auto;
            display: block;
            margin: 10px auto;
        }

        .news-section {
            padding: 2rem 0;
            background-color: #f0f0f0;
        }

        .news-section h2 {
            text-align: center;
            margin-bottom: 1rem;
            color: #107873;
        }

        .slider-container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            overflow: hidden;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
            position: relative;
        }

        .slide img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 8px;
        }

        .slide-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 15px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        .slide-content h3 {
            margin: 0 0 10px 0;
            font-size: 1.2em;
        }


        .visit-btn {
            display: inline-block;
            background-color: #107873;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            font-size: 0.9em;
        }

        .visit-btn:hover {
            background-color: #0a4f4c;
        }

        #about {
            background-color: #f9f9f9;
            padding: 3rem 0;
            text-align: center;
        }

        #about h2 {
            color: #107873;
            margin-bottom: 1.5rem;
        }

        .about-content {
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .about-text {
            flex: 1;
            text-align: left;
            padding-right: 2rem;
        }

        .about-image {
            flex: 1;
            max-width: 300px;
        }

        .about-image img {
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .about-content {
                flex-direction: column;
            }

            .about-text {
                padding-right: 0;
                margin-bottom: 1.5rem;
            }

            .about-image {
                max-width: 100%;
            }
        }

        @keyframes slide {
            0% {
                transform: translateX(0);
            }

            33.33% {
                transform: translateX(-100%);
            }

            66.66% {
                transform: translateX(-200%);
            }

            100% {
                transform: translateX(0);
            }
        }

        .slider {
            animation: slide 15s infinite;
        }

        .slider:hover {
            animation-play-state: paused;
        }

        @media (max-width: 768px) {
            .restaurant-list {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
        }

        @media (max-width: 480px) {
            .restaurant-list {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Food Waste Reduction Marketplace</h1>
    </header>

    <nav>
        <ul>
            <li><a href="#home">Beranda</a></li>
            <li><a href="#restaurants">Restoran</a></li>
            <li><a href="#news">Berita Terbaru</a></li>
            <li><a href="#about">Tentang Kami</a></li>
            <li><a href="#contact">Kontak</a></li>
        </ul>
    </nav>

    <main>
        <section id="home" class="hero">
            <video autoplay muted loop playsinline>
                <source src="img/Video.mp4" type="video/mp4">
                Browser Anda tidak mendukung pemutar video.
            </video>
            <h1>Selamatkan Makanan, Hemat Uang</h1>
        </section>

        <section id="restaurants">
            <h2>Restoran Mitra</h2>
            <div class="restaurant-list" id="restaurantList">
                <!-- Restaurant cards will be dynamically added here -->
            </div>
        </section>

        <section id="news" class="news-section">
            <h2>Berita Terbaru</h2>
            <div class="slider-container">
                <div class="slider">
                    <div class="slide">
                        <img src="img/BERITA 1.jpg" alt="Food Waste News 1">
                        <div class="slide-content">
                            <h3>Sampah Makanan di Indonesia Jadi Permasalahan Serius</h3>
                            <a href="https://www.kompas.com/food/read/2021/10/27/133600175/sampah-makanan-di-indonesia-jadi-permasalahan-serius-" class="visit-btn">Baca Selengkapnya</a>
                        </div>
                    </div>
                    <div class="slide">
                        <img src="img/Berita 2.jpg" alt="Food Waste News 2">
                        <div class="slide-content">
                            <h3>Hampir 50 Persen Sampah di Jawa Barat dan Jawa Tengah Berasal dari Makanan</h3>
                            <a href="https://money.kompas.com/read/2021/10/12/134814026/hampir-50-persen-sampah-di-jawa-barat-dan-jawa-tengah-berasal-dari-makanan" class="visit-btn">Baca Selengkapnya</a>
                        </div>
                    </div>
                    <div class="slide">
                        <img src="img/BErita3..jpg" alt="Food Waste News 3">
                        <div class="slide-content">
                            <h3>Jatah Makanan 6,1 Juta Orang Dibuang-buang di RI</h3>
                            <a href="https://www.cnbcindonesia.com/news/20230621133615-4-447957/jatah-makanan-61-juta-orang-dibuang-buang-di-ri" class="visit-btn">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about">
            <h2>Tentang Kami</h2>
            <div class="about-content">
                <div class="about-text">
                    <p>Save Bite adalah platform yang kami buat untuk mengurangi pemborosan makanan dengan menghubungkan restoran yang memiliki makanan berlebih dengan konsumen yang mencari makanan berkualitas dengan harga terjangkau.</p>
                    <p>Kami berkomitmen untuk menciptakan solusi berkelanjutan dalam industri makanan dan membantu mengurangi dampak lingkungan dari pemborosan makanan.</p>
                </div>
                <div class="about-image">
                    <img src="img/LOGO PERUSAHAAN.jpeg" alt="Food Waste Reduction">
                </div>
            </div>
        </section>

        <section id="contact" style="text-align: center">
            <h2 style="color: #107873;">Hubungi Kami</h2>
            <p>Jika ada kendala atau ingin berkolaborasi, silakan hubungi kami di: <a
                    href="tel:085236716005">085236716005</a></p>
        </section>

    </main>

    <footer>
        <p>&copy; 2024 Food Waste Reduction Marketplace. Hak Cipta Dilindungi.</p>
    </footer>

    <div id="orderModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Pesan Makanan</h2>
            <p id="modalRestaurantName"></p>
            <form id="orderForm">
                <h3>Pilih Makanan:</h3>
                <ul id="foodList">
                    <!-- Food items will be dynamically added here -->
                </ul>
                <label for="name">Nama:</label><br>
                <input type="text" id="name" name="name" required><br>
                <label for="phone">Nomor Telepon:</label><br>
                <input type="tel" id="phone" name="phone" required><br>
                <label for="address">Alamat Pengiriman:</label><br>
                <textarea id="address" name="address" required></textarea><br>
                <p>Ongkos Kirim: Rp 10.000</p>
                <label for="payment">Metode Pembayaran:</label><br>
                <select id="payment" name="payment" required>
                    <option value="QRIS">QRIS</option>
                    <option value="COD">COD (Bayar di Tempat)</option>
                </select><br><br>
                <button type="submit">Pesan Sekarang</button>
            </form>
        </div>
    </div>

    <div id="receiptModal" class="modal">
        <div id="receipt">
            <h2>Struk Pesanan</h2>
            <div id="receiptContent"></div>
            <button onclick="closeReceiptModal()">Tutup</button>
            <button onclick="sendToWhatsApp()">Kirim ke WhatsApp</button>
        </div>
    </div>

    <script>
        // Updated restaurant data with food waste items
        const restaurants = [
            {
                id: 1,
                name: "KFC",
                description: "Ayam goreng dan makanan cepat saji",
                image: "img/kfc_PNG24.png",
                foodWaste: [
                    { id: 1, name: "Sisa Ayam Goreng", price: 15000 },
                    { id: 2, name: "Sisa Kentang Goreng", price: 10000 },
                    { id: 3, name: "Sisa Nasi Putih", price: 5000 }
                ]
            },
            {
                id: 2,
                name: "Gacoan",
                description: "Mie pedas dan camilan",
                image: "img/GACOAN (2).png",
                foodWaste: [
                    { id: 4, name: "Sisa Mie", price: 12000 },
                    { id: 5, name: "Sisa Pangsit Goreng", price: 8000 },
                    { id: 6, name: "Sisa Dimsum", price: 10000 }
                ]
            },
            {
                id: 3,
                name: "Roti Boy",
                description: "Toko Roti Favorit",
                image: "img/Roti BOY.jpg",
                foodWaste: [
                    { id: 7, name: "Roti Coklat", price: 7000 },
                    { id: 8, name: "Roti Keju", price: 7000 },
                    { id: 9, name: "Donat Gula", price: 5000 }
                ]
            },
            {
                id: 4,
                name: "McDonald's",
                description: "Burger dan makanan cepat saji",
                image: "img/MCD.jpg",
                foodWaste: [
                    { id: 10, name: "Sisa Burger", price: 20000 },
                    { id: 11, name: "Chicken Nugget", price: 15000 },
                    { id: 12, name: "Es Krim Sundae", price: 8000 }
                ]
            },
        ];

        // Function to create restaurant cards
        function createRestaurantCards() {
            const restaurantList = document.getElementById('restaurantList');
            restaurants.forEach(restaurant => {
                const card = document.createElement('div');
                card.className = 'restaurant-card';
                card.innerHTML = `
                    <img src="${restaurant.image}" alt="${restaurant.name}">
                    <h3>${restaurant.name}</h3>
                    <p>${restaurant.description}</p>
                    <button onclick="openOrderModal(${restaurant.id})">Lihat Menu & Pesan</button>
                `;
                restaurantList.appendChild(card);
            });
        }

        // Call the function to create restaurant cards
        createRestaurantCards();

        // Modal functionality
        const orderModal = document.getElementById("orderModal");
        const receiptModal = document.getElementById("receiptModal");
        const span = document.getElementsByClassName("close")[0];

        function openOrderModal(restaurantId) {
            const restaurant = restaurants.find(r => r.id === restaurantId);
            document.getElementById("modalRestaurantName").textContent = `Restoran: ${restaurant.name}`;

            // Populate food waste list
            const foodList = document.getElementById("foodList");
            foodList.innerHTML = '';
            restaurant.foodWaste.forEach(item => {
                const li = document.createElement('li');
                li.innerHTML = `
                    <input type="number" id="qty-${item.id}" name="qty-${item.id}" value="0" min="0">
                    <label for="qty-${item.id}">${item.name} - Rp ${item.price}</label>
                `;
                foodList.appendChild(li);
            });

            orderModal.style.display = "block";
        }

        span.onclick = function () {
            orderModal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == orderModal) {
                orderModal.style.display = "none";
            }
        }

        // Toggle QRIS Image
        function toggleQRISImage() {
            const paymentMethod = document.getElementById("payment").value;
            const qrisImage = document.getElementById("qrisImage");
            qrisImage.style.display = paymentMethod === "QRIS" ? "block" : "none";
        }

        // Form submission
        document.getElementById("orderForm").onsubmit = function (e) {
            e.preventDefault();
            const selectedFoods = Array.from(this.querySelectorAll('input[type="number"]'))
                .filter(input => parseInt(input.value) > 0)
                .map(input => ({
                    id: parseInt(input.id.split('-')[1]),
                    quantity: parseInt(input.value)
                }));

            if (selectedFoods.length === 0) {
                alert("Silakan pilih setidaknya satu item makanan.");
                return;
            }

            const name = document.getElementById("name").value;
            const phone = document.getElementById("phone").value;
            const address = document.getElementById("address").value;
            const paymentMethod = document.getElementById("payment").value;

            const currentDate = new Date().toLocaleString('id-ID', {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });

            // Function to handle "Kunjungi Kami" button clicks
            function handleVisitClick(event) {
                event.preventDefault();
                // Replace this URL with the actual news article URL
                window.location.href = "https://example.com/food-waste-news";
            }

            // Add click event listeners to all "Kunjungi Kami" buttons
            document.querySelectorAll('.visit-btn').forEach(button => {
                button.addEventListener('click', handleVisitClick);
            });


            // Calculate total
            let total = 10000; // Ongkir
            let receiptContent = `
                <p><strong>Nama:</strong> ${name}</p>
                <p><strong>Tanggal Pesanan:</strong> ${currentDate}</p>
                <p><strong>Nomor Telepon:</strong> ${phone}</p>
                <p><strong>Alamat:</strong> ${address}</p>
                <h3>Pesanan:</h3>
                <ul>
            `;

            selectedFoods.forEach(item => {
                const food = restaurants.flatMap(r => r.foodWaste).find(f => f.id === item.id);
                const itemTotal = food.price * item.quantity;
                total += itemTotal;
                receiptContent += `<li>${food.name} x${item.quantity}: Rp ${itemTotal}</li>`;
            });

            //untuk berita
            function startNewsSlider() {
            const slider = document.querySelector('.slider');
            const slides = document.querySelectorAll('.slide');
            let currentIndex = 0;

            startNewsSlider();

            setInterval(() => {
                currentIndex = (currentIndex + 1) % slides.length;
                slider.style.transform = `translateX(-${currentIndex * 100}%)`;
            }, 5000); // Change slide every 5 seconds
        }

            receiptContent += `
                </ul>
                <p><strong>Ongkos Kirim:</strong> Rp 10.000</p>
                <p><strong>Metode Pembayaran:</strong> ${paymentMethod}</p>
                ${paymentMethod === "QRIS" ? '<img src="img/QRCODEEE.jpeg" class="qr-code-image" alt="QR Code">' : ''}
                <h3>Total: Rp ${total}</h3>
            `;

            document.getElementById("receiptContent").innerHTML = receiptContent;
            orderModal.style.display = "none";
            receiptModal.style.display = "block";
            this.reset();
        }

        function closeReceiptModal() {
            receiptModal.style.display = "none";
        }

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Function to send receipt to WhatsApp
        function sendToWhatsApp() {
            const receiptContent = document.getElementById("receiptContent").innerText;
            const encodedMessage = encodeURIComponent(receiptContent);
            const whatsappURL = `https://wa.wizard.id/69bc3e?text=${encodedMessage}`;
            window.open(whatsappURL, '_blank');
        }
    </script>
</body>

</html>