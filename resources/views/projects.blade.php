@extends('layouts.master')

@section('title', 'Projects')

@section('main-container')

@php
// Use the complete list of taglines passed from the controller
$uniqueTaglines = $allUniqueTaglines;

// Define tagline color mapping
$tagColors = [
    'Financial' => '#1976d2',
    'Legal' => '#c62828',
    'Marketing' => '#0277bd',
    'Healthcare' => '#f57c00',
    'Sports' => '#6a1b9a',
    'Creative' => '#00838f',
    'Business' => '#e65100',
    'Tech' => '#2e7d32',
    'Technology & IT Services' => '#0069c0',
    'Travel' => '#7b1fa2',
    'Real Estate' => '#d84315',
    'Fashion' => '#ad1457',
    'Food' => '#1b5e20',
    'Manufacturing' => '#616161',
    'Telecom' => '#00695c',
    'Community' => '#880e4f',
];
@endphp

{{-- 1) Import Playfair Display Italic from Google Fonts --}}
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">

<style>
    /* Hide the default cursor and use your custom PNG instead */
    body {
        cursor: url("{{ asset('assets/img/cursor.svg') }}") 3 3, auto;
    }

    /* Header background rectangle with video */
    .header-bg-rect {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 475px;
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

    /* Spacer to push content below the header video */
    .spacer {
        height: 600px;
    }

    /* Main layout: Sidebar on left, projects on right. */
    .main-content {
        display: flex;
        gap: 80px;
        margin: 0 auto 50px;
        max-width: 90%;
        /* Large-screen padding: top/bottom = 20, left/right = 250 */
        padding: 20px 250px;
        box-sizing: border-box;
        justify-content: center;
    }

    /* Sidebar: Sticky and scrollable with right border */
    .sidebar {
        width: 300px;
        flex-shrink: 0;
        padding: 15px;
        border-radius: 6px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        position: sticky;
        top: 20px;
        max-height: 600px;
        overflow-y: auto;
        border-right: 3px solid #80db66;
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .sidebar::-webkit-scrollbar {
        display: none;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar li {
        margin-bottom: 8px;
    }

    .filter-button {
        color: #fff;
        border: none;
        padding: 10px 14px;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        text-align: left;
        font-size: 18px;
        text-decoration: none;
        display: block;
    }

    .filter-button:hover {
        background: #1565c0;
    }

    .active-tagline {
        background: #80db66 !important;
        color: #25262f !important;
    }

    /* Mobile Dropdown (hidden on larger screens) */
    .mobile-dropdown {
        display: none;
        max-width: 300px;
        margin: 20px auto;
        z-index: 10;
    }

    .mobile-dropdown select {
        width: 100%;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #ccc;
        font-size: 16px;
    }

    /* Projects container using grid layout (two columns) */
    .projects-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 80px;
        justify-items: center;
    }

    /* Project card styling with fixed width on large screens */
    .project-card {
        text-decoration: none;
        color: inherit;
        border-radius: 10px;
        overflow: hidden;
        width: 500px;
        display: flex;
        flex-direction: column;
    }

    /* Card content container */
    .card-content {
        display: flex;
        flex-direction: column;
    }

    /* Image container with fixed aspect ratio */
    .image-container {
        position: relative;
        width: 100%;
        aspect-ratio: 1/1;
        overflow: hidden;
        border-radius: 8px;
    }

    .project-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease-in-out;
    }

    .project-card:hover img {
        transform: scale(1.05);
    }

    /* Project details styling */
    .project-details {
        margin-top: 5px;
        padding: 10px;
        text-align: left;
    }

    .project-name {
        font-size: 28px;
        font-weight: bold;
        color: #e2ecf6;
        margin-bottom: 5px;
    }

    .project-tagline {
        font-size: 14px;
        color: #e2ecf6;
        display: inline-block;
        padding: 2px 6px;
        border-radius: 6px;
        font-weight: 600;
        margin-top: 5px;
        text-align: center;
        width: 100px;
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

    /* Responsive adjustments */
    @media (max-width: 1483px) and (min-width: 1200px) {
        .main-content {
            /* Decrease left/right padding */
            padding: 20px 120px;
            gap: 40px;
        }
    }

    @media (max-width: 1199px) {
        .main-content {
            padding: 20px 80px;
        }
    }

    @media (max-width: 1199px) and (min-width: 600px) {
        .sidebar {
            width: clamp(200px, calc(((100vw - 600px) / 6) + 200px), 300px);
        }
        .project-card {
            width: clamp(300px, calc(((100vw - 600px) / 3) + 300px), 500px);
        }
        .projects-container {
            grid-template-columns: repeat(2, auto);
        }
    }

    @media (max-width: 1199px) and (min-width: 992px) {
        .filter-button {
            font-size: 16px;
        }
        .project-name {
            font-size: 26px;
        }
        .project-tagline {
            font-size: 13px;
        }
    }

    @media (max-width: 991px) {
        .main-content {
            flex-direction: column;
            padding: 20px;
            margin: 30px auto 50px;
        }
        .sidebar {
            display: none;
        }
        .mobile-dropdown {
            display: block;
        }
        .project-name {
            font-size: 26px;
        }
        .project-tagline {
            font-size: 13px;
        }
    }

    @media (max-width: 599px) {
        .project-card {
            width: 300px;
        }
        .projects-container {
            grid-template-columns: 1fr;
            gap: 20px;
        }
    }

    @media (max-width: 480px) {
        .projects-container {
            gap: 20px;
            padding: 0 10px;
        }
        .project-name {
            font-size: 24px;
        }
        .project-tagline {
            font-size: 12px;
            padding: 2px 4px;
        }
    }

    /* HEADER TEXT: Use Playfair Display Italic and remove hover effect */
    .header-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        width: 100%;
    }

    /* 2) Apply the imported font and italic style */
    .header-text h1,
    .header-text h2 {
        font-family: 'Playfair Display', serif;
        font-style: italic;
        margin: 0;
        color: #e2ecf6;
    }

    /* Remove any hover effect if present (override global or default) */
    .header-text h1:hover,
    .header-text h2:hover {
        color: #e2ecf6 !important;
        text-decoration: none !important;
        cursor: default !important;
    }

    /* Font sizes */
    .header-text h1 {
        font-size: 50px;
    }

    .header-text h2 {
        font-size: 45px;
        font-weight: bold;
    }
</style>

<!-- Header background rectangle with video -->
<div class="header-bg-rect">
    <video autoplay loop muted playsinline class="bg-video">
        <source src="{{ asset('assets/video/project_detail_bg.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="video-overlay"></div>
    <div class="header-text">
        <!-- 1) No hover effect on this text, 2) Using Playfair Display Italic -->
        <h1>I Turn Great Ideas Into</h1>
        <h2>Excellent Designs</h2>
    </div>
