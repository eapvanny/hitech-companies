<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 - Page Not Found</title>
  {{-- <link rel="stylesheet" href="styles.css"> --}}
  <style>
/* General Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Arial', sans-serif;
  background: #0f2027; /* Fallback */
  background: linear-gradient(to right, #2c5364, #203a43, #0f2027);
  color: #fff;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
}

.container {
  text-align: center;
  position: relative;
}

.content h1 {
  font-size: 10rem;
  margin: 0;
  color: #ff6f61;
  animation: float 3s ease-in-out infinite;
}

.content h2 {
  font-size: 2rem;
  margin: 10px 0;
}

.content p {
  font-size: 1.2rem;
  margin-bottom: 20px;
}

.home-btn {
  display: inline-block;
  padding: 10px 20px;
  background: #ff6f61;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  transition: background 0.3s ease;
}

.home-btn:hover {
  background: #ff3b2f;
}

.astronaut {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  animation: float 6s ease-in-out infinite;
}

.astronaut img {
  width: 150px;
  height: auto;
}

/* Floating Animation */
@keyframes float {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-20px);
  }
}
  </style>
</head>
<body>
  <div class="container">
    <div class="content">
      <h1>404</h1>
      <h2>Oops! Page Not Found</h2>
      <p>The page you're looking for doesn't exist or has been moved.</p>
      <a href="/" class="home-btn">Go Back Home</a>
    </div>
    <div class="astronaut">
      <img src="https://i.imgur.com/8vZJ9fM.png" alt="Astronaut">
    </div>
  </div>
</body>
</html>