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

<style>
  /* Main layout: Sidebar on left, projects on right */
  .main-content {
    display: flex;
    gap: 30px;
    margin: 50px auto;
    max-width: 90%;
    padding: 20px 250px;
  }
  /* Sidebar: Sticky and scrollable with right border */
  .sidebar {
    width: 220px;
    flex-shrink: 0;
    padding: 15px;
    border-radius: 6px;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
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
    padding: 6px 12px;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
    text-align: left;
    font-size: 14px;
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
    margin: 20px auto;
    max-width: 300px;
  }
  .mobile-dropdown select {
    width: 100%;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ccc;
    font-size: 16px;
  }

  /* Projects grid:
     Base: 1 column (for laptop/smaller screens)
     Desktop (min-width: 992px): 2 columns */
  .projects-container {
    display: grid;
    grid-template-columns: 1fr;
    gap: 30px;
    width: 100%;
  }
  @media (min-width: 992px) {
    .projects-container {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  /* Project card styling */
  .project-card {
    text-decoration: none;
    color: inherit;
    border-radius: 10px;
    overflow: hidden;
    width: 100%;
    max-width: 450px;
    margin: auto;
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
    text-align: center;
  }
  .project-name {
    font-size: 18px;
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

  /* Responsive adjustments for smaller devices */
  @media (max-width: 991px) {
    .main-content {
      flex-direction: column;
      padding: 20px;
      margin: 30px auto;
    }
    /* Hide sidebar in mobile view */
    .sidebar {
      display: none;
    }
    /* Show dropdown in mobile view */
    .mobile-dropdown {
      display: block;
    }
    .project-name {
      font-size: 16px;
    }
    .project-tagline {
      font-size: 13px;
    }
  }
  @media (max-width: 480px) {
    .projects-container {
      gap: 20px;
      padding: 0 10px;
    }
    .project-name {
      font-size: 14px;
    }
    .project-tagline {
      font-size: 12px;
      padding: 2px 4px;
    }
  }
</style>

<h2 style="text-align: center; margin-bottom: 20px;">Our Projects</h2>

<!-- Mobile Dropdown for Tagline Selection (visible on mobile only) -->
<div class="mobile-dropdown">
  <select id="taglineDropdown" onchange="if(this.value) window.location.href=this.value;">
    <option value="{{ route('projects.index') }}" @if($selectedTagline === 'all') selected @endif>All</option>
    @foreach($uniqueTaglines as $tagline)
      <option value="{{ route('projects.index', ['tagline' => $tagline]) }}" @if($selectedTagline === $tagline) selected @endif>
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

  <!-- RIGHT SIDE: Projects Grid -->
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
            <div class="project-tagline" style="background: {{ $tagColor }};">
              {{ $project['tagline'] }}
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