</div>

<!-- Spacer to ensure content starts below header -->
<div class="spacer"></div>

<!-- Mobile Dropdown for Tagline Selection (visible on mobile only) -->
<div class="mobile-dropdown">
    <select id="taglineDropdown" onchange="if(this.value) window.location.href=this.value;">
        <option value="{{ route('projects.index') }}" @if($selectedTagline==='all') selected @endif>All</option>
        @foreach($uniqueTaglines as $tagline)
            <option value="{{ route('projects.index', ['tagline' => $tagline]) }}" @if($selectedTagline===$tagline) selected @endif>
                {{ $tagline }}
            </option>
        @endforeach
    </select>
</div>

<div class="main-content">
    <!-- LEFT SIDEBAR: Tagline Filter Menu (visible on desktop only) -->
    <div class="sidebar">
        <ul>
            <li>
                <a href="{{ route('projects.index') }}" class="filter-button @if($selectedTagline === 'all') active-tagline @endif">
                    All
                </a>
            </li>
            @foreach($uniqueTaglines as $tagline)
            <li>
                <a href="{{ route('projects.index', ['tagline' => $tagline]) }}" class="filter-button @if($selectedTagline === $tagline) active-tagline @endif">
                    {{ $tagline }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>

    <!-- RIGHT SIDE: Projects Container -->
    <div class="projects-container">
        @foreach($projectsPaginated as $project)
            @php
                $tagColor = '#1976d2';
                foreach ($tagColors as $keyword => $color) {
                    if (stripos($project['tagline'], $keyword) !== false) {
                        $tagColor = $color;
                        break;
                    }
                }
            @endphp

            <a href="{{ route('projects.show', $project['slug']) }}" class="project-card">
                <div class="card-content">
                    <div class="image-container">
                        <img src="{{ asset($project['thumbnail']) }}" alt="{{ $project['name'] }}">
                    </div>
                    <div class="project-details">
                        <div class="project-name">
                            {{ $project['name'] }}
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

<!-- Pagination Links -->
<div class="pagination">
    {{ $projectsPaginated->links('vendor.pagination.custom') }}
</div>

@endsection
