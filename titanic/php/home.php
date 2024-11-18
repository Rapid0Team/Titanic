<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoLocate Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
</head>

<body class="bg-white-300">

 <?php
    include "nav.php"
 ?>

    <div id="carousel" class="splide mt-24">
        <div class="splide__track">
            <ul class="splide__list gap-3">
                <li class="splide__slide"><img src="../image/dacia.jpg" alt="Slide 1"></li>
                <li class="splide__slide"><img src="../image/fiat.jpg" alt="Slide 2"></li>
                <li class="splide__slide"><img src="../image/BMW-logo-meaning.webp" alt="Slide 3"></li>
                <li class="splide__slide"><img src="../image/Mercedes-Benz-Logo.png" alt="Slide 2"></li>
                <li class="splide__slide"><img src="../image/peugeot.jfif" alt="Slide 3"></li>
                <li class="splide__slide"><img src="../image/renault.jpg" alt="Slide 3"></li>
            </ul>
        </div>
    </div>


    <section id="help" class="about-us grid place-items-center  justify-center mb-16 mt-16 w-full">
        <!-- <div class="flex flex-col mt-4 w-4/12"> -->
        <h1 class="text-4xl font-bold text-lime-600">Titanc Auto</h1>
        <!-- <img src="logo.jpg" class=" my-4 w-12/12 m-20 rounded-full" alt=""> -->
        <!-- </div> -->
        <p class="mt-10 w-6/12 text-2xl ">
            <span class="text-green-600 text-3xl autolocate">Titanic Auto</span> makes car shopping simple and
            efficient. We connect you with a wide selection of vehicles, offering advanced search tools and personalized
            recommendations. <br />
            Our mission is to provide a seamless, transparent, and reliable experience for every buyer. Trust AutoLocate
            PRO to help you find your perfect car, hassle-free.


        </p>

    </section>
    <section id="Contact" class=" bg-gray-100 py-12">
        <div class="max-w-4xl form mx-auto p-6 bg-white shadow-lg rounded-lg">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Contact Us</h2>
            <form action="https://api.web3forms.com/submit" method="POST" class="form rounded-xl space-y-4">
            <input type="hidden" name="access_key" value="e808e3db-c373-4ca1-8e4a-e135713ae0ae">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-black  font-semibold mb-1">Full Name</label>
                        <input type="text" id="name" name="name" required placeholder="nom et prenom"
                            class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-lime-500">
                    </div>
                    <div>
                        <label for="email" class="block text-black font-semibold mb-1">Email Address</label>
                        <input type="email" id="email" name="email" required placeholder="adresse email"
                            class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-lime-500">
                    </div>
                </div>
                <div>
                    <label for="subject" class="block text-black  font-semibold mb-1">Subject</label>
                    <input type="text" id="subject" name="subject" required placeholder="sujet"
                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-lime-500">
                </div>
                <div>
                    <label for="message" class="block text-black font-semibold mb-1">Message</label>
                    <textarea id="message" name="message" rows="4" required placeholder="entrer votre message ici"
                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-lime-500"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit"
                        class="bg-white text-gray-400 font-semibold py-2 px-6 btn rounded-md mb-4 hover:text-green-500 focus:outline-none">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </section>

<div class="footer text-white p-3 bg-black mt-10">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row md:justify-between items-center gap-4 md:gap-10 text-center md:text-left">
            <h4 class="text-sm md:text-base">AutoLocate PRO | All Rights Reserved</h4>
            <h5 class="text-sm md:text-base">
                Contact Us: <a class="text-blue-400" href="mailto:info@autolocatepro.com">info@titanicAuto.com</a>
            </h5>
            <h5 class="text-sm md:text-base">Terms of Service | Privacy Policy</h5>
            <h5 class="text-sm md:text-base">Copyright 2024 &copy;</h5>
        </div>
    </div>
</div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Splide('#carousel', {
                type: 'loop', // or 'slide'
                perPage: 3,   // Number of slides visible
                autoplay: true, // Auto-play slides
                interval: 3000, // Time between slides (in ms)
            }).mount();
        });
    </script>
</body>

</html>