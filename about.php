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
      flex-direction: row;
      align-items: center;
      padding: 5px 24px 5px 24px;
      background: #2563eb;
      min-height: 56px;
      position: relative;
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
      margin: 0 12px;
      font-weight: 500;
      font-size: 1.05rem;
      letter-spacing: 1px;
      transition: color 0.2s;
      position: relative;
    }
    .desktop-nav {
      display: flex;
      justify-content: center;
      align-items: center;
      flex: 1;
      gap: 35px;
    }
    .header nav a.active {
      text-decoration: none;
    }
    .header nav a.active::after {
      content: '';
      display: block;
      position: absolute;
      left: 0;
      right: 0;
      bottom: -4px;
      height: 3px;
      background: #fff;
      border-radius: 2px;
    }
    .header nav a:hover {
      color: #c7e0fa !important;
    }
    .burger {
      width: 34px;
      height: 34px;
      display: none;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      z-index: 20;
      background: none;
      border: none;
      margin-left: 8px;
    }
    .burger span {
      display: block;
      width: 26px;
      height: 4px;
      background: #fff;
      margin: 4px 0;
      border-radius: 2px;
      transition: all 0.3s;
    }
    .mobile-menu-panel {
      position: fixed;
      top: 0;
      right: 0;
      width: 220px;
      height: 100vh;
      background: #2563eb;
      box-shadow: -2px 0 10px rgba(0,0,0,0.08);
      display: none;
      flex-direction: column;
      padding: 2.5rem 1.5rem 1rem 1.5rem;
      z-index: 100;
      animation: slideIn 0.2s;
    }
    @keyframes slideIn {
      from { right: -220px; }
      to { right: 0; }
    }
    .mobile-menu-panel.show {
      display: flex;
    }
    .mobile-menu-panel a {
      font-size: 1.1rem;
      color: #fff !important;
      font-weight: 600;
      margin-bottom: 1.2rem;
      text-decoration: none;
    }
    .mobile-menu-panel .close-btn {
      position: absolute;
      top: 1.1rem;
      right: 1.1rem;
      font-size: 2rem;
      color: #fff;
      background: none;
      border: none;
      cursor: pointer;
    }
    .hero {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      padding: 48px;
      padding-left: 95px;
      background: linear-gradient(120deg, #eaf3fc 60%, #c7e0fa 100%);
      border-radius: 0 0 40px 40px;
      position: relative;
      overflow: hidden;
    }
    .hero-text {
      flex: 1 1 350px;
      min-width: 300px;
      z-index: 2;
      margin-top: 60px;
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
      padding-left: 95px;
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
      padding-left: 97px;
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
        margin-left: 0px;
        position: relative;
        right: 10px;
        bottom: 5px;
      }
      .header nav {
        display: none;
      }
      .burger {
        display: flex !important;
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        margin-left: 0;
      }
      .mobile-menu-panel {
        display: none;
      }
      .mobile-menu-panel.show {
        display: flex;
      }
      .hero {
        flex-direction: column;
        padding: 10px;
        gap: 0;
      }
      .hero-text {
        margin-bottom: 0;
        margin-top: 30px;
      }
      .hero-illustration {
        display: none !important;
        margin-top: 0;
      }
      .hero-title {
        font-size: 1.6rem;
      }
      .hero-desc {
        font-size: 1.1rem;
        margin-bottom: 20px;
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
        padding-bottom: 30px;
      }
      .features-title, .commitment-title {
        font-size: 1.48rem;
      }
      .features-section {
        padding-left: 10px !important;
        padding-bottom: 20px !important;
        margin: 0 !important;
      }
      .features-list {
        flex-direction: column !important;
        gap: 0 !important;
        margin: 0 !important;
        padding: 0 !important;
        align-items: flex-start !important;
        justify-content: flex-start !important;
      }
      .feature-item {
        min-width: 0 !important;
        font-size: 0.98rem;
        margin: 0 0 15px 0 !important;
        padding: 0 !important;
        border: none !important;
        min-height: 0 !important;
        box-sizing: border-box !important;
      }
      .feature-item:last-child {
        margin-bottom: 0 !important;
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
    <div class="logo" style="flex:0 0 auto;">
      <img src="images/au_comelec.png" alt="AUSSC Comelec Logo">
    </div>

    <nav class="desktop-nav">
      <a href="#">Result</a>
      <a href="about.php" class="active">About</a>
      <a href="#">Executives</a>
      <a href="login.php">Sign in</a>
    </nav>

    <button class="burger" id="burgerMenu" aria-label="Open menu" tabindex="0">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <div class="mobile-menu-panel" id="mobileMenuPanel">
      <button class="close-btn" id="closeMobileMenu" aria-label="Close menu">&times;</button>
      <a href="login.php">Sign in</a>
      <a href="about.php" class="active">About</a>
      <a href="#">Result</a>
      <a href="#">Executives</a>
    </div>
  </header>

  <section class="hero">
    <div class="hero-text">
      <div class="hero-title">About AUMC<br>Voting Management System</div>
      <div class="hero-desc">
        The AUMC Voting Management System is an innovative online platform developed exclusively for the Arellano University School Government elections. 
        It is designed to make the voting process faster, more secure, and more accessible for students, ensuring fair and transparent elections.
        Our system provides student voters with a simple and reliable way to cast their votes anytime within the scheduled voting period. It eliminates manual counting errors through automated tallying and guarantees accuracy in results.
      </div>
    </div>

    <div class="hero-illustration">
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
    <div class="feature-item">
        <span class="feature-icon">✔️</span>
        <div class="feature-content">
          <strong>Automated Tallying & Graphical Results</strong>
          Votes are counted instantly and displayed in real-time charts and graphs for better transparency.
        </div>
      </div>
    </div>
      <div class="feature-item">
        <span class="feature-icon">✔️</span>
        <div class="feature-content">
          <strong>Secure Login</strong>
          Protects voter identity and ensures only registered AU students can access the system.
        </div>
      </div>
    </div>
      <div class="feature-item">
        <span class="feature-icon">✔️</span>
        <div class="feature-content">
          <strong>Secure Online Voting</strong>
          Each student can vote once, ensuring fairness and integrity.
        </div>
      </div>
    </div>
      <div class="feature-item">
        <span class="feature-icon">✔️</span>
        <div class="feature-content">
          <strong>Candidate Profiles</strong>
          Displays detailed information about candidates, their positions, photos, platform, and their party affiliations.
        </div>
      </div>
    </div>
    <div class="feature-item">
        <span class="feature-icon">✔️</span>
        <div class="feature-content">
          <strong>User-Friendly Interface</strong>
          Simple design for both administrators and voters.
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
    &copy; <?php echo date('Y'); ?> AUMC - Voting Management System.<br> All rights reserved.
  </footer>
</body>
<script>

// Burger menu toggle for mobile
const burgerMenu = document.getElementById('burgerMenu');
const mobileMenuPanel = document.getElementById('mobileMenuPanel');
const closeMobileMenu = document.getElementById('closeMobileMenu');

if (burgerMenu && mobileMenuPanel && closeMobileMenu) {
  burgerMenu.addEventListener('click', function() {
    mobileMenuPanel.classList.add('show');
  });
  closeMobileMenu.addEventListener('click', function() {
    mobileMenuPanel.classList.remove('show');
  });
  // Optional: close menu when clicking outside
  document.addEventListener('click', function(e) {
    if (
      mobileMenuPanel.classList.contains('show') &&
      !mobileMenuPanel.contains(e.target) &&
      !burgerMenu.contains(e.target)
    ) {
      mobileMenuPanel.classList.remove('show');
    }
  });
}
</script>
</html>