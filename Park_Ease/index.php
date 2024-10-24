<?php include_once 'header.php'; ?>
    <main>
        <section class="hero">
            <h2>Simplify Your Parking Experience</h2>
        </section>
        <section class="features">
            <div class="feature">
                <h3>Real-time Availability</h3>
                <p>Check available parking spaces in real-time and make informed decisions.</p>
            </div>
            <div class="feature">
                <h3>Easy Reservations</h3>
                <p>Reserve your parking spot in advance to ensure hassle-free parking.</p>
            </div>
            <div class="feature">
                <h3>Flexible Pricing</h3>
                <p>Choose from various pricing options to suit your parking needs.</p>
            </div>
        </section>
        <section class="cta">
            <h3>Start Managing Your Parking Today</h3>
            <a href="#" class="btn">Sign Up Now</a>
        </section>
    </main>
<?php include_once 'footer.php'; ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('ParkEase Parking Management System loaded');

            // Mobile menu toggle
            const menuIcon = document.getElementById('menuIcon');
            const navMenu = document.getElementById('navMenu');

            menuIcon.addEventListener('click', function() {
                navMenu.classList.toggle('show');
            });

            // Close menu when a link is clicked
            const navLinks = navMenu.getElementsByTagName('a');
            for (let i = 0; i < navLinks.length; i++) {
                navLinks[i].addEventListener('click', function() {
                    navMenu.classList.remove('show');
                });
            }
        });
    </script>
</body>
</html>
