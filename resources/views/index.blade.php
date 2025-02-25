@extends('layouts.master')

@section('title', 'Aynaur')

@section('main-container')

@import url('https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap');
<!-- Include Swiper's CSS (ideally in your <head>) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>


<style>
    h1 {
        font-size: 2rem;
        color: #25262f;
        /* Default color */
        transition: color 0.3s ease, text-shadow 0.3s ease;
    }

    /* If wrapper has background #e2ecf6, keep h1 color dark */
    .wrapper.has-bg h1 {
        color: #25262f;
    }

    /* If body is dark but wrapper has no background, set h1 to light on hover */
    body.has-dark-bg h1:hover {
        color: #e2ecf6;
    }

    /* Apply shadow effect on hover */
    h1:hover {
        text-shadow: 2px 2px 8px #80db66;
        /* Always add green glow effect */
    }

    h2 {
  transition: transform 0.3s ease-in-out;
}

h2:hover {
  transform: scale(1.1);
}



    .company-logo-title {
        font-size: 38px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 3rem;
        color: #e2ecf6;
    }

    /* Styling for the logo section */
    .company-logos {
        overflow: hidden;
        position: relative;
        padding: 20px 0;
    }

    .logos-wrapper {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    /* Hidden class for the initial state */
    .hidden {
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 1s ease-out, transform 1s ease-out;
    }

    /* Visible class (Triggered when in viewport) */
    .visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* Reverse effect when leaving the screen */
    .reverse {
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 1s ease-out, transform 1s ease-out;
    }

    /* Logo Row Styling */
    .logos-row {
        display: flex;
        overflow: hidden;
        width: 100%;
        position: relative;
        padding: 15px 0;
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }

    /* Track for smooth infinite scrolling */
    .logos-track {
        display: flex;
        width: max-content;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
    }

    /* Right to Left Scrolling */
    .right-to-left .logos-track {
        animation-name: scroll-right-left;
        animation-duration: 15s;
    }

    @keyframes scroll-right-left {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-50%);
        }
    }

    /* Left to Right Scrolling */
    .left-to-right .logos-track {
        animation-name: scroll-left-right;
        animation-duration: 15s;
    }

    @keyframes scroll-left-right {
        from {
            transform: translateX(-50%);
        }

        to {
            transform: translateX(0);
        }
    }

    /* Logo Styling */
    .logos-track img {
        width: 180px;
        /* Increased size */
        height: auto;
        margin: 0 30px;
    }


    /* When visible */
    .logos-row.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* When leaving - gradually fades away */
    .logos-row.fade-out {
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 1.5s ease-out, transform 1.5s ease-out;
    }

</style>

