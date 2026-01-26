<!-- resources/views/partials/footer.blade.php -->

<!-- FOOTER -->
<footer class="text-white py-8 px-6 flex flex-col md:flex-row justify-between items-start gap-8"
        style="background: #c3b3b3;">
    
    <!-- Left section -->
    <div class="footer-left">
        <h2 class="text-2xl font-bold mb-4">LuxeArts</h2>
        <div class="socials flex gap-4 text-xl">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
    </div>

    <!-- Center section -->
    <div class="footer-center">
        <h3 class="text-xl font-semibold mb-2">Contact us</h3>
        <p class="text-white">
            0778899098<br>
            27A Peradeniya Road, Kandy<br>
            LuxeArts@gmail.com
        </p>
    </div>

    <!-- Right section -->
    <div class="footer-right">
        <h3 class="text-xl font-semibold mb-2">More About Us</h3>
        <p class="text-white">
            <a href="{{ url('/about') }}" class="hover:underline">About Us</a><br>
            <a href="{{ url('/contact') }}" class="hover:underline">Contact Us</a>
        </p>
    </div>
</footer>

</body>
</html>
