<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Notes App – Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/css/auth.css" />
  <link rel="stylesheet" href="/css/password-wrapper.css" />
  <link rel="stylesheet" href="/css/error.css"/>
</head>

<body>

  <div class="card">

    <!-- Ліва частина -->
    <div class="card-left">
      <h1>Welcome to Notes</h1>
      <p>
        Capture ideas, organize thoughts and keep everything in one place.
        A calm space for focus and productivity.
      </p>
    </div>

    <!-- Права частина -->
    <div class="card-right">
      <?= $content ?>
    </div>


    <script src="/js/toggleIcons.js"></script>
</body>

</html>