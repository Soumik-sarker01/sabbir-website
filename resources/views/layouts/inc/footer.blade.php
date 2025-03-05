<!-- Include Bootstrap CSS (CDN example) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
<!-- Include Font Awesome for icons (CDN example) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

<!-- Custom Styles to Increase Font Sizes and Section Size -->
<style>
    /* Increase the overall contact section size (footer) */
    .contact-section {
        padding: 200px 0;
        /* Increased vertical padding */
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
        background-color: #25262f !important;
        /* Dark background */
        border: 2px solid #80db66 !important;
        /* Green outline */
        color: #e2ecf6 !important;
        /* Light text color */
        font-size: 1rem;
    }

    /* Placeholder styling */
    .contact-section input::placeholder,
    .contact-section textarea::placeholder {
        color: #e2ecf6 !important;
        /* Light placeholder text */
        opacity: 1;
        /* Ensure full visibility */
    }

    /* On focus, keep the outline color */
    .contact-section input:focus,
    .contact-section textarea:focus {
        border-color: #80db66 !important;
        /* Green outline remains */
        outline: none !important;
        box-shadow: 0 0 5px rgba(128, 219, 102, 0.5);
        /* Subtle green glow */
    }

/* Custom alert box styles */
.custom-alert {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    padding: 15px 25px;
    border-radius: 5px;
    font-size: 18px;
    font-weight: bold;
    text-align: center;
    z-index: 9999;
    animation: fadeIn 0.3s ease-in-out;
}

/* Success message styling */
.custom-alert.success {
    background-color: #4CAF50;
    color: white;
}

/* Error message styling */
.custom-alert.error {
    background-color: #f44336;
    color: white;
}

/* Fade-out effect */
@keyframes fadeIn {
    from { opacity: 0; transform: translateX(-50%) translateY(-10px); }
    to { opacity: 1; transform: translateX(-50%) translateY(0); }
}

.fade-out {
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
}



</style>

<!-- Contact Section with #e2ecf6 background -->
<div class="py-5 contact-section" style="color: #e2ecf6;">
    <div class="container-xxl">
        <!-- Main Heading -->
        <h3 class="display-5 fw-bold mb-4" style="font-size: 45px; font-family: 'plus-jakarta-sans', sans-serif; color: #e2ecf6;">
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
                                <input type="text" class="form-control form-control-lg" id="name" name="name"
                                    placeholder="Enter your name" required
                                    style="background-color: #25262f; border: 2px solid #80db66; color: #e2ecf6;" />
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold" style="color: #80db66;">Email</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email"
                                    placeholder="Enter your email" required
                                    style="background-color: #25262f; border: 2px solid #80db66; color: #e2ecf6;" />
                            </div>
                        </div>
                        <!-- Subject & Phone no. -->
                        <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="subject" class="form-label fw-semibold" style="color: #80db66;">Subject</label>
                            <input type="text" class="form-control form-control-lg" id="subject" name="subject"
                                placeholder="Write your message here..." required
                                style="background-color: #25262f; border: 2px solid #80db66; color: #e2ecf6;" />
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label fw-semibold" style="color: #80db66;">Phone No.</label>
                            <input type="tel" class="form-control form-control-lg" id="phone" name="phone"
                                placeholder="Enter your phone no." required
                                style="background-color: #25262f; border: 2px solid #80db66; color: #e2ecf6;" />
                        </div>
                        </div>
                        <!-- Message -->
                        <div class="mb-3">
                            <label for="message" class="form-label fw-semibold" style="color: #80db66;">Message</label>
                            <textarea class="form-control form-control-lg" id="message" name="message" rows="4"
                                placeholder="Write your message here..." required
                                style="background-color: #25262f; border: 2px solid #80db66; color: #e2ecf6;"></textarea>
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

<!-- Include Bootstrap JS + Popper (CDN example) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector(".contact-section form");

    form.addEventListener("submit", function(e) {
      e.preventDefault();

      // Gather form data
      const data = {
        name: document.getElementById("name").value,
        email: document.getElementById("email").value,
        subject: document.getElementById("subject").value,
        phone: document.getElementById("phone").value,
        message: document.getElementById("message").value
      };

      // Replace with your actual Google Apps Script web app URL:
      const scriptURL = "https://script.google.com/macros/s/AKfycbzOI5tIWVpB39qTwxop7AxDOFwL_2rwKW3BMhkNGd1kcOzPFQ9hr-ljU1rPLDfXrBNz/exec";

      fetch(scriptURL, {
        method: "POST",
        mode: "no-cors",  // Use no-cors mode if you don't need a response; otherwise configure CORS properly.
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
      })
      .then(() => {
        alert("Message sent successfully!");
        form.reset();  // Optional: Reset the form after submission.
      })
      .catch((error) => {
        console.error("Error!", error.message);
        alert("There was an error sending your message.");
      });
    });
  });
</script>

