<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Contact Form</title>
  <!-- Bootstrap CSS -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
  />
  <!-- Font Awesome (if needed for icons) -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  />
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

    /* Contact form input and textarea styling */
    .contact-section input,
    .contact-section textarea {
      background-color: #25262f !important; /* Dark background */
      border: 2px solid #80db66 !important; /* Green outline */
      color: #e2ecf6 !important;           /* Light text color */
      font-size: 1rem;
    }

    /* Placeholder styling */
    .contact-section input::placeholder,
    .contact-section textarea::placeholder {
      color: #e2ecf6 !important; /* Light placeholder text */
      opacity: 1;                /* Ensure full visibility */
    }

    /* On focus, keep the outline color */
    .contact-section input:focus,
    .contact-section textarea:focus {
      border-color: #80db66 !important; /* Green outline remains */
      outline: none !important;
      box-shadow: 0 0 5px rgba(128, 219, 102, 0.5); /* Subtle green glow */
    }

    /* ================================================ */
    /* SUCCESS CHECK ANIMATION (centered, larger)       */
    /* ================================================ */
    .success-tick-container {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 9999;
      display: flex;
      flex-direction: column;
      align-items: center;
      background: transparent;
      border: none;
      animation: fadeIn 0.3s ease-in-out;
    }

    .checkmark-circle {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background-color: #4caf50; /* Green circle */
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }
    .checkmark {
      width: 45px;
      height: 45px;
    }
    .checkmark__check {
      fill: none;
      stroke: #fff;
      stroke-width: 5;
      stroke-linecap: round;
      stroke-linejoin: round;
      stroke-dasharray: 48;
      stroke-dashoffset: 48;
      animation: drawCheck 0.4s forwards ease-out;
    }
    @keyframes drawCheck {
      to {
        stroke-dashoffset: 0;
      }
    }
    .success-text {
      margin-top: 12px;
      font-size: 1.25rem;
      color: #4caf50;
      font-weight: bold;
      text-align: center;
    }

    /* ================================================ */
    /* ERROR X ANIMATION (centered, larger)            */
    /* ================================================ */
    .fail-x-container {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 9999;
      display: flex;
      flex-direction: column;
      align-items: center;
      background: transparent;
      border: none;
      animation: fadeIn 0.3s ease-in-out;
    }

    .fail-x-circle {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background-color: #f44336; /* Red circle */
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }
    .fail-x {
      width: 45px;
      height: 45px;
    }
    .fail-x__path {
      fill: none;
      stroke: #fff;
      stroke-width: 5;
      stroke-linecap: round;
      stroke-linejoin: round;
      stroke-dasharray: 40;
      stroke-dashoffset: 40;
      animation: drawX 0.4s forwards ease-out;
    }
    @keyframes drawX {
      to {
        stroke-dashoffset: 0;
      }
    }
    .fail-text {
      margin-top: 12px;
      font-size: 1.25rem;
      color: #f44336;
      font-weight: bold;
      text-align: center;
    }

    /* Simple fade-in keyframe */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translate(-50%, calc(-50% - 10px));
      }
      to {
        opacity: 1;
        transform: translate(-50%, -50%);
      }
    }
  </style>
