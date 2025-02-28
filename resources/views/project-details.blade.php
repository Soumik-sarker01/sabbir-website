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
  /* Main Project Container */
  .project-wrapper {
    width: 85%;
    max-width: 1200px;
    margin: 50px auto;
    color: #25262f;
    text-align: center;
    position: relative;
    overflow: hidden;
  }
  /* Project Title */
  .project-title {
    color: #e2ecf6;
    font-size: 2.75rem;
    font-weight: 700;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 2px;
  }
  /* Stats Row */
  .stats-row {
    display: flex;
    justify-content: center;
    gap: 70px;
    margin-bottom: 120px; /* extra space for gallery overlap */
    position: relative;
    z-index: 2; /* Ensure stats row is on top */
  }
  .stat-col {
    background: rgba(255,255,255,0.8);
    border-radius: 12px;
    padding: 15px 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    transition: transform 0.3s;
  }
  .stat-col:hover {
    transform: translateY(-5px);
  }
  .stat-title {
    font-size: 1.1rem;
    font-weight: bold;
    margin-bottom: 8px;
  }
  .stat-value {
    font-size: 1.5rem;
    font-weight: 600;
    color: #4a90e2;
  }
  /* Gallery Window */
  .gallery-window {
    width: 1050px;
    height: 320px;
    overflow: hidden;
    margin: -60px auto 40px; /* adjust negative margin as needed */
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    position: relative;
    z-index: 1; /* Place behind the stats row */
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
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
  }
  /* Project Description */
  #project-description {
    font-size: 3.1rem;
    line-height: 1.8;
    overflow: hidden;
    color: #e2ecf6;
  }
  /* Reviews Section - Bigger and More Professional */
  #reviews-section {
    padding: 40px;
    border-radius: 15px;
    margin-bottom: 40px;
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
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    transition: transform 0.3s, box-shadow 0.3s;
    background: #fff;
  }
  #reviews-section .card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.2);
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
  /* Work Timeline Section - Improved Horizontal Layout */
  #work-timeline {
    padding: 30px;
    border-radius: 15px;
    margin-bottom: 40px;
    position: relative;
    overflow-x: auto;
  }
  #work-timeline h2 {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 30px;
    color: #e2ecf6;
  }
  .timeline-container {
    position: relative;
    display: flex;
    gap: 40px;
    padding: 20px 0;
    align-items: stretch;
  }
  /* Connecting line behind timeline items */
  .timeline-container::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 4px;
    z-index: 1;
    border-radius: 2px;
  }
  .timeline-item {
    position: relative;
    background: #fff;
    border-radius: 10px;
    padding: 30px;
    min-width: 300px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    z-index: 2;
    transition: transform 0.3s, box-shadow 0.3s;
    text-align: left;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  .timeline-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  }
  /* Bullet marker on the connecting line */
  .timeline-item::before {
    content: "";
    position: absolute;
    top: 50%;
    left: -30px;
    transform: translate(-50%, -50%);
    width: 20px;
    height: 20px;
    background: #4a90e2;
    border: 4px solid #fff;
    border-radius: 50%;
    z-index: 3;
  }
  .timeline-item h3 {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 15px;
    color: #4a90e2;
  }
  .timeline-item p {
    font-size: 1rem;
    color: #555;
    line-height: 1.6;
  }
</style>

