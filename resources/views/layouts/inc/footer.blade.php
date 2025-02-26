<!-- Include Bootstrap CSS (CDN example) -->
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
/>
<!-- Include Font Awesome for icons (CDN example) -->
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
/>

<!-- Custom Styles to Increase Font Sizes and Section Size -->
<style>
  /* Increase the overall contact section size (footer) */
  .contact-section {
    padding: 200px 0; /* Increased vertical padding */
  }

  /* Larger main heading */
  .contact-section h1 {
    font-size: 45px;
    font-family: 'plus-jakarta-sans';
    color: #25262f;
  }

  /* Increase font size for form labels */
  .contact-section .form-label {
    font-size: 1.6rem;
    color: #25262f;
  }

  /* Increase font size for input fields and textarea */
  .contact-section .form-control {
    font-size: 1.5rem;
    color: #25262f;
    padding: 1.2rem;
  }

  /* Increase font size for the button and add larger padding */
  .contact-section button {
    font-size: 1.6rem;
    padding: 1.4rem 2.2rem;
    background-color: #80db66;
    color: #25262f;
    border: none;
  }

  /* Increase card headings and text in contact info cards */
  .contact-section h5 {
    font-size: 2rem;
    color: #25262f;
  }

  .contact-section p,
  .contact-section a {
    font-size: 1.5rem;
    color: #25262f;
  }
</style>

<!-- Contact Section with #e2ecf6 background -->
<div class="py-5 contact-section" style="background-color: #e2ecf6;">
  <div class="container-xxl">
    <!-- Main Heading -->
    <h3 class="display-5 fw-bold mb-4" style="font-family: 'plus-jakarta-sans', sans-serif;">
      Let's <span style="color: #80db66;">Discuss</span>
    </h3>
    <div class="row align-items-start g-5">
      <!-- Left Column: Contact Form -->
      <div class="col-12 col-lg-7">
        <div class="card border-0 p-4" style="background-color: #fff;">
          <form>
            <!-- Name & Email Row -->
            <div class="row g-3 mb-3">
              <div class="col-md-6">
                <label for="name" class="form-label fw-semibold">Name</label>
                <input
                  type="text"
                  class="form-control form-control-lg"
                  id="name"
                  name="name"
                  placeholder="Enter your name"
                  required
                />
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input
                  type="email"
                  class="form-control form-control-lg"
                  id="email"
                  name="email"
                  placeholder="Enter your email"
                  required
                />
              </div>
            </div>
            <!-- Subject -->
            <div class="mb-3">
              <label for="subject" class="form-label fw-semibold">Subject</label>
              <input
                type="text"
                class="form-control form-control-lg"
                id="subject"
                name="subject"
                placeholder="Subject"
                required
              />
            </div>
            <!-- Message -->
            <div class="mb-3">
              <label for="message" class="form-label fw-semibold">Message</label>
              <textarea
                class="form-control form-control-lg"
                id="message"
                name="message"
                rows="4"
                placeholder="Write your message here..."
                required
              ></textarea>
            </div>
            <!-- Send Message Button -->
            <button type="submit" class="btn fw-bold mt-2">
              SEND MESSAGE
            </button>
          </form>
        </div>
      </div>

      <!-- Right Column: Contact Info Cards -->
      <div class="col-12 col-lg-5">
        <!-- Phone -->
        <div class="card border-0 shadow-sm mb-3 p-3">
          <h5 class="fw-bold mb-2">
            <i class="fa fa-phone me-2" style="color: #80db66;"></i> Phone
          </h5>
          <p class="mb-0">
            <a href="tel:+8801303934047" style="text-decoration: none;">
              +8801303934047
            </a>
          </p>
        </div>
        <!-- Email -->
        <div class="card border-0 shadow-sm mb-3 p-3">
          <h5 class="fw-bold mb-2">
            <i class="fa fa-envelope me-2" style="color: #80db66;"></i> Email Address
          </h5>
          <p class="mb-0">
            <a href="mailto:collab@sabbirtareq.com" style="text-decoration: none;">
              collab@sabbirtareq.com
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Include Bootstrap JS + Popper (CDN example) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
