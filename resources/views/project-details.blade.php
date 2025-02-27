@extends('layouts.master')

@section('title', $folderName)

@section('main-container')

@php
    // Calculate the number of design images automatically.
    $designCount = count($imagePaths);
    // Manually inserted values (you can update these as needed)
    $workDuration = "3 months";
    $userSatisfaction = "95%";
    $introduction = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum. Cras venenatis euismod malesuada.";
    $clientReview = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin non magna at mauris congue accumsan sed non velit.";
    $workTimeline = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse malesuada lacus ex, sit amet blandit leo lobortis eget.";
@endphp

<style>
  /* Set default font color for the page */
  body, h1, h2, h3, p, span {
    color: #e2ecf6;
  }

  .project-container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
    text-align: center;
  }
  .project-header {
    margin-bottom: 20px;
  }
  .project-header h1 {
    font-size: 36px;
    margin-bottom: 10px;
  }
  .project-meta {
    font-size: 18px;
    margin-bottom: 20px;
  }
  .project-meta span {
    margin: 0 10px;
  }

  /* Automatic horizontal scrolling gallery */
  .gallery-container {
    position: relative;
    overflow: hidden;
    width: 100%;
    margin: 30px 0;
  }
  .gallery {
    display: flex;
    gap: 10px;
    animation: scrollGallery 20s linear infinite;
  }
  .gallery img {
    width: 250px; /* Bigger images */
    height: 250px;
    object-fit: cover;
    border-radius: 5px;
  }
  @keyframes scrollGallery {
    0% {
      transform: translateX(0);
    }
    100% {
      transform: translateX(-50%);
    }
  }
  .section {
    margin: 30px 0;
    text-align: left;
  }
  .section h2 {
    font-size: 24px;
    margin-bottom: 10px;
    border-bottom: 2px solid #e2ecf6;
    padding-bottom: 5px;
  }
  .section p {
    font-size: 16px;
    line-height: 1.5;
  }
</style>

<div class="project-container">
  <!-- 1. Project Name at the Top -->
  <div class="project-header">
    <h1>{{ $folderName }}</h1>
    <!-- 2. Meta Information -->
    <div class="project-meta">
      <span>Design Images: {{ $designCount }}</span>
      <span>Work Duration: {{ $workDuration }}</span>
      <span>User Satisfaction: {{ $userSatisfaction }}</span>
    </div>
  </div>

  <!-- 3. Automatic Scrolling Gallery (Bigger Images) -->
  <div class="gallery-container">
    <div class="gallery">
      @foreach($imagePaths as $image)
        <img src="{{ asset($image) }}" alt="Project Image">
      @endforeach
      <!-- Duplicate images for a seamless scroll effect -->
      @foreach($imagePaths as $image)
        <img src="{{ asset($image) }}" alt="Project Image">
      @endforeach
    </div>
  </div>

  <!-- 4. Project Introduction -->
  <div class="section project-introduction">
    <h2>Introduction</h2>
    <p>{{ $introduction }}</p>
  </div>

  <!-- 5. Client Review Message -->
  <div class="section client-review">
    <h2>Client Review Message</h2>
    <p>{{ $clientReview }}</p>
  </div>

  <!-- 6. Work Timeline -->
  <div class="section work-timeline">
    <h2>Work Timeline</h2>
    <p>{{ $workTimeline }}</p>
  </div>
</div>

@endsection
