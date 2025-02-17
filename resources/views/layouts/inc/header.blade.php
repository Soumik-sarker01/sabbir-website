<header>
    <nav>
        <div class="container-fluid nav-wrapper">
            <div class="logo"><a href="/"></a></div>
            <div class="large-menu">
                <ul>
                    <li><a href="/" class="nav-link active">Home</a></li>
                    <li><a href="/#pricing" class="nav-link">Pricing</a></li>
                    <li><a href="/#portfolio" class="nav-link">Portfolio</a></li>
                    <li><a href="/#about" class="nav-link">About us</a></li>
                </ul>
            </div>
            <div class="nav-action">
            <a href="#portfolio">
                            <button class="custom-button-nav-portfolio">SHOW PORTFOLIO</button>
                        </a>
            </div>
            <div id="burger-icon"><i class="fa-solid fa-bars"></i></div>
        </div>
    </nav>
</header>

<div class="nav-phone">
    <div class="container-lg nav-phone-wrapper">
        <div class="phone-menu">
            <ul>
                <li><a href="/" class="phone-link nav-link active">Home</a></li>
                <li><a href="/#pricing" class="phone-link nav-link">Pricing</a></li>
                <li><a href="/#portfolio" class="phone-link nav-link">Portfolio</a></li>
                <li><a href="/#about" class="phone-link nav-link">About us</a></li>
            </ul>
            <div class="nav-action">
                <a href="https://www.fiverr.com/sabbir_tareq" target="_blank" class="phone-link">
                    <div class="custom-button-nav-portfolio">Show Portfolio</div>
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


</script>