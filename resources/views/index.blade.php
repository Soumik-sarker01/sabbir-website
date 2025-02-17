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
    
    

/* Fix Hero Section for Mobile View */
@media (max-width: 1024px) {
    .hero {
        height: auto;
        padding: 80px 0;
    }

    .hero-wrapper {
        text-align: center;
        gap: 20px;
        margin-top:-250px;
        flex-direction: column;
        text-align: center;
        min-height: 90vh;
        grid-template-columns: 1fr 2fr 1fr;
        max-height: 900px;
    }
    

    .hero-text {
        max-width: 100%;
        width: 100%;
        text-align: center;
        padding: 0 1.5rem;
        margin: auto;
    }

    .hero-text h1 {
        font-size: clamp(26px, 5vw, 40px);
        margin-bottom: 15px;
        margin-top: 15px;
    }



    .profile h4 {
    position: relative;
    text-align: center;
    font-size: 2.0rem;
    /* Smaller text */
    font-weight: 400;
    color: #80db66;
    /* Ensure visibility */
    margin-bottom: 5px;
    left: 5px;
    font-family: 'Jost-medium-font';
}

.profile h1 {
    font-size: 4.8rem;
    /* Larger name */
    font-weight: 800;
    color: #e2ecf6;
    margin-top: -10;
    font-family: 'Jost';
}

    .hero-text .button2 {
        font-size: 1.4rem;
        padding: 12px 30px;
    }

    .hero-image-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;
        width: 80%;
        max-width: 400px;
        height: auto;
    }

    .hero .custom-button {
        min-width: 0;
        width: auto;
        padding: 12px 25px;
        font-size: 1.2rem;
    }

    .wavy-arrow {
        width: 40px;
        height: 80px;
        margin: auto;
    }

    .hero p {
    font-size: 1.8rem;
    max-width: 450px;
    color: #41464f;
    /* margin: auto; */
}

.hero .button2 {
    padding: 1.2rem 8rem;
    font-size: 1.6rem;
    font-weight: 500;
}

.hero img {
    border-radius: 20px;
    width: 100%;
    max-width: 220px;
}


.hero-text {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: left;
    max-width: 600px;
    position: relative;
    width: 100%;
    top: 150px;
}


.intro-text{
    position: relative;
}

.intro-text p {
text-align: center; /* Left-align text */
font-size: 1.3rem; /* Adjust font size as needed */
max-width: 600px; /* Ensures proper width */
width: 100%;
margin-left: 10px; /* Ensure no left margin */
padding-left: 0; /* Ensure no padding is pushing the text */
color: #e2ecf6;
}

/* Left-align social media container */
.social-media-container {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 6px;
    flex-wrap: nowrap;
    text-align: left;
    font-size: 100px;
    white-space: nowrap;
    position: relative;
    height: 70px;
    left: 100px;
    top: -30px;
    font-family: 'Jost', sans-serif;
}

/* Keep "Social Media" text fixed */
.social-media-text {
    flex-shrink: 0;
    min-width: fit-content;
    text-align: left;
    color: #e2ecf6;
    font-size: 15px;
}

/* Ensure the container has a fixed width to prevent shifting */
.typing-container {
    display: inline-flex;
    align-items: center;
    position: relative;
    white-space: nowrap;
    font-size: inherit;
    width: 270px;
    overflow: hidden;
    text-align: left;
}

/* Typing text grows without shifting "Social Media" */
.typing-text {
    font-weight: bold;
    color: #80db66;
    display: inline-block;
    overflow: hidden;
    min-width: fit-content;
    padding-right: -10px;
    /* Ensures cursor sticks to last letter */
    margin-right: -15px;
    /* Adjust this if needed */
    font-size: 15px;
}

/* Cursor positioning */
.cursor {
    font-size: inherit;
    color: #80db66;
    display: inline-block;
    position: absolute;
    /* Changed from relative */
    left: 0;
    animation: blink 1.3s infinite;
    /* Adjusted speed */
}

/* Left-align hero button */
.custom-button-hero {
    display: inline-block;
    padding: 12px 40px;
    font-size: 1.4rem;
    font-weight: 600;
    background: #80db66;
    color: #25262f;
    border: 2px solid #80db66;
    border-radius: 25px;
    text-decoration: none;
    transition: all 0.3s ease;
    cursor: pointer;
    text-transform: uppercase;
    min-width: 200px;
    text-align: center;
    justify-content: left;
    margin-left: 10px;
    /* Ensure alignment */
}

/* Hover effect: Transparent background */
.custom-button-hero:hover {
    background: rgba(255, 255, 255, 1);
    color: #25262f;
    border: 1px solid #fff;
}


/* Ensure buttons have equal width */
.custom-button-hero+.custom-button-hero {
    margin-left: 10px;
}