<div class="site-content">

    <div class="spacer"></div>

    <section class="hero">
        <div class="container-fluid">
            <div class="hero-wrapper">
                <!-- Left Side: Text Content -->
                <div class="hero-text">
                    <div class="profile">
                        <h4>Hello I'm</h4>
                        <h1>Sabbir <br> Tareq</h1>
                    </div>
                    <div class="social-media-container">
                        <span class="social-media-text">A Passionate Social Media</span>
                        <div class="typing-container">
                            <span class="typing-text"></span>
                            <span class="cursor">_</span>
                        </div>
                    </div>
                    <div class="spacer"></div>

                    <div class="hero-buttons">
                        <!-- Get Started button (Left Side) -->
                        <a href="https://wa.me/+8801303934047" id="hero-started">
                            <button class="custom-button-hero">Hire Me</button>
                        </a>

                        <!-- Fiverr Profile button (Right Side) -->
                        <a href="https://www.fiverr.com/sabbir_tareq" target="_blank" id="hero-fiverr">
                            <button class="custom-button-hero">FIVERR PROFILE</button>
                        </a>
                    </div>


                </div>

                <!-- Hero Image -->
                <div class="hero-image-container">
                    <img src="{{ asset('assets/img/1.svg') }}" alt="Abstract" class="abstract-image-1">
                    <img src="{{ asset('assets/img/2.svg') }}" alt="Abstract" class="abstract-image-2">
                    <img src="{{ asset('assets/img/3.svg') }}" alt="Abstract" class="abstract-image-3">
                    <div class="circle-background"></div> <!-- Enlarged Circle -->
                    <img src="{{ asset('assets/img/profile.png') }}" alt="Sabbir Tareq" class="hero-image">
                </div>
            </div>
        </div>

        <!-- Social Media Icons Fixed on Right Side -->
        <div class="social-icons-fixed">
            <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
        </div>
    </section>


    <section class="infograph">
        <div class="container-fluid">
            <div class="infograph-wrapper">

                <div class="container-lg">
                    <div>
                        <div class="orders">
                            <div class="order-number">
                                <h2>250+</h2>
                                <p>Orders Completed</p>
                            </div>
                            <div class="order-types">
                                <div class="sliding-badges">
                                    <div class="order-badge">Custom Templates</div>
                                    <div class="order-badge">Social Management</div>
                                    <div class="order-badge">Content Creation</div>
                                    <div class="order-badge">Brand Identity</div>
                                    <div class="order-badge">Audience Engagement</div>
                                    <div class="order-badge">Visual Design</div>
                                    <div class="order-badge">Platform Strategy</div>
                                    <div class="order-badge">Analytics</div>
                                    <div class="order-badge">Organic Growth</div>
                                    <div class="order-badge">Multi-Platform</div>

                                    <!-- Duplicate the badges for the endless loop effect -->
                                    <div class="order-badge">Custom Templates</div>
                                    <div class="order-badge">Social Management</div>
                                    <div class="order-badge">Content Creation</div>
                                    <div class="order-badge">Brand Identity</div>
                                    <div class="order-badge">Audience Engagement</div>
                                    <div class="order-badge">Visual Design</div>
                                    <div class="order-badge">Platform Strategy</div>
                                    <div class="order-badge">Analytics</div>
                                    <div class="order-badge">Organic Growth</div>
                                    <div class="order-badge">Multi-Platform</div>
                                </div>
                            </div>

                        </div>
                        <div class="reviews" onclick="location.href='#testimonial';" style="cursor: pointer;">
                            <div class="reviews-top">
                                <img src="{{asset('assets/img/fiver.svg')}}" alt="fiver">
                                <img src="{{asset('assets/img/stars.svg')}}" alt="stars">
                            </div>
                            <div class="review-number">
                                <h2>120+</h2>
                                <p>Reviews</p>
                            </div>
                            <div class="review-img">
                                <img src="{{asset('assets/img/review-1.jpg')}}" alt="client">
                                <img style="margin-left: -10px;" src="{{asset('assets/img/review-2.jpg')}}"
                                    alt="client">
                                <img style="margin-left: -10px;" src="{{asset('assets/img/review-3.jpg')}}"
                                    alt="client">
                                <img style="margin-left: -10px;" src="{{asset('assets/img/review-4.jpg')}}"
                                    alt="client">
                                <img style="margin-left: -10px;" src="{{asset('assets/img/review-5.jpg')}}"
                                    alt="client">
                                <img style="margin-left: -10px;" src="{{asset('assets/img/review-6.jpg')}}"
                                    alt="client">
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="clients">
                            <div class="clients-number">
                                <h2>300+</h2>
                                <p>Clients</p>
                            </div>
                            <!-- New wrapper for scrolling -->
                            <div class="clients-scroll-container">
                                <div class="clients-img">
                                    <img src="{{ asset('assets/img/logos-black/1.png') }}" alt="Company 1">
                                    <img src="{{ asset('assets/img/logos-black/2.png') }}" alt="Company 2">
                                    <img src="{{ asset('assets/img/logos-black/3.png') }}" alt="Company 3">
                                    <img src="{{ asset('assets/img/logos-black/4.png') }}" alt="Company 4">
                                    <img src="{{ asset('assets/img/logos-black/5.png') }}" alt="Company 5">
                                    <img src="{{ asset('assets/img/logos-black/6.png') }}" alt="Company 6">
                                    <img src="{{ asset('assets/img/logos-black/7.png') }}" alt="Company 7">
                                    <img src="{{ asset('assets/img/logos-black/8.png') }}" alt="Company 8">
                                    <img src="{{ asset('assets/img/logos-black/9.png') }}" alt="Company 9">
                                    <img src="{{ asset('assets/img/logos-black/10.png') }}" alt="Company 10">
                                    <img src="{{ asset('assets/img/logos-black/11.png') }}" alt="Company 11">
                                    <img src="{{ asset('assets/img/logos-black/12.png') }}" alt="Company 12">
                                    <img src="{{ asset('assets/img/logos-black/13.png') }}" alt="Company 13">
                                    <img src="{{ asset('assets/img/logos-black/14.png') }}" alt="Company 14">
                                    <img src="{{ asset('assets/img/logos-black/15.png') }}" alt="Company 15">
                                    <img src="{{ asset('assets/img/logos-black/16.png') }}" alt="Company 16">
                                    <img src="{{ asset('assets/img/logos-black/17.png') }}" alt="Company 17">
                                    <img src="{{ asset('assets/img/logos-black/18.png') }}" alt="Company 18">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    {{-- Company Logos Section --}}
    <section id="company-logos" class="company-logos my-5">
        <div class="container">
            <h1 class="company-logo-title">My Clients</h1>

            <div class="logos-wrapper">
                {{-- Row 1 (Right to Left) --}}
                <div class="logos-row right-to-left hidden">
                    <div class="logos-track">
                        @for($i = 0; $i < 2; $i++) <img src="{{ asset('assets/img/logos/1.png') }}" alt="Company 1">
                            <img src="{{ asset('assets/img/logos/2.png') }}" alt="Company 2">
                            <img src="{{ asset('assets/img/logos/3.png') }}" alt="Company 3">
                            <img src="{{ asset('assets/img/logos/4.png') }}" alt="Company 4">
                            <img src="{{ asset('assets/img/logos/5.png') }}" alt="Company 5">
                            <img src="{{ asset('assets/img/logos/6.png') }}" alt="Company 6">
                            <img src="{{ asset('assets/img/logos/7.png') }}" alt="Company 7">
                            <img src="{{ asset('assets/img/logos/8.png') }}" alt="Company 8">
                            <img src="{{ asset('assets/img/logos/9.png') }}" alt="Company 9">
                            <img src="{{ asset('assets/img/logos/10.png') }}" alt="Company 10">
                            <img src="{{ asset('assets/img/logos/11.png') }}" alt="Company 11">
                            <img src="{{ asset('assets/img/logos/12.png') }}" alt="Company 12">
                            <img src="{{ asset('assets/img/logos/13.png') }}" alt="Company 13">
                            <img src="{{ asset('assets/img/logos/14.png') }}" alt="Company 14">
                            <img src="{{ asset('assets/img/logos/15.png') }}" alt="Company 15">
                            <img src="{{ asset('assets/img/logos/16.png') }}" alt="Company 16">
                            <img src="{{ asset('assets/img/logos/17.png') }}" alt="Company 17">
                            <img src="{{ asset('assets/img/logos/18.png') }}" alt="Company 18">
                            @endfor
                    </div>
                </div>

                {{-- Row 2 (Left to Right) --}}
                <div class="logos-row left-to-right hidden">
                    <div class="logos-track">
                        @for($i = 0; $i < 2; $i++) <img src="{{ asset('assets/img/logos/19.png') }}" alt="Company 19">
                            <img src="{{ asset('assets/img/logos/20.png') }}" alt="Company 20">
                            <img src="{{ asset('assets/img/logos/21.png') }}" alt="Company 21">
                            <img src="{{ asset('assets/img/logos/22.png') }}" alt="Company 22">
                            <img src="{{ asset('assets/img/logos/23.png') }}" alt="Company 23">
                            <img src="{{ asset('assets/img/logos/24.png') }}" alt="Company 24">
                            <img src="{{ asset('assets/img/logos/25.png') }}" alt="Company 25">
                            <img src="{{ asset('assets/img/logos/26.png') }}" alt="Company 26">
                            <img src="{{ asset('assets/img/logos/27.png') }}" alt="Company 27">
                            <img src="{{ asset('assets/img/logos/28.png') }}" alt="Company 28">
                            <img src="{{ asset('assets/img/logos/29.png') }}" alt="Company 29">
                            <img src="{{ asset('assets/img/logos/30.png') }}" alt="Company 30">
                            <img src="{{ asset('assets/img/logos/31.png') }}" alt="Company 31">
                            <img src="{{ asset('assets/img/logos/32.png') }}" alt="Company 32">
                            <img src="{{ asset('assets/img/logos/33.png') }}" alt="Company 33">
                            <img src="{{ asset('assets/img/logos/34.png') }}" alt="Company 34">
                            <img src="{{ asset('assets/img/logos/35.png') }}" alt="Company 35">
                            <img src="{{ asset('assets/img/logos/36.png') }}" alt="Company 36">
                            @endfor
                    </div>
                </div>

                {{-- Row 3 (Right to Left) --}}
                <div class="logos-row right-to-left hidden">
                    <div class="logos-track">
                        @for($i = 0; $i < 2; $i++) <img src="{{ asset('assets/img/logos/37.png') }}" alt="Company 37">
                            <img src="{{ asset('assets/img/logos/38.png') }}" alt="Company 38">
                            <img src="{{ asset('assets/img/logos/39.png') }}" alt="Company 39">
                            <img src="{{ asset('assets/img/logos/40.png') }}" alt="Company 40">
                            <img src="{{ asset('assets/img/logos/41.png') }}" alt="Company 41">
                            <img src="{{ asset('assets/img/logos/42.png') }}" alt="Company 42">
                            <img src="{{ asset('assets/img/logos/43.png') }}" alt="Company 43">
                            <img src="{{ asset('assets/img/logos/44.png') }}" alt="Company 44">
                            <img src="{{ asset('assets/img/logos/45.png') }}" alt="Company 45">
                            <img src="{{ asset('assets/img/logos/46.png') }}" alt="Company 46">
                            <img src="{{ asset('assets/img/logos/47.png') }}" alt="Company 47">
                            <img src="{{ asset('assets/img/logos/48.png') }}" alt="Company 48">
                            <img src="{{ asset('assets/img/logos/49.png') }}" alt="Company 49">
                            <img src="{{ asset('assets/img/logos/50.png') }}" alt="Company 50">
                            <img src="{{ asset('assets/img/logos/51.png') }}" alt="Company 51">
                            <img src="{{ asset('assets/img/logos/52.png') }}" alt="Company 52">
                            @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="projects container-fluid" id="portfolio">
        <div class="projects-wrapper">
            <div class="container-lg">
                <h1>My Creations</h1>
                <div class="spacer"></div>
                <!-- Scrollable Project List -->
                <div class="scroll-container">
                    <div class="project-list">
                        <div class="project-item category-health" data-modal-target="#exampleModal-1">
                            <img src="{{asset('assets/img/projects/16.png')}}" alt="project">
                            <div class="project-icons">
                                <div>
                                    <i class="fa-solid fa-heart"></i>
                                    <i class="fa-regular fa-comment"></i>
                                    <i class="fa-regular fa-paper-plane"></i>
                                </div>
                                <i class="fa-regular fa-bookmark"></i>
                            </div>
                        </div>


                        <!-- #2 -->
                        <div class="project-item category-beauty" data-modal-target="#exampleModal-2">
                            <img src="{{asset('assets/img/projects/Carousel SAP Concur V1 (3).png')}}" alt="project">
                            <div class="project-icons">
                                <div>
                                    <i class="fa-solid fa-heart"></i>
                                    <i class="fa-regular fa-comment"></i>
                                    <i class="fa-regular fa-paper-plane"></i>
                                </div>
                                <i class="fa-regular fa-bookmark"></i>
                            </div>
                        </div>

                        <!-- #3 -->
                        <div class="project-item category-medical" data-modal-target="#exampleModal-3">
                            <img src="{{asset('assets/img/projects/Individual Attendees (4).png')}}" alt="project">
                            <div class="project-icons">
                                <div>
                                    <i class="fa-solid fa-heart"></i>
                                    <i class="fa-regular fa-comment"></i>
                                    <i class="fa-regular fa-paper-plane"></i>
                                </div>
                                <i class="fa-regular fa-bookmark"></i>
                            </div>
                        </div>

                        <!-- #4 -->
                        <div class="project-item category-beauty" data-modal-target="#exampleModal-4">
                            <img src="{{asset('assets/img/projects/29.png')}}" alt="project">
                            <div class="project-icons">
                                <div>
                                    <i class="fa-solid fa-heart"></i>
                                    <i class="fa-regular fa-comment"></i>
                                    <i class="fa-regular fa-paper-plane"></i>
                                </div>
                                <i class="fa-regular fa-bookmark"></i>
                            </div>
                        </div>

                        <!-- #5 -->
                        <div class="project-item category-pets" data-modal-target="#exampleModal-5">
                            <img src="{{asset('assets/img/projects/Product Announcement.png')}}" alt="project">
                            <div class="project-icons">
                                <div>
                                    <i class="fa-solid fa-heart"></i>
                                    <i class="fa-regular fa-comment"></i>
                                    <i class="fa-regular fa-paper-plane"></i>
                                </div>
                                <i class="fa-regular fa-bookmark"></i>
                            </div>
                        </div>

                        <!-- #6 -->
                        <div class="project-item category-kids" data-modal-target="#exampleModal-6">
                            <img src="{{asset('assets/img/projects/Speaker 3 (3).png')}}" alt="project">
                            <div class="project-icons">
                                <div>
                                    <i class="fa-solid fa-heart"></i>
                                    <i class="fa-regular fa-comment"></i>
                                    <i class="fa-regular fa-paper-plane"></i>
                                </div>
                                <i class="fa-regular fa-bookmark"></i>
                            </div>
                        </div>
                    </div> <!-- End project-list -->
                </div>
                <!-- VIEW ALL BUTTON -->
                <a href="<?php echo rtrim(config('app.url'), '/') . '/projects'; ?>">
                    <button class="custom-button">
                        View All <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </a>
            </div>
        </div>
    </section>

    <section class="aim">
        <div class="container-lg">
            <h1 class="aim-title" style="color:#e2ecf6;">My Area of Expertise</h1>
            <div class="aim-wrapper">
                <div class="aim-item">
                    <h1>Social Media Post Design</h1>
                </div>

                <div class="aim-item">
                    <h1>Social Media Ads Design</h1>
                </div>

                <div class="aim-item">
                    <h1>Thumbnail Design</h1>
                </div>

                <div class="aim-item">
                    <h1>Ebook Design</h1>
                </div>

                <div class="aim-item">
                    <h1>Video Editing</h1>
                </div>

                <div class="aim-item">
                    <h1>Content Strategy</h1>
                </div>
                <div class="aim-item">
                    <h1>Drinking Tea</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="services-included container-lg">
    <h1 class="section-title">My Service Includes</h1>
    <div class="services-wrapper">
        <div class="service-item">
            <div class="service-icon"><i class="fa-solid fa-palette"></i></div>
            <h1>Social Media Post Design</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur sunt minus iusto possimus, nam nostrum ad, illum quasi sint omnis velit debitis mollitia excepturi quae at ipsa facilis. Dicta, autem?</p>
        </div>

        <div class="service-item">
            <div class="service-icon"><i class="fa-solid fa-bullhorn"></i></div>
            <h1>Social Media Ads Design</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore delectus perspiciatis excepturi cumque error nobis quo aliquam provident, laudantium, deleniti numquam sapiente quos maiores minima nulla voluptatum eius nemo eum.</p>
        </div>

        <div class="service-item">
            <div class="service-icon"><i class="fa-solid fa-film"></i></div>
            <h1>Video Editing</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur molestias nobis velit delectus hic et amet repellat atque repellendus, architecto cum quasi cupiditate nihil, deserunt beatae distinctio doloremque expedita placeat?</p>
        </div>
    </div>
