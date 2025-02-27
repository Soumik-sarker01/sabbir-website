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
  }
  /* Sidebar: Sticky and scrollable */
  .sidebar {
    width: 220px;
    flex-shrink: 0;
    padding: 15px;
    border-radius: 6px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 20px;
    max-height: 600px;
    overflow-y: auto;
  }
  .sidebar ul {
    list-style: none;
    padding-left: 0;
    margin: 0;
  }
  .sidebar li {
    margin-bottom: 8px;
  }
  /* Filter buttons */
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
  /* Highlight the active filter */
  .active-tagline {
    background: #80db66 !important;
    color: #25262f !important;
  }
  /* Projects grid: 3 projects per row */
  .projects-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    width: 100%;
  }
  .project-card {
    text-decoration: none;
    color: inherit;
    border-radius: 10px;
    overflow: hidden;
  }
  /* Image container with hover zoom */
  .image-container {
    position: relative;
    height: 450px;
    overflow: hidden;
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
  /* Overlay with project name */
  .overlay {
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(255, 255, 255, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
  }
  .project-card:hover .overlay {
    opacity: 1;
  }
  .overlay-title {
    font-size: 18px;
    font-weight: bold;
    color: #000;
  }
  /* Tagline styling */
  .project-tagline {
    font-size: 14px;
    color: #e2ecf6;
    display: inline-block;
    padding: 2px 6px;
    border-radius: 6px;
    font-weight: 600;
    margin-top: 5px;
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
</style>

<h2 style="text-align: center; margin-bottom: 20px;">Our Projects</h2>

<div class="main-content">
  <!-- LEFT SIDEBAR: Tagline Filter Menu -->
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
        // Find matching color or fallback
        $tagColor = '#1976d2';
        foreach ($tagColors as $keyword => $color) {
          if (stripos($project['tagline'], $keyword) !== false) {
            $tagColor = $color;
            break;
          }
        }
      @endphp

      <a href="{{ route('projects.show', $project['slug']) }}" class="project-card">
        <div class="image-container">
          <img src="{{ asset($project['thumbnail']) }}" alt="{{ $project['name'] }}">
          <div class="overlay">
            <div class="overlay-title">{{ $project['name'] }}</div>
          </div>
        </div>
        <div class="project-details" style="margin-top: 5px;">
          <div class="project-tagline" style="background: {{ $tagColor }};">
            {{ $project['tagline'] }}
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
