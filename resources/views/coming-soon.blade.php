<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CI Ireland - Coming Soon</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-ci.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo-ci.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: #3D1F3D;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .container {
            text-align: center;
            padding: 40px 20px;
        }

        .logo {
            width: 180px;
            max-width: 60vw;
            margin-bottom: 48px;
            filter: brightness(0) invert(1);
        }

        .divider {
            width: 60px;
            height: 4px;
            background: #F26522;
            border-radius: 2px;
            margin: 0 auto 40px;
        }

        h1 {
            color: #ffffff;
            font-size: clamp(2.2rem, 6vw, 4rem);
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            line-height: 1.1;
        }

        h1 span {
            color: #F26522;
        }

        p {
            color: rgba(255, 255, 255, 0.55);
            font-size: 1rem;
            font-weight: 500;
            margin-top: 20px;
            letter-spacing: 0.02em;
        }

        /* subtle background circles */
        body::before,
        body::after {
            content: '';
            position: fixed;
            border-radius: 50%;
            background: rgba(242, 101, 34, 0.07);
            pointer-events: none;
        }

        body::before {
            width: 600px;
            height: 600px;
            top: -200px;
            right: -200px;
        }

        body::after {
            width: 400px;
            height: 400px;
            bottom: -150px;
            left: -150px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('images/logo-ci.png') }}" alt="CI Ireland" class="logo">
        <div class="divider"></div>
        <h1>Coming <span>Soon</span></h1>
        <p>We're working on something great.</p>
    </div>
</body>
</html>
