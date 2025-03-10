@extends('layouts.master')

@section('title', $folderName)

@section('main-container')
@php
// Count the number of design images automatically
$designCount = count($imagePaths);

// Manually inserted values (update as needed)
$workDuration = "3 months";
$userSatisfaction = "95%";
@endphp

<!-- Custom styles -->
<style>
    /* Global Background & Font */
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* Project Wrapper with added gap before header and after footer */
    .project-wrapper {
        width: 85%;
        max-width: 1200px;
        margin: 250px auto;
        color: #25262f;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    /* Header background rectangle with video */
    .header-bg-rect {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 580px;
        background: #333;
        z-index: 0;
        border-bottom-left-radius: 50px;
        border-bottom-right-radius: 50px;
        overflow: hidden;
    }

    /* Background video styling */
    .bg-video {
        position: absolute;
        top: 50%;
        left: 50%;
        min-width: 100%;
        min-height: 100%;
        transform: translate(-50%, -50%) scale(0.5);
        object-fit: cover;
    }

    /* Transparent overlay for video */
    .video-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
    }

    /* Stats Row */
    .stats-row {
        display: flex;
        justify-content: center;
        gap: 70px;
        margin-bottom: 120px;
        position: relative;
        z-index: 2;
    }

    .stat-col {
        border-radius: 12px;
        padding: 15px 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s;
    }

    .stat-col:hover {
        transform: translateY(-5px);
    }

    .stat-title {
        font-size: 2.1rem;
        font-weight: bold;
        margin-bottom: 8px;
        color: #e2ecf6;
    }

    .stat-value {
        font-size: 1.8rem;
        font-weight: 600;
        color: #80db66;
    }

    /* Gallery Window */
    .gallery-window {
        width: 1050px;
        height: 320px;
        overflow: hidden;
        margin: -60px auto 40px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        position: relative;
        border-radius: 30px;
        z-index: 1;
    }

    /* Decorative border on gallery window */
    .gallery-window::before {
        content: "";
        position: absolute;
        top: -10px;
        left: -10px;
        right: -10px;
        bottom: -10px;
        border: 2px dashed #e2ecf6;
        border-radius: 15px;
        pointer-events: none;
        animation: borderAnimation 4s linear infinite;
    }

    @keyframes borderAnimation {
        0% {
            border-color: #e2ecf6;
        }

        50% {
            border-color: #80db66;
        }

        100% {
            border-color: #e2ecf6;
        }
    }

    .gallery-inner {
        display: flex;
        gap: 10px;
        animation: scrollGallery 20s linear infinite;
    }

    .gallery-inner img {
        width: 320px;
        height: 320px;
        object-fit: cover;
        border-radius: 10px;
        transition: transform 0.3s;
    }

    .gallery-inner img:hover {
        transform: scale(1.05);
    }

    @keyframes scrollGallery {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    /* Project Header */
    .project-header {
        color: #e2ecf6;
        font-size: 3.1rem;
        font-weight: bold;
        margin-bottom: 20px;
        letter-spacing: 2px;
    }

    /* Project Description (typing effect) */
    #project-description {
        font-size: 2.75rem;
        line-height: 1.8;
        overflow: hidden;
        color: #e2ecf6;
        margin-bottom: 70px;
    }

    /* Typing effect for paragraph text only */
    #description-text span {
        color: rgba(226, 236, 246, 0.3);
        transition: color 0.3s ease, text-shadow 0.3s ease;
    }

    #description-text span.active {
        color: #e2ecf6;
    }

    /* Reviews Section */
    #reviews-section {
        padding: 40px;
        border-radius: 15px;
        margin-bottom: 40px;
    }

    .review-header {
        color: #e2ecf6;
        font-size: 3.1rem;
        font-weight: bold;
        margin-bottom: 20px;
        letter-spacing: 2px;
    }

    #reviews-section h2 {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 30px;
        color: #e2ecf6;
    }

    #reviews-section .carousel-item {
        display: flex;
        justify-content: center;
    }

    #reviews-section .card {
        width: 400px;
        border: none;
        border-radius: 15px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s, box-shadow 0.3s;
        background: #fff;
    }

    #reviews-section .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    }

    #reviews-section .card-body {
        padding: 30px;
    }

    #reviews-section .card-title {
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: #4a90e2;
    }

    #reviews-section .card-text {
        font-size: 1rem;
        color: #555;
    }

    /* Pagination styling */
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination .page-link {
        background: #e2ecf6;
        color: #25262f;
        border: 1px solid #e2ecf6;
        padding: 8px 16px;
        margin: 0 5px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
    }

    .pagination .page-link:hover {
        background: #d1e5d0;
        color: #25262f;
    }

    .pagination .active .page-link {
        background: #80db66;
        color: #25262f;
        border-color: #80db66;
    }

    /* ========== Responsive Styles ========== */

    /* For tablets (max-width: 992px) */
    @media (max-width: 992px) {
        .gallery-window {
            width: 90%;
            height: auto;
        }

        .gallery-inner img {
            width: 100%;
            height: auto;
        }

        .stat-title {
            font-size: 1.8rem;
        }

        .stat-value {
            font-size: 1.5rem;
        }
    }

    /* For mobile devices (max-width: 768px) */
    @media (max-width: 768px) {
        .main-content {
            flex-direction: column;
        }

        .sidebar {
            width: 100%;
            max-height: none;
            position: static;
            margin-bottom: 20px;
        }

        .sidebar ul {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }

        .projects-container {
            grid-template-columns: 1fr;
        }

        /* Stat row vertical stacking */
        .stats-row {
            flex-direction: column;
            gap: 15px;
        }

        .stat-title {
            font-size: 1.5rem;
        }

        .stat-value {
            font-size: 1.3rem;
        }

        /* Reduce project description font size for mobile view */
        #project-description {
            font-size: 2rem;
            line-height: 1.6;
        }
    }

    /* Hide the default cursor and use your custom PNG instead */
    body {
        cursor: url("{{ asset('assets/img/cursor.svg') }}") 3 3,
        auto;
    }