<div class="project-wrapper">
  <!-- Project Name -->
  <h1 class="project-title">{{ $folderName }}</h1>

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

  <!-- Project Description Section -->
  <div id="project-description" class="p-5 mb-10">
    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
      Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
      dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
      Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
      dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
      Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
      dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
      Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
      dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
      Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
      dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
  </div>

  <!-- Reviews Section (Bigger & More Professional) -->
  <div id="reviews-section" class="mb-10">
    <h2 class="text-center">Reviews</h2>
    <div id="reviewsCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
         <div class="carousel-item active">
            <div class="card mx-auto">
              <div class="card-body">
                <h5 class="card-title">John Doe</h5>
                <p class="card-text">Great work, highly recommended! Truly a game-changer for my project. The creativity and attention to detail exceeded my expectations.</p>
              </div>
            </div>
         </div>
         <div class="carousel-item">
            <div class="card mx-auto">
              <div class="card-body">
                <h5 class="card-title">Jane Smith</h5>
                <p class="card-text">Professional and on-time delivery. The design is sleek, modern, and delivered with a personal touch that made all the difference.</p>
              </div>
            </div>
         </div>
         <div class="carousel-item">
            <div class="card mx-auto">
              <div class="card-body">
                <h5 class="card-title">Alice Johnson</h5>
                <p class="card-text">Exceptional quality and attention to detail. The project was handled with utmost professionalism, and the results speak for themselves.</p>
              </div>
            </div>
         </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#reviewsCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#reviewsCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>

  <!-- Work Timeline Section (Horizontal Layout with Enhanced Visuals) -->
  <div id="work-timeline" class="mb-10">
    <h2 class="text-center">Work Timeline</h2>
    <div class="timeline-container mx-auto">
      <div class="timeline-item" data-week="1">
         <h3>Week 1</h3>
         <p>
           Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vehicula, libero ut imperdiet gravida, neque odio bibendum libero, 
           vitae gravida metus ipsum at sapien. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
         </p>
      </div>
      <div class="timeline-item" data-week="2">
         <h3>Week 2</h3>
         <p>
           Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo 
           inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
         </p>
      </div>
      <div class="timeline-item" data-week="3">
         <h3>Week 3</h3>
         <p>
           Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem 
           sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.
         </p>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript for Interactive Effects -->
<script>
  // Count-up effect for stats when the stats row comes into view
  document.addEventListener('DOMContentLoaded', function(){
    const stats = document.querySelectorAll('.stat-value[data-target]');
    const observerOptions = { threshold: 0.5 };
    let observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if(entry.isIntersecting){
          stats.forEach(stat => {
            let target = parseFloat(stat.getAttribute('data-target'));
            if (!isNaN(target)) {
              let count = 0;
              const duration = 2000;
              const stepTime = Math.abs(Math.floor(duration / target));
              let counter = setInterval(() => {
                count++;
                stat.innerText = stat.getAttribute('data-target').includes('%') ? count + '%' : count;
                if(count >= target){
                  clearInterval(counter);
                }
              }, stepTime);
            }
          });
        }
      });
    }, observerOptions);
    document.querySelectorAll('.stats-row').forEach((el) => {
      observer.observe(el);
    });
  });

  // Project Description Scroll Text Effect
  function animateText(element){
    if(element.getAttribute('data-animated')) return;
    const text = element.innerText;
    element.innerHTML = "";
    for(let char of text){
      let span = document.createElement('span');
      span.innerText = char;
      span.style.opacity = 0;
      element.appendChild(span);
    }
    element.setAttribute('data-animated', 'true');
    const spans = element.querySelectorAll('span');
    let index = 0;
    let interval = setInterval(() => {
       if(index < spans.length){
         spans[index].style.transition = "opacity 0.3s";
         spans[index].style.opacity = 1;
         index++;
       } else {
         clearInterval(interval);
       }
    }, 50);
  }
  document.addEventListener('scroll', function(){
    const desc = document.getElementById('project-description');
    const rect = desc.getBoundingClientRect();
    if(rect.top < window.innerHeight && rect.bottom > 0){
      animateText(desc);
    }
  });

  // Work Timeline Animation – sequentially show each timeline item then reset
  function animateTimeline(){
    const items = document.querySelectorAll('.timeline-item');
    let index = 0;
    items.forEach(item => {
      item.style.opacity = 0;
      item.style.transform = "translateY(20px)";
    });
    function showNext(){
      if(index < items.length){
        items[index].style.transition = "all 0.5s";
        items[index].style.opacity = 1;
        items[index].style.transform = "translateY(0)";
        index++;
        setTimeout(showNext, 1000);
      } else {
        setTimeout(() => {
          items.forEach(item => {
            item.style.opacity = 0;
            item.style.transform = "translateY(20px)";
          });
          index = 0;
          setTimeout(showNext, 1000);
        }, 2000);
      }
    }
    showNext();
  }
  document.addEventListener('DOMContentLoaded', animateTimeline);
</script>
@endsection
