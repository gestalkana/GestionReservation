<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Gestion Réservation Hôtel Taleva</title>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Poppins', sans-serif;
      background: radial-gradient(circle at center, #4b367c 0%, #2a1d47 100%);
      color: #e0d8f7;
      overflow: hidden;
    }

    #particles-js {
      position: fixed;
      width: 100%;
      height: 100%;
      z-index: 0;
      top: 0;
      left: 0;
    }

    .content {
      position: relative;
      z-index: 10;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 20px;
    }

    h1 {
      font-size: 3rem;
      margin-bottom: 0.5rem;
      text-shadow: 0 0 20px #8a78b0;
      transition: text-shadow 0.3s ease, transform 0.3s ease;
    }

    h1:hover {
      text-shadow: 0 0 30px #cbb3ff, 0 0 60px #8a78b0;
      transform: scale(1.05);
    }

    p {
      font-size: 1.5rem;
      margin-bottom: 2rem;
      font-weight: 500;
      text-shadow: 0 0 6px #7d6fb3;
      min-height: 2em;
      animation: floatText 4s ease-in-out infinite;
    }

    @keyframes floatText {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-5px); }
    }

    .auth-links {
      position: fixed;
      top: 20px;
      right: 30px;
      z-index: 20;
    }

    .auth-links a {
      color: #d8cfff;
      text-decoration: none;
      font-weight: 600;
      margin-left: 15px;
      padding: 8px 15px;
      border-radius: 4px;
      transition: all 0.3s ease;
      background: rgba(255, 255, 255, 0.1);
    }

    .auth-links a:hover {
      background-color: #b49bff;
      color: #4b367c;
    }

    .signature {
      position: fixed;
      bottom: 15px;
      right: 20px;
      font-size: 0.9rem;
      color: #b9aaffcc;
      z-index: 20;
      font-style: italic;
      user-select: none;
    }

    #logoButton {
      position: fixed;
      top: 20px;
      left: 30px;
      z-index: 20;
      cursor: pointer;
      display: flex;
      align-items: center;
      background: rgba(255 255 255 / 0.12);
      padding: 8px 14px;
      border-radius: 8px;
      transition: transform 0.3s ease, background-color 0.3s ease;
    }

    #logoButton:hover {
      transform: scale(1.05);
      background: rgba(255 255 255 / 0.3);
    }

    #logoSVG {
      width: 32px;
      height: 32px;
      margin-right: 10px;
      fill: #b49bff;
      filter: drop-shadow(0 0 4px #8a78b0);
      transition: transform 0.3s ease;
    }

    #logoButton:hover #logoSVG {
      transform: rotate(15deg) scale(1.2);
    }

    #logoText {
      font-weight: 700;
      font-size: 1.3rem;
      color: #b49bff;
      text-shadow: 0 0 8px #8a78b0;
    }
  </style>
</head>
<body>
  <div id="particles-js"></div>

  <div id="logoButton" title="Changer l'animation">
    <svg id="logoSVG" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
      <circle cx="32" cy="32" r="30" stroke="#b49bff" stroke-width="3" fill="#4b367c"/>
      <text x="32" y="42" text-anchor="middle" font-family="Poppins, sans-serif" font-weight="700" font-size="30" fill="#b49bff">Z</text>
    </svg>
    <div id="logoText">Zita Lodge</div>
  </div>

  <div class="auth-links">
    @guest
      <a href="{{ route('login') }}">Login</a>
      <a href="{{ route('register') }}">Register</a>
    @else
      <a href="{{ route('logout') }}"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
    @endguest
  </div>

  <div class="content">
    <h1>Application de Gestion de Réservation</h1>
    <p><span id="typed"></span></p>
  </div>

  <div class="signature">&copy; 2025 — Application créée par Zita Company</div>

  <!-- Particles.js -->
  <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
  <script>
    particlesJS("particles-js", {
      "particles": {
        "number": { "value": 100, "density": { "enable": true, "value_area": 700 } },
        "color": { "value": ["#b49bff", "#8a78b0", "#ffffff"] },
        "shape": { "type": ["circle", "triangle", "star"] },
        "opacity": { "value": 0.5, "random": true },
        "size": { "value": 3, "random": true },
        "line_linked": {
          "enable": true,
          "distance": 140,
          "color": "#b49bff",
          "opacity": 0.3,
          "width": 0.8
        },
        "move": {
          "enable": true,
          "speed": 2,
          "random": true,
          "out_mode": "out"
        }
      },
      "interactivity": {
        "events": {
          "onhover": { "enable": true, "mode": ["grab", "bubble"] },
          "onclick": { "enable": true, "mode": ["repulse", "push"] },
          "resize": true
        },
        "modes": {
          "grab": { "distance": 200, "line_linked": { "opacity": 0.8 } },
          "bubble": { "distance": 200, "size": 8, "duration": 2, "opacity": 1 },
          "repulse": { "distance": 150, "duration": 0.5 },
          "push": { "particles_nb": 6 }
        }
      },
      "retina_detect": true
    });

    // Effet Parallax souris
    document.addEventListener("mousemove", (e) => {
      const x = (e.clientX / window.innerWidth - 0.5) * 10;
      const y = (e.clientY / window.innerHeight - 0.5) * 10;
      document.querySelector(".content").style.transform = `translate(${x}px, ${y}px)`;
    });
  </script>

  <!-- Typed.js -->
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
  <script>
    new Typed("#typed", {
      strings: [
        "Application de gestion de réservation simple et efficace.",
        "Gérez vos chambres et clients sans effort.",
        "Optimisez votre hôtel avec Zita Lodge."
      ],
      typeSpeed: 50,
      backSpeed: 30,
      loop: true,
      backDelay: 2000
    });
  </script>
</body>
</html>