</style>

<!-- Header background rectangle with video -->
<div class="header-bg-rect">
    <video autoplay loop muted playsinline class="bg-video">
        <source src="{{ asset('assets/video/project_detail_bg.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="video-overlay"></div>
</div>

<div class="project-wrapper">
    <!-- Stats Row -->
    <div class="stats-row">
        <div class="stat-col">
            <div class="stat-title">Design Images</div>
            <div class="stat-value" data-target="{{ $designCount }}">{{ $designCount }}</div>
        </div>
        <div class="stat-col">
            <div class="stat-title">Work Duration</div>
            <div class="stat-value">{{ $workDuration }}</div>
        </div>
        <div class="stat-col">
            <div class="stat-title">User Satisfaction</div>
            <div class="stat-value" data-target="95">{{ $userSatisfaction }}</div>
        </div>
    </div>

    <!-- Gallery Window -->
    <div class="gallery-window">
        <div class="gallery-inner">
            @foreach($imagePaths as $image)
            <img src="{{ asset($image) }}" alt="Project Image">
            @endforeach
            <!-- Duplicate images for seamless scroll -->
            @foreach($imagePaths as $image)
            <img src="{{ asset($image) }}" alt="Project Image">
            @endforeach
        </div>
    </div>

    <!-- Project Description Section with Typing Effect Loop -->
    <div id="project-description" class="p-5 mb-10">
        <h2 class="project-header">Project Description</h2>
        <p id="description-text">
            {{ $description }}
        </p>
    </div>

    <h2 class="review-header">Client Review</h2>
    <div class="testimonial">
        <div class="testimonial-info">
            <h2 class="testimonial-name">{{ $clientName }}</h2>
            <div class="testimonial-stars">{{ $rating }}</div>
        </div>
        <div class="testimonial-text">
            <p>{{ $review }}</p>
        </div>
    </div>
</div>

<!-- JavaScript for Interactive Effects -->
<script>
    // Count-up effect for stats when the stats row comes into view
    document.addEventListener('DOMContentLoaded', function () {
        const stats = document.querySelectorAll('.stat-value[data-target]');
        const observerOptions = {
            threshold: 0.5
        };
        let observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    stats.forEach(stat => {
                        let target = parseFloat(stat.getAttribute('data-target'));
                        if (!isNaN(target)) {
                            let count = 0;
                            const duration = 2000;
                            const stepTime = Math.abs(Math.floor(duration / target));
                            let counter = setInterval(() => {
                                count++;
                                stat.innerText = stat.getAttribute(
                                        'data-target').includes('%') ? count +
                                    '%' : count;
                                if (count >= target) clearInterval(counter);
                            }, stepTime);
                        }
                    });
                }
            });
        }, observerOptions);
        document.querySelectorAll('.stats-row').forEach((el) => observer.observe(el));
    });

    // Typing Effect: Only animate the paragraph text (not the h2)
    document.addEventListener('DOMContentLoaded', function () {
        const desc = document.getElementById('description-text');
        if (!desc) return;

        // Store the original text so we can re-type it in a loop
        const originalText = desc.innerText;

        // Clear the text initially
        desc.innerHTML = "";

        // IntersectionObserver to trigger the typing loop when #description-text is visible
        let triggered = false;
        const observerOptions = {
            threshold: 0.5
        };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !triggered) {
                    triggered = true;
                    startTypingLoop();
                }
            });
        }, observerOptions);
        observer.observe(desc);

        // Function to type text then restart after a pause
        function startTypingLoop() {
            typeText(() => {
                setTimeout(() => {
                    desc.innerHTML = "";
                    startTypingLoop();
                }, 2000);
            });
        }

        // Helper: type each character
        function typeText(onComplete) {
            desc.innerHTML = "";
            for (let char of originalText) {
                let span = document.createElement('span');
                span.innerText = char;
                desc.appendChild(span);
            }
            const spans = desc.querySelectorAll('span');
            let index = 0;
            let interval = setInterval(() => {
                if (index < spans.length) {
                    spans[index].classList.add('active');
                    index++;
                } else {
                    clearInterval(interval);
                    if (typeof onComplete === 'function') onComplete();
                }
            }, 25);
        }
    });

</script>
@endsection
