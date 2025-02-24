<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <!-- Contact Info Section -->
            <div class="footer-info">
                <h2>Contact Info</h2>
                <p>Reach out via email or phone for a quick response.</p>
                <div class="contact-details">
                    <p><i class="fas fa-phone"></i> <a href="tel:+8801303934047">+8801303934047</a></p>
                    <p><i class="fas fa-envelope"></i> <a href="mailto:collab@sabbirtareq.com">collab@sabbirtareq.com</a></p>
                </div>
            </div>
            
            <!-- Contact Form Section -->
            <div class="footer-contact">
                <h2 class="highlighted">Let's Connect</h2>
                <p>We’re here to help! Drop us a message and let’s start a conversation.</p>
                <form id="contactForm" action="#" method="POST">
                    <div class="form-group animated-input">
                        <input type="text" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group animated-input">
                        <input type="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group animated-input">
                        <input type="text" name="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group animated-input">
                        <textarea name="message" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
                <p id="formMessage" class="hidden">Your message has been sent successfully!</p>
            </div>
            
            <!-- Social Media Links -->
            <div class="footer-social">
                <h2>Follow Us</h2>
                <p>Stay connected through our social media channels.</p>
                <div class="social-links">
                    <a href="https://www.instagram.com/ay.naur/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/aynaur" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="https://www.facebook.com/aynaur" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
.footer {
    background: #e2ecf6;
    padding: 100px 50px;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    overflow: hidden;
    animation: fadeIn 1.5s ease-in-out;
}

@keyframes fadeIn {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
}

.container {
    max-width: 1400px;
    width: 100%;
}

.footer-content {
    display: flex;
    flex-direction: column;
    gap: 60px;
    align-items: center;
    width: 100%;
}

@media (min-width: 1024px) {
    .footer-content {
        flex-direction: row;
        justify-content: space-between;
        align-items: flex-start;
        gap: 80px;
    }
}

.footer-contact, .footer-info, .footer-social {
    max-width: 400px;
    text-align: left;
    flex: 1;
    animation: slideIn 1.5s ease-in-out;
}

@keyframes slideIn {
    0% { opacity: 0; transform: translateX(-20px); }
    100% { opacity: 1; transform: translateX(0); }
}

.footer h2 {
    font-size: 2.6rem;
    color: #25262f;
    margin-bottom: 15px;
    font-weight: bold;
}

.footer h2.highlighted {
    text-transform: uppercase;
    letter-spacing: 2px;
    position: relative;
    display: inline-block;
    padding-bottom: 5px;
}

.footer h2.highlighted::after {
    content: "";
    width: 80px;
    height: 4px;
    background: #80db66;
    position: absolute;
    bottom: -5px;
    left: 0;
    border-radius: 2px;
}

.footer p, .footer a {
    font-size: 1.2rem;
    color: #25262f;
    text-decoration: none;
}

.footer a:hover {
    text-decoration: underline;
}

.animated-input input, .animated-input textarea {
    width: 100%;
    padding: 14px;
    border-radius: 12px;
    border: none;
    font-size: 1rem;
    background: #ffffff;
    color: #25262f;
    transition: all 0.3s ease-in-out;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.animated-input input:focus, .animated-input textarea:focus {
    box-shadow: 0px 6px 15px rgba(128, 219, 102, 0.5);
}

textarea {
    min-height: 120px;
}

.submit-btn {
    display: inline-block;
    padding: 14px 50px;
    font-size: 1.4rem;
    font-weight: 600;
    background: #80db66;
    color: white;
    border-radius: 30px;
    text-transform: uppercase;
    cursor: pointer;
    transition: all 0.3s ease;
}

.submit-btn:hover {
    background: white;
    color: #25262f;
    box-shadow: 0px 6px 15px rgba(37, 38, 47, 0.2);
}

.social-links {
    display: flex;
    gap: 20px;
}

.social-links a {
    font-size: 2rem;
    color: #25262f;
    transition: transform 0.3s ease-in-out, color 0.3s ease-in-out;
}

.social-links a:hover {
    color: #80db66;
    transform: scale(1.15);
}

.hidden {
    display: none;
    color: #80db66;
    font-size: 1.2rem;
    margin-top: 15px;
}
</style>