/* Abstracts - Move & Float */
.abstract-image-1,
.abstract-image-2,
.abstract-image-3 {
    display:none;
}


/* Container for image and circle */
.hero-image-container {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    width: var(--circle-size);
    height: var(--circle-size);
    margin-left: -95px;
    /* Shift slightly left */
}

/* Background Circle - Static but Zooms on Hover */
.circle-background {
position: absolute;
width: 300px;
height: 300px;
background: rgba(128, 128, 128, 0.2); /* Gray transparent */
border-radius: 50%;
z-index: 0;
left: 260px;
top: 360px;
transform: translate(-50%, -50%);
transition: transform 0.4s ease-in-out, opacity 0.3s ease-in-out;
}

/* Hover Effect - Enlarge Circle */
.hero-image-container:hover .circle-background {
transform: translate(-50%, -50%) scale(1.1); /* Zoom without moving */
opacity: 0.4;
}

/* IMAGE - Force it to increase */
.hero-image {
    width: 500px !important;
    /* FORCE BIGGER IMAGE */
    height: 500px !important;
    max-width: none !important;
    /* Prevents constraints */
    max-height: none !important;
    border-radius: 10px;
    position: relative;
    z-index: 1;
    /* Above circle */
    object-fit: contain;
    transition: transform 0.3s ease-in-out;
    left: 50px;
    top: 100px;
}
:root {
    --image-width: 550px;
    /* Image size increased */
    --image-height: 550px;
    --circle-size: 500px;
    /* Circle size increased */
}
nav .custom-button-nav-portfolio {
        display: none;
    }

    .phone-menu {
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    gap: 10rem;
    font-size: 2rem;
    font-weight: 500;
}

    .phone-menu .custom-button-nav-portfolio {
        display: inline-block;
    padding: 12px 40px;
    font-size: 1.4rem;
    font-weight: 600;
    background: #80db66;
    color: #25262f;
    border: 2px solid #80db66;
    border-radius: 25px;
    text-decoration: none;
    transition: all 0.3s ease;
    cursor: pointer;
    text-transform: uppercase;
    min-width: 200px;
    text-align: center;
    justify-content: left;
    margin-left: -5px;

}



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
                        <h1>Sabbir Tareq</h1>
                    </div>
                    <div class="social-media-container">
                        <span class="social-media-text">A Social Media</span>
                        <div class="typing-container">
                            <span class="typing-text"></span>
                            <span class="cursor">|</span>
                        </div>
                    </div>
                    <div class="intro-text">
                        <p>
                            Meet Sabbir Tareq, Entrepreneur, Content Creator, Video Editing Maestro, and Mentor. 
                            With a thriving video editing agency based in the UK and over 500+ client social media post crafted 
                        </p>
                    </div>
                    <div class="spacer"></div>
                    <div style="display: flex; gap: 15px; justify-content: center;">
                        <a href="https://www.fiverr.com/sabbir_tareq" target="_blank">
                            <button class="custom-button-hero">GET STARTED</button>
                        </a>
                    </div>
                </div>

                <div class="hero-image-container">
                    
                <img src="{{ asset('assets/img/1.svg') }}" alt="Abstract" class="abstract-image-1">
                    <img src="{{ asset('assets/img/2.svg') }}" alt="Abstract" class="abstract-image-2">
                    <img src="{{ asset('assets/img/3.svg') }}" alt="Abstract" class="abstract-image-3">
                    <div class="circle-background"></div> <!-- Enlarged Circle -->
                    <img src="{{ asset('assets/img/profile.png') }}" alt="Sabbir Tareq" class="hero-image">
                </div>


            </div>
        </div>
    </section>

    <div class="spacer-xl"></div>

    <section class="infograph">
        <div class="container-fluid">
            <div class="infograph-wrapper">
                <div class="container-lg">
                    <div>
                        <div class="orders">
                            <div class="order-number">
                                <h1>200+</h1>
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
                                <h1>100+</h1>
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
                                <h1>160+</h1>
                                <p>Customers</p>
                            </div>
                            <!-- New wrapper for scrolling -->
                            <div class="clients-scroll-container">
                                <div class="clients-img">
                                    <img id="client-1" src="{{ asset('assets/img/client-1.svg') }}" alt="client">
                                    <img id="client-2" src="{{ asset('assets/img/client-2.svg') }}" alt="client">
                                    <img id="client-3" src="{{ asset('assets/img/client-3.svg') }}" alt="client">
                                    <img id="client-4" src="{{ asset('assets/img/client-4.svg') }}" alt="client">
                                    <img id="client-5" src="{{ asset('assets/img/client-5.svg') }}" alt="client">
                                    <img id="client-6" src="{{ asset('assets/img/client-1.svg') }}" alt="client">
                                    <img id="client-7" src="{{ asset('assets/img/client-2.svg') }}" alt="client">
                                    <img id="client-8" src="{{ asset('assets/img/client-3.svg') }}" alt="client">
                                    <img id="client-9" src="{{ asset('assets/img/client-4.svg') }}" alt="client">
                                    <img id="client-10" src="{{ asset('assets/img/client-5.svg') }}" alt="client">
                                    <img id="client-11" src="{{ asset('assets/img/client-5.svg') }}" alt="client">
                                    <img id="client-12" src="{{ asset('assets/img/client-5.svg') }}" alt="client">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="projects container-fluid" id="portfolio">
        <div class="projects-wrapper">
            <div class="container-lg">
                <h1>Social media content I created</h1>
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
                        <img src="{{asset('assets/img/projects/129.png')}}" alt="project">
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
                        <img src="{{asset('assets/img/projects/18.png')}}" alt="project">
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
                            <img src="{{asset('assets/img/5.png')}}" alt="project">
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
                            <img src="{{asset('assets/img/6.png')}}" alt="project">
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
                <a href="<?php echo config('app.url'); ?>projects">
                    <button class="custom-button">
                        View All <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </a>
            </div>
        </div>
    </section>

    <section class="aim">
        <div class="container-lg">
            <h1 class="aim-title" style="color:#e2ecf6;">My service is ideal for you if you aim to</h1>
            <div class="aim-wrapper">
                <div class="aim-item">
                    <div class="aim-icon"><i class="fa-solid fa-comments"></i></div>
                    <h1>Unique & Engaging Content</h1>
                    <p>Capture your audience with unique and eye-catching content.</p>
                </div>

                <div class="aim-item">
                    <div class="aim-icon"><i class="fa-solid fa-chart-bar"></i></div>
                    <h1>Strong Brand Identity</h1>
                    <p>Stand out from the competition with a well-defined brand presence.</p>
                </div>

                <div class="aim-item">
                    <div class="aim-icon"><i class="fa-solid fa-microphone"></i></div>
                    <h1>Broadcast Your Message</h1>
                    <p>Communicate your vision effectively through social media.</p>
                </div>

                <div class="aim-item">
                    <div class="aim-icon"><i class="fa-solid fa-handshake"></i></div>
                    <h1>Boost Audience Engagement</h1>
                    <p>Increase organic reach and engagement with strategic content.</p>
                </div>

                <div class="aim-item">
                    <div class="aim-icon"><i class="fa-solid fa-palette"></i></div>
                    <h1>Tailored Ad Campaigns</h1>
                    <p>Customize ads to target the right audience efficiently.</p>
                </div>

                <div class="aim-item">
                    <div class="aim-icon"><i class="fa-solid fa-envelope-open-text"></i></div>
                    <h1>Transparent Communication</h1>
                    <p>Stay connected with clear and effective messaging.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="services-included container-lg">
        <h1 class="section-title">My Service Includes</h1>
        <div class="services-wrapper">
            <div class="service-item">
                <div class="service-icon"><i class="fa-solid fa-paint-brush"></i></div>
                <h1>Custom Social Media Designs</h1>
                <p>Visually appealing and brand-focused designs.</p>
            </div>

            <div class="service-item">
                <div class="service-icon"><i class="fa-solid fa-pen-nib"></i></div>
                <h1>Engaging Captions</h1>
                <p>Creative captions that encourage interaction.</p>
            </div>

            <div class="service-item">
                <div class="service-icon"><i class="fa-solid fa-hashtag"></i></div>
                <h1>SEO-Friendly Hashtags</h1>
                <p>Boost visibility with high-ranking hashtags.</p>
            </div>

            <div class="service-item">
                <div class="service-icon"><i class="fa-solid fa-calendar-check"></i></div>
                <h1>Scheduled Posting</h1>
                <p>Maintain consistency with automated posting.</p>
            </div>

            <div class="service-item">
                <div class="service-icon"><i class="fa-solid fa-cogs"></i></div>
                <h1>Profile Optimization</h1>
                <p>Optimize your profile for maximum engagement.</p>
            </div>

            <div class="service-item">
                <div class="service-icon"><i class="fa-solid fa-life-ring"></i></div>
                <h1>Weekly Strategy Meetings</h1>
                <p>Continuous improvements based on data insights.</p>
            </div>
        </div>
    </section>





    <section class="steps" id="growth-section">
        <div class="container-lg">
            <h1 class="steps-title">My 3 Simple Steps Process</h1>
            <div class="steps-wrapper">
                <div class="connecting-line"></div>
                <div class="step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h2>Select a Plan</h2>
                        <p>Select a plan tailored to your specific post requirements. Options include pre-written posts
                            with captions or our complete posting service.</p>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h2>Place an Order</h2>
                        <p>Place a Fiverr order to access progress updates and delivered content. All communication
                            happens on the Fiverr platform.</p>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h2>Receive & Approve Content</h2>
                        <p>Review the content and request changes if needed. Once approved, we'll start posting as
                            scheduled.</p>
                    </div>
                </div>
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
                <p>Hey there! We're AyNaur, your partners in crafting stunning visual identities.</p>
                <p>Since day one, we've been passionate about helping small and medium-sized businesses make a big
                    impact online. Our team of talented designers is dedicated to turning your brand vision into
                    reality.</p>
                <p>With a focus on creating modern, eye-catching designs, we've helped countless businesses elevate
                    their online presence. Whether you need a logo, website graphics, or social media assets, we've got
                    you covered.</p>
                <p>We believe that great design shouldn't break the bank. That's why we offer flexible pricing packages
                    to suit your needs and budget.</p>
                <br><br>
                <div>
                    <p><b>Ready to take your brand to the next level?</b></p> <br>
                    <a href="https://www.fiverr.com/sabbir_tareq" target="_blank">
                        <button class="custom-button-starter">
                            Let's chat!
                        </button>
                    </a>
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
                                    <h1 class="testimonial-name">Lifenow_nicola</h1>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        It was a pleasure working with the team on my branding refresh. I shared lots of
                                        information about what I needed, and we had some communication back and forth to
                                        ensure that my requirements were properly understood. They shared an initial set
                                        of templates to check for alignment, on which I gave some feedback. They then
                                        asked for a video call to talk through everything, which was a massive help and
                                        made sure we understood everything I wanted correctly. The finished order was of
                                        a high standard and very much appreciated.
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
                                    <h1 class="testimonial-name">nafizimtiaz2578</h1>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        AyNaur's social media management impressed me just like the Fiverr review
                                        describes - high-quality, creative images that perfectly captured my brand
                                        identity at a great price. Their attention to detail is fantastic, and I'm
                                        confident this is the start of a long-term partnership to elevate my social
                                        media presence.
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
                                    <h1 class="testimonial-name">Missmth</h1>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        I am beyond impressed and happy with the work delivered by the team. Brand
                                        alignment, color palettes, open communication, very quick turnaround, open to
                                        new suggestions - could not have asked for more. I was not stressed at all
                                        during the process and trusted my social media templates would be delivered with
                                        exceptional quality.
                                    </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>

                        <!-- Slide #4 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h1 class="testimonial-name">jjcasa</h1>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Extremely professional, the best on Fiverr! If you need a social media manager
                                        and content creator, this is the best team! Wow, I am very impressed by the
                                        quality of work. I will continue to hire them for my social channels and social
                                        media management. I highly recommend it!
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
                                    <h1 class="testimonial-name">jjcasa</h1>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        The best investment I have made for my business. This team is professional and
                                        does an amazing job with my social media. We have been working together for
                                        several months and I am thrilled with their work. Thank Thank you so much!
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
                                    <h1 class="testimonial-name">sartmon</h1>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Ay.naur did an AMAZING job on our social media design. The visual appeal and
                                        brand alignment were spot on, truly exceeding our expectations! Additionally,
                                        working with them was very pleasant – cooperative, timely, and always going
                                        above and beyond. 👏
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
                                    <h1 class="testimonial-name">lucasgrants</h1>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Very professional and attentive freelancer, with grreat detail for design. I
                                        highly recommended to everyone.
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
                                    <h1 class="testimonial-name">dakotahosley396</h1>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        She crushed it. Made 30 social media templates for us in only a few days. Will
                                        definitely come back to her.
                                    </p>
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

    <section class="cta-section">
        <div class="container-lg">
            <div class="card cta-card text-center">
                <div class="card-body">
                    <h2 class="card-title">Let's Work Together</h2>
                    <p class="card-text">
                        We're here to help you elevate your brand and achieve your goals. Reach out to us and let's
                        start the conversation!
                    </p>
                    <br><br>
                    <a href="mailto:hello@aynaur.com" class="custom-button-starter">Drop us an email</a>
                </div>
            </div>
        </div>
    </section>
</div>

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
        const orderNumber = document.querySelector(".order-number h1");
        const reviewNumber = document.querySelector(".review-number h1");
        const clientNumber = document.querySelector(".clients-number h1");

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
                    animateCounter(orderNumber, 200, 1000); // Count to 200 in 1 second
                    animateCounter(reviewNumber, 100, 600); // Count to 100 in 0.6 seconds
                    animateCounter(clientNumber, 160, 700); // Count to 160 in 0.7 seconds

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
        const words = ["Content Creator", "Designer", "Manager"];
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


</script>


@endsection