</head>
<body>
  <!-- Contact Section with #e2ecf6 background -->
  <div class="py-5 contact-section" style="color: #e2ecf6;">
    <div class="container-xxl">
      <!-- Main Heading -->
      <h3 class="display-5 fw-bold mb-4"
          style="font-size: 45px; font-family: 'plus-jakarta-sans', sans-serif; color: #e2ecf6;">
        Let's <span style="color: #80db66;">Discuss</span>
      </h3>
      <div class="row align-items-start g-5">
        <!-- Left Column: Contact Form -->
        <div class="col-12 col-lg-7">
          <div class="card border-0 p-4" style="background-color: #25262f;">
            <form>
              <!-- Name & Email Row -->
              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label for="name" class="form-label fw-semibold" style="color: #80db66;">Name</label>
                  <input
                    type="text"
                    class="form-control form-control-lg"
                    id="name"
                    name="name"
                    placeholder="Enter your name"
                    required
                    style="background-color: #25262f; border: 2px solid #80db66; color: #e2ecf6;"
                  />
                </div>
                <div class="col-md-6">
                  <label for="email" class="form-label fw-semibold" style="color: #80db66;">Email</label>
                  <input
                    type="email"
                    class="form-control form-control-lg"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    required
                    style="background-color: #25262f; border: 2px solid #80db66; color: #e2ecf6;"
                  />
                </div>
              </div>
              <!-- Subject & Phone no. -->
              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label for="subject" class="form-label fw-semibold" style="color: #80db66;">Subject</label>
                  <input
                    type="text"
                    class="form-control form-control-lg"
                    id="subject"
                    name="subject"
                    placeholder="Write your message here..."
                    required
                    style="background-color: #25262f; border: 2px solid #80db66; color: #e2ecf6;"
                  />
                </div>
                <div class="col-md-6">
                  <label for="phone" class="form-label fw-semibold" style="color: #80db66;">Phone No.</label>
                  <input
                    type="tel"
                    class="form-control form-control-lg"
                    id="phone"
                    name="phone"
                    placeholder="Enter your phone no."
                    required
                    style="background-color: #25262f; border: 2px solid #80db66; color: #e2ecf6;"
                  />
                </div>
              </div>
              <!-- Message -->
              <div class="mb-3">
                <label for="message" class="form-label fw-semibold" style="color: #80db66;">Message</label>
                <textarea
                  class="form-control form-control-lg"
                  id="message"
                  name="message"
                  rows="4"
                  placeholder="Write your message here..."
                  required
                  style="background-color: #25262f; border: 2px solid #80db66; color: #e2ecf6;"
                ></textarea>
              </div>
              <!-- Send Message Button -->
              <button type="submit" class="custom-button-footer">
                SEND MESSAGE
              </button>
            </form>
          </div>
        </div>

        <!-- Right Column: Contact Info Cards -->
        <div class="col-12 col-lg-5">
          <!-- Phone -->
          <div class="card border-0 shadow-sm mb-3 p-3" style="background-color: #25262f;">
            <h5 class="fw-bold mb-2" style="color: #80db66;">
              <i class="fa fa-phone me-2" style="color: #80db66;"></i> Phone
            </h5>
            <p class="mb-0">
              <a href="tel:+8801303934047" style="text-decoration: none; color: #e2ecf6;">
                +8801303934047
              </a>
            </p>
          </div>
          <!-- Email -->
          <div class="card border-0 shadow-sm mb-3 p-3" style="background-color: #25262f;">
            <h5 class="fw-bold mb-2" style="color: #80db66;">
              <i class="fa fa-envelope me-2" style="color: #80db66;"></i> Email Address
            </h5>
            <p class="mb-0">
              <a href="mailto:collab@sabbirtareq.com" style="text-decoration: none; color: #e2ecf6;">
                collab@sabbirtareq.com
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS + Popper (CDN example) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Show the green checkmark animation for success (centered)
    function showSuccessTick() {
      const container = document.createElement("div");
      container.classList.add("success-tick-container");
      container.innerHTML = `
        <div class="checkmark-circle">
          <svg class="checkmark" viewBox="0 0 52 52">
            <path class="checkmark__check" d="M14 27l7 7 16-16" />
          </svg>
        </div>
        <div class="success-text">Message Sent</div>
      `;
      document.body.appendChild(container);

      // Remove after 1 second
      setTimeout(() => {
        container.remove();
      }, 1000);
    }

    // Show the red X animation for failure (centered)
    function showFailX() {
      const container = document.createElement("div");
      container.classList.add("fail-x-container");
      container.innerHTML = `
        <div class="fail-x-circle">
          <svg class="fail-x" viewBox="0 0 52 52">
            <!-- Two diagonal lines to form 'X' -->
            <path class="fail-x__path" d="M16 16 L36 36 M36 16 L16 36" />
          </svg>
        </div>
        <div class="fail-text">Failed</div>
      `;
      document.body.appendChild(container);

      // Remove after 1 second
      setTimeout(() => {
        container.remove();
      }, 1000);
    }

    document.addEventListener("DOMContentLoaded", function () {
      const form = document.querySelector(".contact-section form");

      form.addEventListener("submit", function (e) {
        e.preventDefault();

        // Gather form data
        const data = {
          name: document.getElementById("name").value,
          email: document.getElementById("email").value,
          subject: document.getElementById("subject").value,
          phone: document.getElementById("phone").value,
          message: document.getElementById("message").value
        };

        // Replace with your actual Google Apps Script web app URL
        const scriptURL =
          "https://script.google.com/macros/s/AKfycbzOI5tIWVpB39qTwxop7AxDOFwL_2rwKW3BMhkNGd1kcOzPFQ9hr-ljU1rPLDfXrBNz/exec";

        fetch(scriptURL, {
          method: "POST",
          mode: "no-cors", // If you don't need a response; otherwise configure CORS properly.
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify(data)
        })
        .then(() => {
          // Show the success checkmark
          showSuccessTick();
          // Reset the form
          form.reset();
        })
        .catch((error) => {
          console.error("Error!", error.message);
          // Show the red X
          showFailX();
        });
      });
    });
  </script>
</body>
</html>
