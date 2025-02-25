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

<!-- Contact Section with #e2ecf6 background -->
<div class="py-5" style="background-color: #e2ecf6;">
  <div class="container-xxl">
    <!-- Main Heading -->
    <h2 class="display-5 fw-bold mb-4" style="color: #25262f;">
    Let's <span style="color: #80db66;">Discuss</span>
    </h2>
    <div class="row align-items-start g-5">
      <!-- Left Column: Contact Form -->
      <div class="col-12 col-lg-7">
        <div class="card border-0 p-4" style="background-color: #fff;">
          <form>
            <!-- Name & Email Row -->
            <div class="row g-3 mb-3">
              <div class="col-md-6">
                <label for="name" class="form-label fw-semibold" style="color: #25262f; font-size: 1.1rem;">Name</label>
                <input
                  type="text"
                  class="form-control form-control-lg"
                  id="name"
                  name="name"
                  placeholder="Enter your name"
                  style="color: #25262f;"
                  required
                />
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label fw-semibold" style="color: #25262f; font-size: 1.1rem;">Email</label>
                <input
                  type="email"
                  class="form-control form-control-lg"
                  id="email"
                  name="email"
                  placeholder="Enter your email"
                  style="color: #25262f;"
                  required
                />
              </div>
            </div>
            <!-- Subject -->
            <div class="mb-3">
              <label for="subject" class="form-label fw-semibold" style="color: #25262f; font-size: 1.1rem;">Subject</label>
              <input
                type="text"
                class="form-control form-control-lg"
                id="subject"
                name="subject"
                placeholder="Subject"
                style="color: #25262f;"
                required
              />
            </div>
            <!-- Message -->
            <div class="mb-3">
              <label for="message" class="form-label fw-semibold" style="color: #25262f; font-size: 1.1rem;">Message</label>
              <textarea
                class="form-control form-control-lg"
                id="message"
                name="message"
                rows="4"
                placeholder="Write your message here..."
                style="color: #25262f;"
                required
              ></textarea>
            </div>
            <!-- Send Message Button -->
            <button
              type="submit"
              class="btn fw-bold px-4 py-2 mt-2"
              style="background-color: #80db66; color: #25262f; border: none; font-size: 1.1rem;"
            >
              SEND MESSAGE
            </button>
          </form>
        </div>
      </div>

      <!-- Right Column: Contact Info Cards -->
      <div class="col-12 col-lg-5">
        <!-- Phone -->
        <div class="card border-0 shadow-sm mb-3 p-3">
          <h5 class="fw-bold mb-2" style="color: #25262f; font-size: 1.2rem;">
            <i class="fa fa-phone me-2" style="color: #80db66;"></i> Phone
          </h5>
          <p class="mb-0">
            <a href="tel:+8801303934047" style="color: #25262f; text-decoration: none;">
            +8801303934047
            </a>
          </p>
        </div>
        <!-- Email -->
        <div class="card border-0 shadow-sm mb-3 p-3">
          <h5 class="fw-bold mb-2" style="color: #25262f; font-size: 1.2rem;">
            <i class="fa fa-envelope me-2" style="color: #80db66;"></i> Email Address
          </h5>
          <p class="mb-0">
            <a href="mailto:collab@sabbirtareq.com" style="color: #25262f; text-decoration: none;">
            collab@sabbirtareq.com
            </a>
          </p>
        </div>
        
      </div>
    </div>
  </div>
</div>

<!-- Include Bootstrap JS + Popper (CDN example) -->
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
></script>
