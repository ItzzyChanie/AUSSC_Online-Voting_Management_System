<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About AUSSC Online Voting Management System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      background: #eaf3fc;
      margin: 0;
      color: #1a2a3a;
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 5px 24px 5px 24px;
      background: #2563eb;
      min-height: 56px;
    }
    .header .logo {
      font-weight: bold;
      font-size: 1.3rem;
      letter-spacing: 2px;
      color: #fff;
    }
    .header .logo img {
      max-height: 48px;
      width: auto;
      display: block;
      transform: scale(2.1);
      transform-origin: left center;
    }
    .header nav a {
      color: #fff !important;
      text-decoration: none;
      margin-left: 28px;
      font-weight: 500;
      font-size: 1.05rem;
      letter-spacing: 1px;
      transition: color 0.2s;
    }
    .header nav a:hover {
      color: #c7e0fa !important;
    }
    .mobile-menu-btn {
      display: none;
      background: none;
      border: none;
      color: #fff;
      font-size: 2rem;
      cursor: pointer;
      margin-left: 8px;
    }
    .mobile-dropdown {
      display: none;
      position: absolute;
      top: 100%;
      right: 16px;
      background: #2563eb;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
      min-width: 160px;
      z-index: 100;
    }
    .mobile-dropdown a {
      display: block;
      color: #fff !important;
      padding: 12px 20px;
      text-decoration: none;
      font-size: 1.05rem;
      border-bottom: 1px solid #1a47b8;
      margin: 0;
    }
    .mobile-dropdown a:last-child {
      border-bottom: none;
    }
    .mobile-dropdown a:hover {
      background: #1a47b8;
    }
    .hero {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      padding: 48px;
      background: linear-gradient(120deg, #eaf3fc 60%, #c7e0fa 100%);
      border-radius: 0 0 40px 40px;
      position: relative;
      overflow: hidden;
    }
    .hero-text {
      flex: 1 1 350px;
      min-width: 300px;
      z-index: 2;
    }
    .hero-title {
      font-size: 2.5rem;
      font-weight: bold;
      margin-bottom: 16px;
      line-height: 1.1;
    }
    .hero-desc {
      font-size: 1.1rem;
      color: #3a4a5a;
      margin-bottom: 0;
      max-width: 500px;
    }
    .hero-illustration {
      flex: 1 1 350px;
      min-width: 300px;
      display: flex;
      justify-content: flex-end;
      align-items: flex-end;
      z-index: 1;
    }
    /* Simple SVG illustration */
    .hero-illustration svg {
      width: 320px;
      height: auto;
      display: block;
    }
    .features-section {
      background: #f6fafd;
      padding: 40px 48px 24px 48px;
    }
    .features-title {
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 24px;
    }
    .features-list {
      display: flex;
      flex-wrap: wrap;
      gap: 32px 64px;
      margin-bottom: 0;
    }
    .feature-item {
      flex: 1 1 320px;
      min-width: 260px;
      display: flex;
      align-items: flex-start;
      margin-bottom: 16px;
    }
    .feature-icon {
      color: #2563eb;
      font-size: 1.5rem;
      margin-right: 16px;
      margin-top: 2px;
    }
    .feature-content {
      font-size: 1.1rem;
    }
    .feature-content strong {
      display: block;
      font-size: 1.15rem;
      margin-bottom: 2px;
      color: #1a2a3a;
    }
    .commitment-section {
      background: #eaf3fc;
      padding: 40px 48px 48px 48px;
    }
    .commitment-title {
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 18px;
    }
    .commitment-text {
      font-size: 1.1rem;
      color: #3a4a5a;
      max-width: 900px;
      margin-bottom: 0;
    }
    @media (max-width: 900px) {
      .hero, .features-section, .commitment-section {
        padding: 18px;
      }
      .header {
        padding: 12px 12px 0 12px;
      }
      .hero-illustration svg {
        width: 160px;
      }
    }
    @media (max-width: 600px) {
      .header {
        flex-direction: row;
        align-items: center;
        padding: 10px 10px 0 10px;
        position: relative;
      }
      .header .logo img {
        max-height: 60px;
        transform: scale(1.7);
        margin-bottom: 0;
      }
      .header nav {
        display: none;
      }
      .mobile-menu-btn {
        display: block;
      }
      .mobile-dropdown {
        display: none;
      }
      .mobile-dropdown.open {
        display: block;
      }
      .hero {
        flex-direction: column;
        padding: 10px;
      }
      .hero-title {
        font-size: 1.4rem;
      }
      .hero-desc {
        font-size: 1rem;
      }
      .hero-illustration {
        justify-content: center;
        margin-top: 12px;
      }
      .hero-illustration svg {
        width: 120px;
      }
      .features-section, .commitment-section {
        padding: 10px;
      }
      .features-title, .commitment-title {
        font-size: 1.2rem;
      }
      .features-list {
        flex-direction: column;
        gap: 12px;
      }
      .feature-item {
        min-width: 0;
        font-size: 0.98rem;
      }
      .feature-icon {
        font-size: 1.1rem;
        margin-right: 10px;
      }
      .commitment-text {
        font-size: 0.98rem;
      }
      footer {
        font-size: 0.95rem !important;
        padding: 12px 0 !important;
      }
    }
  </style>
</head>
<body>
  <header class="header">
    <div class="logo">
      <img src="images/au_comelec.png" alt="AUSSC Comelec Logo">
    </div>
    <nav class="desktop-nav">
      <a href="login.php">SIGN IN</a>
      <a href="about.php">ABOUT</a>
      <a href="#">RESULT</a>
      <a href="#">EXECUTIVES</a>
    </nav>
    <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Open menu">&#9776;</button>
    <div class="mobile-dropdown" id="mobileDropdown">
      <a href="login.php">SIGN IN</a>
      <a href="about.php">ABOUT</a>
      <a href="#">RESULT</a>
      <a href="#">EXECUTIVES</a>
    </div>
  </header>
  <section class="hero">
    <div class="hero-text">
      <div class="hero-title">About AUSSC<br>Online Voting Management System</div>
      <div class="hero-desc">
        The AUSSC Online Voting Management System is a secure and user-friendly digital platform designed to promote transparency, efficiency and accessibility.
      </div>
    </div>
    <div class="hero-illustration">
      <!-- Simple SVG illustration (replace with your own or use an image if needed) -->
      <svg viewBox="0 0 320 220" fill="none" xmlns="http://www.w3.org/2000/svg">
        <ellipse cx="160" cy="200" rx="140" ry="20" fill="#c7e0fa"/>
        <circle cx="80" cy="120" r="40" fill="#e57373"/>
        <circle cx="220" cy="100" r="40" fill="#64b5f6"/>
        <rect x="120" y="40" width="80" height="120" rx="16" fill="#fff" stroke="#1a2a3a" stroke-width="4"/>
        <circle cx="160" cy="70" r="12" fill="#90caf9"/>
        <rect x="140" y="90" width="40" height="10" rx="5" fill="#eaf3fc"/>
        <circle cx="160" cy="110" r="12" fill="#90caf9"/>
        <rect x="140" y="130" width="40" height="10" rx="5" fill="#eaf3fc"/>
      </svg>
    </div>
  </section>
  <section class="features-section">
    <div class="features-title">Key Features</div>
    <div class="features-list">
      <div class="feature-item">
        <span class="feature-icon">✔️</span>
        <div class="feature-content">
          <strong>Secure Login</strong>
          Protects voter identity and ensures only registered students can
        </div>
      </div>
      <div class="feature-item">
        <span class="feature-icon">✔️</span>
        <div class="feature-content">
          <strong>Voter List Management</strong>
          Provides a comprehensive database of eligible voters.
        </div>
      </div>
      <div class="feature-item">
        <span class="feature-icon">✔️</span>
        <div class="feature-content">
          <strong>Candidate Profiles</strong>
          Displays detailed information about candidates, their positions.
        </div>
      </div>
      <div class="feature-item">
        <span class="feature-icon">✔️</span>
        <div class="feature-content">
          <strong>Real-Time Results</strong>
          Automatically tallies votes and generates accurate outcomes
        </div>
      </div>
    </div>
  </section>
  <section class="commitment-section">
    <div class="commitment-title">Our Commitment</div>
    <div class="commitment-text">
      The AUSSC Online Voting Management System reflects our commitment to innovation, transparency, and fairness in student governance. By leveraging technology, we empower students to make their voices heard in a more efficient, reliable, and secure manner.<br><br>
      Together, we build a stronger and more inclusive student government by ensuring accessibility, security, and trust in every election.
    </div>
  </section>
  <footer style="background:#1a2a3a;color:#fff;text-align:center;padding:18px 0;font-size:1rem;margin-top:32px;">
    &copy; <?php echo date('Y'); ?> AUSSC Online Voting Management System. All rights reserved.
  </footer>
</body>
<script>
// Mobile dropdown toggle
const menuBtn = document.getElementById('mobileMenuBtn');
const dropdown = document.getElementById('mobileDropdown');
document.addEventListener('click', function(e) {
  if (menuBtn && dropdown) {
    if (menuBtn.contains(e.target)) {
      dropdown.classList.toggle('open');
    } else if (!dropdown.contains(e.target)) {
      dropdown.classList.remove('open');
    }
  }
});
</script>
</html>