</section>


    <section id="about">
        <div class="container-lg about-wrapper">
            <div class="about-img">
                <img src="{{asset('assets/img/about.png')}}" alt="about">
            </div>
            <div class="about-text">
                <h1>About Me</h1>
                <p>Meet Tareq, Entrepreneur, Graphic Designer, and Social Media Ad Creative Specialist. With over five
                    years of experience and a keen eye for design, Tareq has crafted thousands of high-converting ad
                    creatives that captivate and convert. A level 2 designer on Fiverr, he has helped countless brands
                    elevate their online presence with scroll-stopping visuals.
                    <br><br>From Facebook ads to Instagram posts and Canva templates, Tareq isn’t just designing—he’s
                    shaping the future of digital advertising. Whether you’re here to boost your brand, get inspired, or
                    collaborate on stunning creatives, you’re in the right place.</p>
                <br><br>
                <div>
                    <p><b>Ready to take your brand to the next level?</b></p> <br>
                    <div class="about-buttons">
                        <!-- Get Started button (Left Side) -->
                        <a href="https://wa.me/+8801303934047" target="_blank" id="hero-started">
                            <button class="custom-button-about">Hire Me</button>
                        </a>

                        <!-- Fiverr Profile button (Right Side) -->
                        <a href="https://www.fiverr.com/sabbir_tareq" target="_blank" id="hero-fiverr">
                            <button class="custom-button-about">FIVERR PROFILE</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section id="testimonial">
        <div class="container-lg testimonial-wrapper">
            <div class="testimonial-head">
                <h1 style="color: #e2ecf6;">
                    What My
                    <span class="fiverr">Fiverr</span>
                    Clients Say
                </h1>
            </div>


            <!-- Outer Wrapper for the Testimonial Slider -->
            <div class="testimonial-slider-wrapper">

                <!-- Add a container with the "swiper" class -->
                <div class="testimonial-swiper swiper">
                    <!-- The wrapper that holds all the slides -->
                    <div class="swiper-wrapper">

                        <!-- Slide #1 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h1 class="testimonial-name">quentincarteron</h1>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Not the first time I work with him and his incredible team. Although, this time
                                        it was a much bigger project. However nothing disapointed me, as usual. Let's
                                        highlight the importance that Tareq place in understanding its clients need and
                                        deliver something very accurate ! Thanks guys è
                                    </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>

                        <!-- Slide #2 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h1 class="testimonial-name">coachmegs</h1>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        I recently worked with Tareq on a project, and I couldn’t be happier with the
                                        results! The templates he created were not only visually fresh and on-brand but
                                        also incredibly versatile and easy to adjust for my needs. What I appreciated
                                        most was how he brought a new look and feel to the designs while still keeping
                                        everything cohesive. It’s clear that Tareq has a great eye for creativity and
                                        branding! I’m already planning to work with him again in the near future for
                                        another batch of templates to keep my content fresh and engaging. If you’re
                                        looking for someone who can deliver quality, flexibility, and professionalism, I
                                        highly recommend Tareq. I can’t wait to collaborate with him again!
                                    </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>

                        <!-- Slide #3 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h1 class="testimonial-name">robin21x</h1>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Tareq does exceptional work—he is truly amazing! His communication was
                                        professional, timely, and clear throughout the entire process, making
                                        collaboration seamless.( even though my bought with Pneumonia and then a short
                                        relapse it was Tareq that kept my project going! As a professional sales and
                                        marketing strategist, I am extremely particular about the quality of work. For
                                        me to trust someone with delivering a final product—especially my own personal
                                        project—they have to be exceptional. That person is Tareq. I highly recommend
                                        him for his professionalism, skill, and dedication! A+ ⭐️⭐️⭐️⭐️⭐️ Robin A.
                                        Barnette SoCal </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>

                        <!-- Slide #4 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h1 class="testimonial-name">king_lauren</h1>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Working with Tareq was a positive experience, but unfortunately, I cannot say
                                        the same about the quality of his work. The initial templates he delivered were
                                        identical to those already available on Canva, which I recognized as a frequent
                                        user of the platform. When I requested revisions, I was disappointed by the lack
                                        of attention to detail, particularly in areas like color selection, font
                                        consistency, and overall design refinement.
                                    </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #5 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h1 class="testimonial-name">ceochappell</h1>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Tareq did an AMAZING job with my social media design! The visuals were
                                        professional and detailed, and he was super polite and responsive throughout the
                                        process—everything went so smoothly 🙌. Definitely looking forward to working
                                        with him again!
                                    </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #6 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h1 class="testimonial-name">sade411team</h1>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        This was an awesome experience because I was not happy with the first draft and
                                        Tareq came back with revisions that completely embodied my vision. Would
                                        definitely use him again!
                                    </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #7 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h1 class="testimonial-name">axoweb</h1>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        I worked with Tareq and was thrilled with the results! His work was not only
                                        SUPER PROFESSIONAL and perfectly aligned with my brand, but he also delivered
                                        right on time. I definitely recommend Tareq to anyone seeking a reliable social
                                        media design expert! 👌
                                    </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #8 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h1 class="testimonial-name">ltn_up_electric</h1>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Tareq's work in Social Media Design is outstanding! The visuals were
                                        professionally crafted and perfectly aligned with our brand. Working with him
                                        was a breeze due to his language fluency and proactive communication. Highly
                                        recommend! 👍
                                    </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #9 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h1 class="testimonial-name">daphniealexis</h1>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Exceptional, no words thr work he did for my brand is fantastic, I'm coming back
                                        again. </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #10 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h1 class="testimonial-name">jvickers182988</h1>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Fantastic! Always finishes orders very timely and professionally. Highly
                                        recommend </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>

                    </div> <!-- End swiper-wrapper -->
                </div> <!-- End testimonial-swiper -->

                <!-- Navigation buttons -->
                <div class="projects-nav">
                    <div class="testimonial-swiper-button-prev"><i class="bi bi-arrow-left-short"></i></div>
                    <div class="testimonial-swiper-button-next"><i class="bi bi-arrow-right-short"></i></div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Include Google reCAPTCHA script -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Get all buttons and project items
        const allButton = document.getElementById('btn-all');
        const categoryButtons = document.querySelectorAll('.projects-btn button:not(#btn-all)');
        const projectItems = document.querySelectorAll('.project-item');

        // Function to show all projects
        function showAllProjects() {
            projectItems.forEach(item => item.style.display = 'block');
        }

        // Function to filter projects by category
        function filterProjects(category) {
            projectItems.forEach(item => {
                if (item.classList.contains(`category-${category}`) || category === 'all') {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        // Event listeners for buttons
        allButton.addEventListener('click', () => {
            showAllProjects();
            categoryButtons.forEach(btn => btn.classList.remove('active'));
            allButton.classList.add('active');
        });

        categoryButtons.forEach(button => {
            button.addEventListener('click', () => {
                const category = button.id.replace('btn-', '').replace('-', '_');
                filterProjects(category);
                allButton.classList.remove('active');
                categoryButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
            });
        });

        // Set default active button
        allButton.classList.add('active');
    });


    document.addEventListener('DOMContentLoaded', () => {
        // Initialize Swiper for the testimonial slider
        const testimonialSwiper = new Swiper('.testimonial-swiper', {
            // Enable continuous loop
            loop: true,

            // Navigation arrows
            navigation: {
                nextEl: '.testimonial-swiper-button-next',
                prevEl: '.testimonial-swiper-button-prev',
            },

            // Autoplay configuration
            autoplay: {
                delay: 3000, // 3 seconds per slide
                disableOnInteraction: false,
            },

            // Pause on hover
            on: {
                init() {
                    // If user hovers over the swiper container, pause autoplay
                    this.el.addEventListener('mouseenter', () => {
                        this.autoplay.stop();
                    });
                    // Resume autoplay when mouse leaves
                    this.el.addEventListener('mouseleave', () => {
                        this.autoplay.start();
                    });
                },
            },

            // How many slides to show at once
            slidesPerView: 1,
            spaceBetween: 20,

            // Responsive breakpoints (optional)
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 2,
                },
            },
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        const projectList = document.querySelector(".project-list");

        // Duplicate items for seamless looping
        projectList.innerHTML += projectList.innerHTML;

        let scrollSpeed = 1.5; // Adjust speed (lower = slower)
        let scrollPosition = 0;

        function autoScroll() {
            scrollPosition += scrollSpeed;
            projectList.style.transform = `translateX(-${scrollPosition}px)`;

            // When first half is out of view, reset position seamlessly
            if (scrollPosition >= projectList.scrollWidth / 2) {
                scrollPosition = 0;
                projectList.style.transform = `translateX(0px)`;
            }

            requestAnimationFrame(autoScroll);
        }

        autoScroll(); // Start scrolling animation
    });

    document.addEventListener("DOMContentLoaded", function () {
        // Function to animate the counting effect
        function animateCounter(element, target, duration) {
            let start = 0;
            let stepTime = Math.abs(Math.floor(duration / target));
            let counter = setInterval(() => {
                start++;
                element.textContent = start + "+";
                if (start >= target) {
                    clearInterval(counter);
                }
            }, stepTime);
        }

        // Get the number elements
        const orderNumber = document.querySelector(".order-number h2");
        const reviewNumber = document.querySelector(".review-number h2");
        const clientNumber = document.querySelector(".clients-number h2");

        // Flag to ensure the counters animate only once per scroll-into-view
        let isVisible = false;

        // Create an IntersectionObserver to watch the .infograph section
        let observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                // When the section becomes visible and wasn't visible before
                if (entry.isIntersecting && !isVisible) {
                    // Reset the counters before starting the animation
                    orderNumber.textContent = "0+";
                    reviewNumber.textContent = "0+";
                    clientNumber.textContent = "0+";

                    // Animate the numbers
                    animateCounter(orderNumber, 250, 1000); // Count to 200 in 1 second
                    animateCounter(reviewNumber, 120, 600); // Count to 100 in 0.6 seconds
                    animateCounter(clientNumber, 300, 700); // Count to 160 in 0.7 seconds

                    // Set flag to prevent re-animation while in view
                    isVisible = true;
                } else if (!entry.isIntersecting) {
                    // Reset the flag when the section leaves view so it can animate again
                    isVisible = false;
                }
            });
        }, {
            threshold: 0.5
        });

        // Start observing the section that contains the counters
        observer.observe(document.querySelector(".infograph"));
    });


    document.addEventListener("DOMContentLoaded", function () {

        function startAnimation(entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    heroText.classList.add("animate");
                    observer.unobserve(entry.target);
                }
            });
        }

        let observer = new IntersectionObserver(startAnimation, {
            threshold: 0.5
        });
        observer.observe(heroText);
    });

    document.addEventListener("DOMContentLoaded", function () {
        const heroText = document.querySelector(".hero-text");

        function checkVisibility(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    heroText.classList.add("animate");
                } else {
                    heroText.classList.remove("animate"); // Reset so it plays again
                }
            });
        }

        let observer = new IntersectionObserver(checkVisibility, {
            threshold: 0.5
        });
        observer.observe(heroText);
    });

    document.addEventListener("DOMContentLoaded", function () {
        const heroText = document.querySelector(".hero-text");

        // Parallax Effect on Mouse Move
        document.addEventListener("mousemove", (event) => {
            let x = (event.clientX / window.innerWidth) * 20 - 10;
            let y = (event.clientY / window.innerHeight) * 20 - 10;

        });

        // Start Text Animation on Scroll
        function checkVisibility(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    heroText.classList.add("animate");
                }
            });
        }

        let observer = new IntersectionObserver(checkVisibility, {
            threshold: 0.5
        });
        observer.observe(heroText);
    });


    document.addEventListener("DOMContentLoaded", function () {
        const aimItems = document.querySelectorAll(".aim-item");

        const aimObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("animate");
                    observer.unobserve(entry.target); // Stop observing after animation
                }
            });
        }, {
            threshold: 0.3, // Trigger animation when 30% of element is visible
            rootMargin: "0px 0px -10% 0px"
        });

        aimItems.forEach(item => aimObserver.observe(item));
    });



    document.addEventListener("DOMContentLoaded", function () {
        // Service Items Observer
        const serviceItems = document.querySelectorAll(".service-item");
        const serviceObserver = new IntersectionObserver((entries) => {

            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("animate");
                } else {
                    entry.target.classList.remove("animate");
                }
            });
        }, {
            threshold: 0.3,
            rootMargin: "0px 0px -10% 0px"
        });
        serviceItems.forEach(item => serviceObserver.observe(item));
    });

    document.addEventListener("DOMContentLoaded", function () {
        const clientsImg = document.querySelector(".clients-img");

        // Duplicate client logos for seamless looping
        clientsImg.innerHTML += clientsImg.innerHTML;

        let scrollSpeed = getScrollSpeed(); // Get initial speed
        let scrollPosition = 0;

        function getScrollSpeed() {
            if (window.innerWidth > 1200) return 1.5;
            if (window.innerWidth > 1024) return 1.2;
            if (window.innerWidth > 768) return 1.0;
            return 0.8; // Slower on smaller screens
        }

        function autoScrollClients() {
            scrollPosition += scrollSpeed;
            clientsImg.style.transform = `translateX(-${scrollPosition}px)`;

            // Reset position when the first batch scrolls out of view
            if (scrollPosition >= clientsImg.scrollWidth / 2) {
                scrollPosition = 0;
                clientsImg.style.transform = `translateX(0px)`;
            }

            requestAnimationFrame(autoScrollClients);
        }

        autoScrollClients(); // Start scrolling animation

        // Update scroll speed dynamically when window resizes
        window.addEventListener("resize", function () {
            scrollSpeed = getScrollSpeed();
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        const steps = document.querySelectorAll(".step");
        const line = document.querySelector(".steps-wrapper::before");
        let index = 0;

        function showStep() {
            if (index < steps.length) {
                steps[index].style.opacity = "1";
                steps[index].style.transform = "translateY(0)";
                document.querySelector(".steps-wrapper").style.setProperty('--line-height',
                    `${(index + 1) * 100}px`);
                index++;
                setTimeout(showStep, 1000);
            } else {
                setTimeout(() => {
                    steps.forEach(step => {
                        step.style.opacity = "0";
                        step.style.transform = "translateY(20px)";
                    });
                    document.querySelector(".steps-wrapper").style.setProperty('--line-height', '0');
                    index = 0;
                    setTimeout(showStep, 1000);
                }, 3000);
            }
        }

        showStep();
    });
    document.addEventListener("DOMContentLoaded", function () {
        const steps = document.querySelectorAll(".step");
        const connectingLine = document.querySelector(".connecting-line");
        let currentStep = 0;
        let isAnimating = false;

        function calculateLineHeight() {
            if (currentStep === 0) return 0;

            const firstStep = steps[0].querySelector(".step-number");
            const currentStepElement = steps[currentStep].querySelector(".step-number");

            const firstStepCenter = firstStep.getBoundingClientRect().top + firstStep.offsetHeight / 2;
            const currentStepCenter = currentStepElement.getBoundingClientRect().top + currentStepElement
                .offsetHeight / 2;

            return currentStepCenter - firstStepCenter;
        }

        function animateSteps() {
            if (isAnimating || currentStep >= steps.length) return;

            isAnimating = true;

            // Show the current step
            steps[currentStep].classList.add("visible");

            // Animate line height
            const targetHeight = calculateLineHeight();
            connectingLine.style.height = `${targetHeight}px`;

            setTimeout(() => {
                isAnimating = false;
                currentStep++;

                if (currentStep >= steps.length) {
                    // Reset animation after completion
                    setTimeout(() => {
                        steps.forEach(step => step.classList.remove("visible"));
                        connectingLine.style.height = "0";
                        currentStep = 0;
                        setTimeout(animateSteps, 1000);
                    }, 3000);
                } else {
                    animateSteps();
                }
            }, 1000);
        }

        // Start the animation
        animateSteps();

        // Handle window resize
        window.addEventListener("resize", () => {
            if (currentStep > 0) {
                connectingLine.style.height = `${calculateLineHeight()}px`;
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        const typingText = document.querySelector(".typing-text");
        const cursor = document.querySelector(".cursor");
        const words = ["Content Creator", "Designer", "Freelancer", "Video Editor"];
        let wordIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        let typingSpeed = 150;
        let deletingSpeed = 60;
        let pauseTime = 500;

        function typeEffect() {
            let currentWord = words[wordIndex];

            if (isDeleting) {
                typingText.textContent = currentWord.substring(0, charIndex - 1);
                charIndex--;
            } else {
                typingText.textContent = currentWord.substring(0, charIndex + 1);
                charIndex++;
            }

            // Set cursor position **exactly** at the last letter
            cursor.style.left = `${typingText.offsetWidth-5}px`;

            if (!isDeleting && charIndex === currentWord.length) {
                setTimeout(() => isDeleting = true, pauseTime);
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                wordIndex = (wordIndex + 1) % words.length;
            }

            setTimeout(typeEffect, isDeleting ? deletingSpeed : typingSpeed);
        }

        typeEffect();
    });

    document.addEventListener("DOMContentLoaded", function () {
        const heroSection = document.querySelector(".hero");
        const abstract1 = document.querySelector(".abstract-image-1");
        const abstract2 = document.querySelector(".abstract-image-2");
        const abstract3 = document.querySelector(".abstract-image-3");

        heroSection.addEventListener("mousemove", (event) => {
            let x = (event.clientX / window.innerWidth - 0.5) * 30; // Scale movement
            let y = (event.clientY / window.innerHeight - 0.5) * 30;

            // Move abstracts dynamically at different angles
            abstract1.style.transform = `translate(${x * 1.2}px, ${y * 0.8}px) scale(1.2)`;
            abstract2.style.transform = `translate(${x * -1}px, ${y * 1.1}px) scale(1.2)`;
            abstract3.style.transform = `translate(${x * 0.9}px, ${y * -1.2}px) scale(1.2)`;
        });

        // Reset when mouse leaves the hero section
        heroSection.addEventListener("mouseleave", () => {
            abstract1.style.transform = "translate(0px, 0px) scale(1.2)";
            abstract2.style.transform = "translate(0px, 0px) scale(1.2)";
            abstract3.style.transform = "translate(0px, 0px) scale(1.2)";
        });
    });



    document.addEventListener("DOMContentLoaded", function () {
        const heroSection = document.querySelector(".hero");
        const circleBackground = document.querySelector(".circle-background");

        // Reset when mouse leaves the hero section
        heroSection.addEventListener("mouseleave", () => {
            circleBackground.style.transform = `translate(-50%, -50%) scale(1.1)`;
        });
    });


    document.addEventListener("DOMContentLoaded", function () {
        const logoRows = document.querySelectorAll(".logos-row");

        // Ensure logos start visible with a slow transition effect
        logoRows.forEach((row) => {
            row.style.opacity = "1";
            row.style.transform = "translateY(0px)";
            row.style.transition = "opacity 3s ease-out, transform 3s ease-out"; // Slower transition
        });

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    const {
                        target,
                        intersectionRatio
                    } = entry;

                    // Smoother fade-in and movement effect
                    const opacity = Math.min(1, intersectionRatio * 1.5);
                    const translateY = (1 - intersectionRatio) *
                        15; // Less movement for better readability

                    if (intersectionRatio > 0) {
                        target.style.opacity = opacity;
                        target.style.transform = `translateY(${translateY}px)`;
                    } else {
                        target.style.opacity = "1"; // Keep it visible
                        target.style.transform = "translateY(0px)";
                    }
                });
            }, {
                threshold: Array.from({
                    length: 20
                }, (_, i) => i * 0.05), // More granularity for ultra-smooth effects
            }
        );

        logoRows.forEach((row) => observer.observe(row));
    });



    document.addEventListener("DOMContentLoaded", function () {
        const wrapper = document.querySelector(".wrapper");
        const body = document.body;
        const h1Elements = document.querySelectorAll("h1");

        function updateHoverEffects() {
            h1Elements.forEach(h1 => {
                h1.addEventListener("mouseenter", function () {
                    const wrapperBg = window.getComputedStyle(wrapper).backgroundColor;
                    const bodyBg = window.getComputedStyle(body).backgroundColor;

                    // If wrapper background is #e2ecf6, keep h1 color #25262f
                    if (wrapperBg === "rgb(226, 236, 246)") {
                        h1.style.color = "#25262f";
                    }
                    // If no wrapper background but body is dark, set hover color to light
                    else if (bodyBg === "rgb(37, 38, 47)") {
                        h1.style.color = "#e2ecf6";
                    }

                    // Always apply the shadow effect
                    h1.style.textShadow = "2px 2px 8px #80db66";
                });

                h1.addEventListener("mouseleave", function () {
                    // Reset to original color based on background
                    const wrapperBg = window.getComputedStyle(wrapper).backgroundColor;
                    const bodyBg = window.getComputedStyle(body).backgroundColor;

                    if (wrapperBg === "rgb(226, 236, 246)") {
                        h1.style.color = "#25262f"; // Keep dark on light background
                    } else {
                        h1.style.color = "#25262f"; // Reset for normal dark mode
                    }

                    // Remove shadow when mouse leaves
                    h1.style.textShadow = "none";
                });
            });
        }

        updateHoverEffects(); // Run on page load
    });


    document.addEventListener("DOMContentLoaded", function () {
        let testimonials = document.querySelectorAll(".testimonial");
        let maxHeight = 0;

        // Find the tallest testimonial box
        testimonials.forEach((testimonial) => {
            let height = testimonial.offsetHeight;
            if (height > maxHeight) {
                maxHeight = height;
            }
        });

        // Apply the max height to all testimonial boxes
        testimonials.forEach((testimonial) => {
            testimonial.style.height = maxHeight + "px";
        });
    });


    document.getElementById('contact-form').addEventListener('submit', function (event) {
        event.preventDefault();
        alert('Your message has been sent successfully!');
    });

</script>


@endsection
