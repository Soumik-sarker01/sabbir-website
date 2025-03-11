<style>
    /* Scroll Progress Bar on Navbar */
    #nav-progress {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 4px;
        /* Adjust thickness if needed */
        background: linear-gradient(90deg, #80db66, #3d8b3d);
        width: 0%;
        transition: width 0.1s ease-out;
    }

</style>

<header>
    <nav>
        <div class="container-fluid nav-wrapper">
            <div class="logo"><a href="/"></a></div>
            <div class="large-menu">
                <ul>
                    <li><a href="/" class="nav-link active">Home</a></li>
                    <li><a href="<?php echo rtrim(config('app.url'), '/') . '/projects'; ?>"
                            class="nav-link">Portfolio</a></li>
                    <li><a href="/#about" class="nav-link">About Me</a></li>
                </ul>
            </div>

            <div class="nav-action">
                <!-- Fiverr Profile Button in Navbar (Initially Hidden) -->
                <a href="https://wa.me/+8801303934047" target="_blank" id="nav-fiverr">
                    <button class="custom-button-nav-hero">Start a Project</button>
                </a>
            </div>
            <div id="burger-icon"><i class="fa-solid fa-bars"></i></div>
        </div>
        <!-- Scroll Progress Bar -->
        <div id="nav-progress"></div>
    </nav>
</header>


<div class="nav-phone">
    <div class="container-lg nav-phone-wrapper">
        <div class="phone-menu">
            <ul>
                <li><a href="/" class="phone-link nav-link active">Home</a></li>
                <li><a href="/#portfolio" class="phone-link nav-link">Portfolio</a></li>
                <li><a href="/#about" class="phone-link nav-link">About us</a></li>
            </ul>
            <div class="nav-action">
                <!-- Fiverr Profile Button in Navbar -->
                <a href="https://www.fiverr.com/sabbir_tareq" target="_blank" id="nav-fiverr">
                    <button class="custom-button-fiverr">FIVERR PROFILE</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const burgerIcon = document.getElementById('burger-icon');
        const navPhone = document.querySelector('.nav-phone');
        const icon = burgerIcon.querySelector('i');
        const links = document.querySelectorAll('.nav-link');

        // Toggle menu visibility
        burgerIcon.addEventListener('click', () => {
            navPhone.classList.toggle('active');
            document.body.classList.toggle('menu-open'); // <-- Add this line
            icon.classList.toggle('fa-bars');
            icon.classList.toggle('fa-times');
        });

        // Close the menu on link click and handle active state
        links.forEach(link => {
            link.addEventListener('click', () => {
                // Remove the active class from all links
                links.forEach(link => link.classList.remove('active'));

                // Add the active class to the clicked link
                link.classList.add('active');

                // Close the mobile menu
                navPhone.classList.remove('active');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            });
        });

        // Set the active class for the current page on load
        const currentHash = window.location.hash;
        if (currentHash) {
            const activeLink = document.querySelector(`.nav-link[href='${currentHash}']`);
            if (activeLink) {
                links.forEach(link => link.classList.remove('active'));
                activeLink.classList.add('active');
            }
        }
    });
    document.addEventListener("DOMContentLoaded", function () {
        const header = document.querySelector("header");
        const navLinks = document.querySelectorAll(".nav-link");

        function updateNavbarStyle() {
            if (window.scrollY > 100) {
                header.classList.add("scrolled");
            } else {
                header.classList.remove("scrolled");
            }
        }

        // Listen for scroll events
        window.addEventListener("scroll", updateNavbarStyle);

        // Initial check in case the page loads in a scrolled position
        updateNavbarStyle();
    });


    document.addEventListener("DOMContentLoaded", function () {
        const heroSection = document.querySelector(".hero");
        const heroFiverr = document.getElementById("hero-fiverr");
        const navFiverr = document.getElementById("nav-fiverr");

        function updateNavbar() {
            const heroRect = heroSection.getBoundingClientRect();
            const viewportHeight = window.innerHeight;
            // Determine if any part of the hero section is visible:
            if (heroRect.bottom > 0) {
                // Hero is visible – show the Fiverr button in the hero section
                heroFiverr.style.display = "inline-block";
                heroFiverr.style.opacity = "1";
                heroFiverr.style.transform = "translateY(0)";
            } else {
                // Hero is completely out of view – hide the hero button
                heroFiverr.style.display = "none";
            }

            // For the navbar's Fiverr button, we want it to start fading in when the hero's bottom is less than a threshold.
            const fadeThreshold = viewportHeight * 0.2; // 20% of viewport height
            if (heroRect.bottom > fadeThreshold) {
                // Hero is still mostly visible – hide the navbar button
                navFiverr.style.opacity = "0";
                navFiverr.style.pointerEvents = "none";
            } else {
                // Calculate fade progress: when heroRect.bottom reaches 0, opacity becomes 1.
                let fadeProgress = 1 - (heroRect.bottom / fadeThreshold);
                navFiverr.style.opacity = fadeProgress.toString();
                navFiverr.style.pointerEvents = "auto";
            }
        }

        window.addEventListener("scroll", updateNavbar);
        updateNavbar(); // Initial check on page load
    });

    // Add the scroll progress effect
    window.addEventListener('scroll', function () {
        const scrollTop = window.scrollY;
        // Calculate the total scrollable height of the document
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        // Calculate the scroll percentage (0% at top, 100% at bottom)
        const scrollPercent = (scrollTop / docHeight) * 100;
        // Update the width of the progress bar accordingly
        document.getElementById('nav-progress').style.width = scrollPercent + '%';
    });


</script>
