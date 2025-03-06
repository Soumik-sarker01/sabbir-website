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

/* Ensure the logos container is isolated */
.company-logos {
  position: relative;
  overflow: hidden;
  z-index: 1; /* Lower stacking context for logos only */
}

/* Remove the high z-index from the overlays so they only affect logos */
.logos-overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  width: 350px; /* Your desired fade area width */
  pointer-events: none;
  z-index: 2; /* Lower than navbar/social icons */
}

.logos-overlay.left,
.logos-overlay.right {
  width: 400px !important;  /* Increased overlay width */
}


/* Define the left overlay (gradient from solid to transparent) */
.logos-overlay.left {
  left: 0;
  background: linear-gradient(to right, #25262f 0%, rgba(37,38,47,0) 100%);
  /* (Remove backdrop-filter so it only fades without blurring other content) */
}

/* Define the right overlay */
.logos-overlay.right {
  right: 0;
  background: linear-gradient(to left, #25262f 0%, rgba(37,38,47,0) 100%);
}




.company-logos::before,
.company-logos::after {
  content: "" !important;
  position: absolute !important;
  top: 0 !important;
  bottom: 0 !important;
  width: 80px !important; /* Adjust fade width as needed */
  pointer-events: none !important;
  z-index: 9999 !important;
}

/* Left fade: from the background color (#25262f) to transparent */
.company-logos::before {
  left: 0 !important;
  background: linear-gradient(to right, #25262f 0%, rgba(37,38,47,0) 100%) !important;
}

/* Right fade: from the background color (#25262f) to transparent */
.company-logos::after {
  right: 0 !important;
  background: linear-gradient(to left, #25262f 0%, rgba(37,38,47,0) 100%) !important;
}




.logos-wrapper {
  -webkit-mask-image: linear-gradient(to right, transparent 0%, black 30%, black 70%, transparent 100%);
  mask-image: linear-gradient(to right, transparent 0%, black 30%, black 70%, transparent 100%);
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
  padding: 10px 0; /* reduce vertical spacing within each row */
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
  animation-duration: 30s; /* slower movement */
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
  animation-duration: 30s; /* slower movement */
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
  width: 150px; /* smaller for less horizontal gap, adjust as needed */
  height: auto;
  margin: 0 15px; /* reduce horizontal gap between logos */
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


    /* ================================
   HERO SHORT-VIEWPORT OVERRIDES
   Place these after your main.css
================================ */

    /* Generic hero constraints */
    .hero {
        position: relative;
        overflow: hidden;
        /* ensure no overlap scrolling */
    }

    /* ================================
   HERO IMAGE & CIRCLE OVERRIDES
   (Add after your main.css)
================================ */

    /* Base: ensure the container for image + circle is relatively positioned */
    .hero-image-container {
        position: relative;
        /* If not already set */
    }

    /* The circle background behind the hero image */
    .circle-background {
        position: absolute;
        top: 20%;
        right: 5%;
        z-index: -1;
        /* behind the hero image */
        width: 350px;
        height: 350px;
        transform: translate(0, -50%);
        transition: transform 0.3s ease, width 0.3s ease, height 0.3s ease;
    }

    /* The hero image itself */
    .hero-image {
        display: block;
        max-height: 70vh;
        /* limit image so it doesn’t overflow short screens */
        height: auto;
        width: auto;
        object-fit: contain;
        /* or cover if you prefer */
        margin: 0 auto;
        transition: transform 0.3s ease, max-height 0.3s ease;
    }

    /* For screens that are short but not too small (height < 800px) */
    @media (max-height: 800px) {

        /* Slightly shift the image container upward if needed */
        .hero-image-container {
            margin-top: -2rem;
            /* move it up so it doesn’t collide with infograph */
        }

        /* Shrink circle and reposition */
        .circle-background {
            width: 300px;
            height: 300px;
            top: 15%;
            right: 5%;
        }

        /* Reduce max-height of image so it fits above infograph */
        .hero-image {
            max-height: 60vh;
        }
    }

    /* For very short screens (height < 600px) */
    @media (max-height: 600px) {

        /* Move container further up if necessary */
        .hero-image-container {
            margin-top: -3rem;
        }

        .circle-background {
            width: 240px;
            height: 240px;
            top: 10%;
            right: 5%;
        }

        /* Scale down the hero image more */
        .hero-image {
            max-height: 50vh;
            transform: scale(0.9);
            /* optional scaling */
            transform-origin: center bottom;
        }
    }

  /* Smooth expansion/collapse for FAQ answers */
  .faq-answer {
    max-height: 0;
    opacity: 0;
    overflow: hidden;
    transition: max-height 0.3s ease, opacity 0.3s ease;
  }
  .faq-answer.open {
    max-height: 500px; /* a large enough height to reveal text */
    opacity: 1;
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
                        <span class="social-media-text">A Passionate</span>
                        <div class="typing-container">
                            <span class="typing-text"></span>
                            <span class="cursor">_</span>
                        </div>
                    </div>
                    <div class="spacer"></div>

                    <div class="hero-buttons">
                        <!-- Get Started button (Left Side) -->
                        <a href="https://wa.me/+8801303934047" id="hero-started">
                            <button class="custom-button-hero">Start a Project</button>
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
            <a href="https://www.instagra​​m.com/designedbytareq/" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.linkedin.com/in/sabbirhossain48/" target="_blank"><i
                    class="fab fa-linkedin-in"></i></a>
            <a href="https://wa.me/+8801303934047" target="_blank"><i class="fab fa-whatsapp"></i></a>
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
                            <img style="margin-left: -10px;" src="{{asset('assets/img/review-2.jpg')}}" alt="client">
                            <img style="margin-left: -10px;" src="{{asset('assets/img/review-3.jpg')}}" alt="client">
                            <img style="margin-left: -10px;" src="{{asset('assets/img/review-4.jpg')}}" alt="client">
                            <img style="margin-left: -10px;" src="{{asset('assets/img/review-5.jpg')}}" alt="client">
                            <img style="margin-left: -10px;" src="{{asset('assets/img/review-6.jpg')}}" alt="client">
                        </div>
                    </div>
                </div>
                <!-- New wrapper for Clients and Designs boxes -->
                <div class="client-designs-wrapper">
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
                    <div class="designs">
                        <div class="designs-number">
                            <h2>2000+</h2>
                            <p>Designs Done</p>
                        </div>
                    </div>
                </div>
                <!-- End new wrapper -->
            </div>
        </div>
    </div>
</section>


    {{-- Company Logos Section --}}
    <section id="company-logos" class="company-logos my-5">
  <div class="container">
    <h1 class="company-logo-title" style="font-size: 45px;">My Clients</h1>
    <!-- Fade Overlays -->
    <div class="logos-overlay left"></div>
    <div class="logos-overlay right"></div>
    <div class="logos-wrapper">
      {{-- Row 1 (Right to Left) --}}
      <div class="logos-row right-to-left hidden">
        <div class="logos-track">
          @for($i = 0; $i < 2; $i++)
            <img src="{{ asset('assets/img/logos/1.png') }}" alt="Company 1">
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
          @for($i = 0; $i < 2; $i++)
            <img src="{{ asset('assets/img/logos/19.png') }}" alt="Company 19">
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
          @for($i = 0; $i < 2; $i++)
            <img src="{{ asset('assets/img/logos/37.png') }}" alt="Company 37">
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
                            <img src="{{asset('assets/projects/Austral HVAC/11.png')}}" alt="project">
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
                            <img src="{{asset('assets/projects/BLK/1.png')}}" alt="project">
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
                            <img src="{{asset('assets/projects/Carribean Edit/Business (2).png')}}" alt="project">
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
                            <img src="{{asset('assets/projects/Chingu Store/3.png')}}" alt="project">
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
                            <img src="{{asset('assets/projects/Chispa/4.png')}}" alt="project">
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
                            <img src="{{asset('assets/projects/Circle Fit/1.png')}}" alt="project">
                            <div class="project-icons">
                                <div>
                                    <i class="fa-solid fa-heart"></i>
                                    <i class="fa-regular fa-comment"></i>
                                    <i class="fa-regular fa-paper-plane"></i>
                                </div>
                                <i class="fa-regular fa-bookmark"></i>
                            </div>
                        </div>
                        <!-- #7 -->
                        <div class="project-item category-kids" data-modal-target="#exampleModal-7">
                            <img src="{{asset('assets/projects/Coach Deal/1.png')}}" alt="project">
                            <div class="project-icons">
                                <div>
                                    <i class="fa-solid fa-heart"></i>
                                    <i class="fa-regular fa-comment"></i>
                                    <i class="fa-regular fa-paper-plane"></i>
                                </div>
                                <i class="fa-regular fa-bookmark"></i>
                            </div>
                        </div>
                        <!-- #8 -->
                        <div class="project-item category-kids" data-modal-target="#exampleModal-8">
                            <img src="{{asset('assets/projects/Dembele/17.png')}}" alt="project">
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
            <h1 class="aim-title" style="color:#e2ecf6; font-size: 45px;">My Area of Expertise</h1>
            <div class="aim-wrapper">
                <div class="aim-item">
                    <h2>Social Media Post Design</h2>
                </div>

                <div class="aim-item">
                    <h2>Social Media Ads Design</h2>
                </div>

                <div class="aim-item">
                    <h2>Thumbnail Design</h2>
                </div>

                <div class="aim-item">
                    <h2>Ebook Design</h2>
                </div>

                <div class="aim-item">
                    <h2>Video Editing</h2>
                </div>

                <div class="aim-item">
                    <h2>Content Strategy</h2>
                </div>
                <div class="aim-item">
                    <h2>Drinking Tea</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="services-included container-lg">
        <h1 class="section-title">My Service Includes</h1>
        <div class="services-wrapper">
            <!-- Service Item 1 -->
            <div class="service-item">
                <div class="service-item-inner">
                    <!-- Front Side: Only Icon and Title -->
                    <div class="service-front">
                        <div class="service-icon">
                            <i class="fa-solid fa-palette"></i>
                        </div>
                        <h2>Social Media Post Design</h2>
                    </div>
                    <!-- Back Side: Icon, Title, and Paragraph -->
                    <div class="service-back">
                        <div class="service-icon">
                            <i class="fa-solid fa-palette"></i>
                        </div>
                        <h2>Social Media Post Design</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur sunt minus iusto
                            possimus, nam nostrum ad, illum quasi sint omnis velit debitis mollitia excepturi quae at
                            ipsa facilis. Dicta, autem?
                        </p>
                    </div>
                </div>
            </div>

            <!-- Service Item 2 (repeat structure for additional items) -->
            <div class="service-item">
                <div class="service-item-inner">
                    <div class="service-front">
                        <div class="service-icon">
                            <i class="fa-solid fa-bullhorn"></i>
                        </div>
                        <h2>Social Media Ads Design</h2>
                    </div>
                    <div class="service-back">
                        <div class="service-icon">
                            <i class="fa-solid fa-bullhorn"></i>
                        </div>
                        <h2>Social Media Ads Design</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore delectus perspiciatis
                            excepturi cumque error nobis quo aliquam provident, laudantium, deleniti numquam sapiente
                            quos maiores minima nulla voluptatum eius nemo eum.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Service Item 3 -->
            <div class="service-item">
                <div class="service-item-inner">
                    <div class="service-front">
                        <div class="service-icon">
                            <i class="fa-solid fa-film"></i>
                        </div>
                        <h2>Video Editing</h2>
                    </div>
                    <div class="service-back">
                        <div class="service-icon">
                            <i class="fa-solid fa-film"></i>
                        </div>
                        <h2>Video Editing</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur molestias nobis velit
                            delectus hic et amet repellat atque repellendus, architecto cum quasi cupiditate nihil,
                            deserunt beatae distinctio doloremque expedita placeat?
                        </p>
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
                            <button class="custom-button-about">Start a Project</button>
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
                                    <h3 class="testimonial-name">quentincarteron</h3>
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
                                    <h3 class="testimonial-name">coachmegs</h3>
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
                                    <h3 class="testimonial-name">Rachellauen</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Tareq truly SHINED in social media design, delivering work that was both
                                        visually appealing and highly professional. Communication was seamless and
                                        proactive, and he handled revisions quickly and precisely as requested. Great
                                        work all around—will definitely use again! 🙌 </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #4 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">thales_ab</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Tareq is professional and delivers with the quality proposed. His delivery is
                                        aligned with the expectations and the price is a fair price. His communication
                                        is well done, he delivered on time and the files are good. Thanks Tareqq for
                                        your delivery.</p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>


                        <!-- Slide #5 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">ceochappell</h3>
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
                                    <h3 class="testimonial-name">sade411team</h3>
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
                                    <h3 class="testimonial-name">axoweb</h3>
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
                                    <h3 class="testimonial-name">ltn_up_electric</h3>
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
                                    <h3 class="testimonial-name">daphniealexis</h3>
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
                                    <h3 class="testimonial-name">jvickers182988</h3>
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
                        <!-- Slide #11 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Sade411team</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        This was an awesome experience because I was not happy with the first draft and
                                        Tareq came back with revisions that completely embodied my vision. Would
                                        definitely use him again! </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #12 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Modernwealthllc</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Tareq did an INCREDIBLE job! His designs were visually stunning, creative, and
                                        professional, and working with him was an absolute pleasure—he was polite, super
                                        responsive, and went the extra mile. Highly recommend! 🙌</p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #13 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Sandacioloca</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Tareq was very nice to work with, he delivered very quickly and very well, with
                                        multiple check-ins to make sure he was on the right track, very polite and good
                                        communication too, I definitely recommend.</p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #14 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Ltn_up_electric</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Tareq's work in Social Media Design is outstanding! The visuals were
                                        professionally crafted and perfectly aligned with our brand. Working with him
                                        was a breeze due to his language fluency and proactive communication. Highly
                                        recommend! 👍</p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #15 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Chelion_au</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Tareq did an OUTSTANDING job in presentation design, exceeding expectations with
                                        impeccable attention to detail and seamless brand alignment. Working with him
                                        was a pleasure, thanks to his proactive communication and flawless language
                                        fluency. Highly recommend for anyone in need of top-tier presentation design! 👏
                                    </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #16 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Bryankinneberg</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Best experience yet on Fiverr. Great job in delivering quality work quickly. I
                                        will definitely use Tareq again. </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #17 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Renata_ortega</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        I am very pleased with the final product! </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #18 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Gabiela_mair</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        I had the pleasure of working with Tareq on several design projects, and I
                                        couldn’t be happier with the results. The designs were not only of outstanding
                                        quality but also perfectly aligned with my brand’s needs and vision. Throughout
                                        the process, he demonstrated a keen eye for detail, creativity, and a strong
                                        commitment to delivering excellence. Communication was smooth and timely, making
                                        it easy to refine ideas together and achieve exactly what I was looking for. I
                                        highly recommend Tareq to anyone looking for professional, top-notch design
                                        work. Thank you for your fantastic work! </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #19 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">jvickers182988</h3>
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
                        <!-- Slide #20 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Content_marcel</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        I am more then happy with the results everything was like i wanted it and even
                                        better. I will work defintily in the future again with you for other projects.
                                        Thanks a lot wish you all the best. </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #21 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Ccantu007</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Great freelancer, excellent work making several YouTube shorts! Creative and
                                        good communication. Will work together again soon! </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #22 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Gabiela_mair</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        I’m incredibly impressed with the professional quality of the work. The design
                                        exceeded my expectations in both creativity and attention to detail. The
                                        freelancer truly understood my vision and turned it into a polished, impactful
                                        presentation that perfectly suits my needs. Communication was smooth and prompt,
                                        and the entire process was handled with great professionalism. Highly
                                        recommended for anyone looking to elevate their work to the next level! </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #23 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Abcsupp</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        I highly recommend Tareq for any design need you have. From our first exchange
                                        to our last Tareq has been very professional and understanding of our
                                        expectations. He has been reliable and effective in his work. After reviewing
                                        his first drafts, he completely understood our expectations and integrated them
                                        perfectly into his designs. </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #24 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Emilyharlequin1</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Tareq did an AMAZING job with our social media marketing! His professionalism
                                        shined through in his work, and he was polite, quick to respond, and extremely
                                        cooperative throughout the process. Highly recommend! 👍 </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #25 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Laura_rocks</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        The designs and templates that Tareq has created are perfect and exactly what I
                                        was looking for. It provides me with a solid suite of designs to use for my
                                        social media posts, that I can adapt as needed. He delivered on time and I will
                                        be using him again. </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #26 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Nawabz0r</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Absolutely oustanding designs and very impressive how these designs are created
                                        based on an idea. Super polite communication, perfect match with my brand voice
                                        and the designs are easy to recreate for further purposes. Very satisfied with
                                        the work delivered, communication and speed. All wishes were processed
                                        immediately and great designs are created. Couldn't have asked for a better
                                        designer, thank you very much! Tareq isn’t just a social media designer for me,
                                        but someone who truly understands marketing and brands. Thanks! </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #27 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Timo_stephan</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Very professional designer. Although my own expectations and the first
                                        deliveries were way apart, Tareq give us revisions until we were satisfied. He
                                        overdelivered in the end and sent us more design options than requested. Thanks
                                        for your service. </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #28 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Robin21x</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Tareq’s work is nothing short of brilliant! He truly understood my vision and
                                        brought it to life with exceptional skill and creativity. I am beyond impressed
                                        with the results and will be entrusting him with all of my future projects. In
                                        fact, I’m already planning to book him for the next one! Thank You </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #29 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Adamsph</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Tareq exceeded my expectations with his CREATIVE social media designs perfectly
                                        aligned with our brand. His attention to detail was impeccable, and working with
                                        him was a pleasure thanks to his deep understanding and politeness. He truly
                                        went above and beyond—HIGHLY recommend! Thank you very much Tareq and team! 🙌
                                    </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #30 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Richieisnow</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Tareq is probably the best freelancer I have ever worked with. He really went
                                        above and beyond and was determined to make sure I was happy. The work was of a
                                        very high quality and his English level was native. </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #31 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Kassandracasti</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Tareq was very cooperative and patient with client caused delays. He always kept
                                        communication open and was very polite and cooperative. Would alwasy recommend
                                        him </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #32 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Wintelligencehq</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Tareq and his team were terrific. They have a brilliant attention to detail and
                                        were so responsive and adaptive to what I required for more designs. They
                                        captured exactly the visions I had and exceeded my expectations well and truly
                                        with their own spin/take on my designs. Brilliant to work with them. Highly
                                        recommend. </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #33 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">jenilbag</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        I worked with Tareq for the second time, and once again, the experience was
                                        fantastic. This time, we collaborated on a brochure and brand guideline, and the
                                        results exceeded my expectations. He understood my vision perfectly and
                                        delivered high-quality work with great attention to detail. I highly recommend
                                        Tareq for any design projects! </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #34 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Chetnaaa1</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        I enjoyed working with Tareq on a social media graphics project, and I couldn't
                                        be more impressed. His level of cooperation was outstanding—he was always
                                        willing to make adjustments and collaborate closely to ensure the final product
                                        met my vision. What truly stood out was Tareq went above and beyond to deliver
                                        high-quality graphics, and he did so within an impressive delivery time. If
                                        you're looking for someone who is quick, reliable, and exceptionally talented,
                                        Tareq is your guy. I highly recommend his services! </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #35 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Segaps</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Tareq truly excelled in delivering top-notch social media marketing with
                                        strategic thinking and professional work. Collaborating with him was seamless
                                        due to his deep understanding and exemplary cooperation. Highly recommended! 👍
                                    </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #36 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Marte_riley</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Hi Tareq I cannot thank you enough for your top notch work on these Canva
                                        templates. I shall be proud to post them. Thank you for being so responsive to
                                        feedback. I already have two more projects for you. </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #37 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Jairomateord</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        An outstanding seller with great attention to deal and a high sense of
                                        commitment to quality and great design. I recommend him because he's a hard
                                        worker and an artist in what he does. </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #38 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Colourfulsherri</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        The designs were very good and I even ended up receiving way more designs than
                                        requested, so that was a lovely surprise. Thank you, Tareq. I enjoyed working
                                        with you. </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #39 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Kassandracasti</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        I have been relying on Tareq for various projects that are part of bigger
                                        projects and he is very organized and professional, communicates well and always
                                        exceeds expectations. I will continue to work with him, he makes my freelancing
                                        life so much easier! </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #40 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Expatalientax</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Amazing experience with Tareq, he is extremely professional, well spoken,
                                        perfect in English, kind, friendly, and humble. I highly recommend him. I will
                                        definitely work with him again. Thank you Tareq, wishing you all the success you
                                        deserve 🙌 </p>
                                </div>
                                <div class="testimonial-name">

                                </div>
                            </div>
                        </div>
                        <!-- Slide #41 -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="testimonial-info">
                                    <h3 class="testimonial-name">Josueortga</h3>
                                    <div class="testimonial-stars">★★★★★ (5.0)</div>
                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        Would work with again in the future! Tareq was very kind and polite all the
                                        time. He over delivered and I loved his designs!!! This would sure make my job
                                        easier! It will save me a lot of time when posting!!! My designs are very good
                                        looking!!! </p>
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

    <section id="faq" class="py-10">
  <div class="container mx-auto px-4">
    <!-- Small label above the main heading -->
    <div class="mb-4 text-center">
      <span class="inline-block text-sm uppercase px-4 py-1 
                   bg-transparent text-[#e2ecf6] rounded-full">
        Frequently Asked Questions
      </span>
    </div>

    <!-- Main Heading -->
    <h2 class="text-center text-4xl font-bold mb-8 text-[#e2ecf6]">
      Your Questions <span class="italic">Answered!</span>
    </h2>

    <!-- FAQ Items Wrapper -->
    <div class="space-y-6">
      <!-- FAQ #1 -->
      <div class="faq-item border-b border-[#e2ecf6]/30 pb-4">
        <button
          class="faq-btn flex justify-between items-center w-full px-2 py-3 
                 focus:outline-none transition-all duration-300"
          onclick="toggleFaq(1)"
        >
          <!-- Question Text (larger font) -->
          <span class="text-2xl font-bold text-left text-[#e2ecf6]">
            How Long Does a Design Project Take?
          </span>

          <!-- Icon Container (circle + arrow) -->
          <div
            id="faq-icon-container-1"
            class="faq-icon-container w-8 h-8 border-2 border-[#80db66] 
                   rounded-full flex items-center justify-center 
                   transition-all duration-300"
          >
            <!-- SVG Arrow -->
            <svg
              id="faq-icon-1"
              class="w-4 h-4 text-[#80db66] transform transition-transform duration-300"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              viewBox="0 0 24 24"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <path d="M6 9l6 6 6-6"></path>
            </svg>
          </div>
        </button>
        <!-- Answer (with transition class) -->
        <div id="faq-answer-1" class="faq-answer">
          <p class="text-xl font-normal text-[#e2ecf6]">
            This can vary based on the project scope. Typically, a standard social
            media design project might take a few days, while more complex branding
            or web design can take several weeks.
          </p>
        </div>
      </div>

      <!-- FAQ #2 -->
      <div class="faq-item border-b border-[#e2ecf6]/30 pb-4">
        <button
          class="faq-btn flex justify-between items-center w-full px-2 py-3 
                 focus:outline-none transition-all duration-300"
          onclick="toggleFaq(2)"
        >
          <span class="text-2xl font-bold text-left text-[#e2ecf6]">
            Why are you different?
          </span>
          <div
            id="faq-icon-container-2"
            class="faq-icon-container w-8 h-8 border-2 border-[#80db66] 
                   rounded-full flex items-center justify-center 
                   transition-all duration-300"
          >
            <svg
              id="faq-icon-2"
              class="w-4 h-4 text-[#80db66] transform transition-transform duration-300"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              viewBox="0 0 24 24"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <path d="M6 9l6 6 6-6"></path>
            </svg>
          </div>
        </button>
        <div id="faq-answer-2" class="faq-answer">
          <p class="text-xl font-normal text-[#e2ecf6]">
            We focus on personalized solutions, unique branding, and top-tier 
            client support. Our goal is to help your brand stand out in a crowded 
            market with designs that truly resonate with you.
          </p>
        </div>
      </div>

      <!-- FAQ #3 -->
      <div class="faq-item border-b border-[#e2ecf6]/30 pb-4">
        <button
          class="faq-btn flex justify-between items-center w-full px-2 py-3 
                 focus:outline-none transition-all duration-300"
          onclick="toggleFaq(3)"
        >
          <span class="text-2xl font-bold text-left text-[#e2ecf6]">
            How Much Does a Design Project Cost at Your Agency?
          </span>
          <div
            id="faq-icon-container-3"
            class="faq-icon-container w-8 h-8 border-2 border-[#80db66] 
                   rounded-full flex items-center justify-center 
                   transition-all duration-300"
          >
            <svg
              id="faq-icon-3"
              class="w-4 h-4 text-[#80db66] transform transition-transform duration-300"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              viewBox="0 0 24 24"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <path d="M6 9l6 6 6-6"></path>
            </svg>
          </div>
        </button>
        <div id="faq-answer-3" class="faq-answer">
          <p class="text-xl font-normal text-[#e2ecf6]">
            Pricing depends on factors like scope, complexity, and turnaround time.
            We typically provide custom quotes after discussing your project 
            requirements.
          </p>
        </div>
      </div>

      <!-- FAQ #4 -->
      <div class="faq-item border-b border-[#e2ecf6]/30 pb-4">
        <button
          class="faq-btn flex justify-between items-center w-full px-2 py-3 
                 focus:outline-none transition-all duration-300"
          onclick="toggleFaq(4)"
        >
          <span class="text-2xl font-bold text-left text-[#e2ecf6]">
            Is your agency start-up–friendly?
          </span>
          <div
            id="faq-icon-container-4"
            class="faq-icon-container w-8 h-8 border-2 border-[#80db66] 
                   rounded-full flex items-center justify-center 
                   transition-all duration-300"
          >
            <svg
              id="faq-icon-4"
              class="w-4 h-4 text-[#80db66] transform transition-transform duration-300"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              viewBox="0 0 24 24"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <path d="M6 9l6 6 6-6"></path>
            </svg>
          </div>
        </button>
        <div id="faq-answer-4" class="faq-answer">
          <p class="text-xl font-normal text-[#e2ecf6]">
            Absolutely! We love working with startups to develop strong brand 
            identities and creative strategies that help you grow quickly.
          </p>
        </div>
      </div>

      <!-- FAQ #5 -->
      <div class="faq-item border-b border-[#e2ecf6]/30 pb-4">
        <button
          class="faq-btn flex justify-between items-center w-full px-2 py-3 
                 focus:outline-none transition-all duration-300"
          onclick="toggleFaq(5)"
        >
          <span class="text-2xl font-bold text-left text-[#e2ecf6]">
            What design tools do you use?
          </span>
          <div
            id="faq-icon-container-5"
            class="faq-icon-container w-8 h-8 border-2 border-[#80db66] 
                   rounded-full flex items-center justify-center 
                   transition-all duration-300"
          >
            <svg
              id="faq-icon-5"
              class="w-4 h-4 text-[#80db66] transform transition-transform duration-300"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              viewBox="0 0 24 24"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <path d="M6 9l6 6 6-6"></path>
            </svg>
          </div>
        </button>
        <div id="faq-answer-5" class="faq-answer">
          <p class="text-xl font-normal text-[#e2ecf6]">
            Our go-to tools include Adobe Photoshop, Illustrator, Premiere Pro, 
            After Effects, Figma, and Canva for quick mockups.
          </p>
        </div>
      </div>

      <!-- FAQ #6 -->
      <div class="faq-item border-b border-[#e2ecf6]/30 pb-4">
        <button
          class="faq-btn flex justify-between items-center w-full px-2 py-3 
                 focus:outline-none transition-all duration-300"
          onclick="toggleFaq(6)"
        >
          <span class="text-2xl font-bold text-left text-[#e2ecf6]">
            Do you create WordPress e-commerce sites, and develop apps?
          </span>
          <div
            id="faq-icon-container-6"
            class="faq-icon-container w-8 h-8 border-2 border-[#80db66] 
                   rounded-full flex items-center justify-center 
                   transition-all duration-300"
          >
            <svg
              id="faq-icon-6"
              class="w-4 h-4 text-[#80db66] transform transition-transform duration-300"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              viewBox="0 0 24 24"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <path d="M6 9l6 6 6-6"></path>
            </svg>
          </div>
        </button>
        <div id="faq-answer-6" class="faq-answer">
          <p class="text-xl font-normal text-[#e2ecf6]">
            Yes, we offer WordPress e-commerce solutions. For more advanced app 
            development, we collaborate with trusted partners to ensure you get 
            the best possible outcome.
          </p>
        </div>
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
    function animateCounter(element, target, duration) {
        let start = 0;
        let step = Math.ceil(target / (duration / 10));
        let counter = setInterval(() => {
            start += step;
            if (start >= target) {
                start = target;
                clearInterval(counter);
            }
            element.textContent = start + "+";
        }, 30);
    }

    const orderNumber = document.querySelector(".order-number h2");
    const reviewNumber = document.querySelector(".review-number h2");
    const clientNumber = document.querySelector(".clients-number h2");
    const designNumber = document.querySelector(".designs-number h2");

    let isVisible = false;

    let observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !isVisible) {
                orderNumber.textContent = "0+";
                reviewNumber.textContent = "0+";
                clientNumber.textContent = "0+";
                designNumber.textContent = "0+";

                animateCounter(orderNumber, 250, 1000);
                animateCounter(reviewNumber, 120, 600);
                animateCounter(clientNumber, 300, 700);
                animateCounter(designNumber, 2000, 500); // **FASTER COUNTING**

                isVisible = true;
            } else if (!entry.isIntersecting) {
                isVisible = false;
            }
        });
    }, { threshold: 0.5 });

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
        const words = ["Content Creator", "Social Media Designer", "Freelancer", "Video Editor"];
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

    // Start with a slower fade/transition
    logoRows.forEach((row) => {
      row.style.opacity = "1";
      row.style.transform = "translateY(0px)";
      row.style.transition = "opacity 3s ease-out, transform 3s ease-out";
    });

    // Intersection Observer for fade-in/out on scroll
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          const { target, intersectionRatio } = entry;

          // Smoother fade-in & movement effect
          const opacity = Math.min(1, intersectionRatio * 1.5);
          const translateY = (1 - intersectionRatio) * 15;

          if (intersectionRatio > 0) {
            target.style.opacity = opacity;
            target.style.transform = `translateY(${translateY}px)`;
          } else {
            target.style.opacity = "1"; 
            target.style.transform = "translateY(0px)";
          }
        });
      },
      {
        threshold: Array.from({ length: 20 }, (_, i) => i * 0.05),
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

    document.addEventListener('DOMContentLoaded', function () {
        const serviceItems = document.querySelectorAll('.service-item');

        serviceItems.forEach(item => {
            item.addEventListener('click', function (e) {
                // Prevent any unintended propagation if needed
                e.stopPropagation();
                // Toggle the flipped class on a single tap/click
                this.classList.toggle('flipped');
            });
        });
    });

    function toggleFaq(num) {
    const answer = document.getElementById('faq-answer-' + num);
    const icon = document.getElementById('faq-icon-' + num);
    const iconContainer = document.getElementById('faq-icon-container-' + num);

    // Check if answer is currently closed
    if (!answer.classList.contains('open')) {
      // OPEN the FAQ
      answer.classList.add('open');
      icon.classList.add('rotate-180');
      // Fill the circle with #80db66, arrow becomes white
      iconContainer.classList.add('bg-[#80db66]', 'text-white');
      icon.classList.remove('text-[#80db66]');
      icon.classList.add('stroke-white');
    } else {
      // CLOSE the FAQ
      answer.classList.remove('open');
      icon.classList.remove('rotate-180');
      // Revert circle to border-only
      iconContainer.classList.remove('bg-[#80db66]', 'text-white');
      icon.classList.add('text-[#80db66]');
      icon.classList.remove('stroke-white');
    }
  }

  document.addEventListener("DOMContentLoaded", function() {
  // Select all your button elements
  const buttons = document.querySelectorAll('.custom-button, .custom-button-hero, .custom-button-about');
  
  // Log number of buttons found (for debugging)
  console.log("Found", buttons.length, "magnetic buttons");
  
  buttons.forEach(button => {
    // Magnetic effect on mousemove
    button.addEventListener('mousemove', function(e) {
      // Get the position relative to the button using offsetX/Y
      const x = e.offsetX;
      const y = e.offsetY;
      const rect = this.getBoundingClientRect();
      const centerX = rect.width / 2;
      const centerY = rect.height / 2;
      const dx = x - centerX;
      const dy = y - centerY;
      const distance = Math.sqrt(dx * dx + dy * dy);
      
      const maxRange = 150; // Range in pixels for the effect
      if (distance < maxRange) {
        // Force factor: stronger when closer
        const force = (maxRange - distance) / maxRange;
        // Apply a fraction of the offset (adjust divisor for effect strength)
        const translateX = (dx * force) / 10;
        const translateY = (dy * force) / 10;
        this.style.transform = `translate(${translateX}px, ${translateY}px)`;
      } else {
        this.style.transform = 'translate(0, 0)';
      }
    });
    
    // Reset transform when mouse leaves the button
    button.addEventListener('mouseleave', function() {
      this.style.transform = 'translate(0, 0)';
    });
  });
});



</script>

@endsection
