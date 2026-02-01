<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Notes UI</title>
  <link rel="stylesheet" href="/views/assets/css/layout.css" />
</head>
<body>

  <!-- LEFT SIDEBAR -->
  <aside class="sidebar">
    <div class="profile">
      <img src="https://i.pravatar.cc/60" alt="User">
      <span>John Doe</span>
    </div>

    <input class="search" type="text" placeholder="Search" />

    <div class="section">
      <h4>TAG</h4>
      <ul class="list">
        <li><span class="dot t1"></span>Tag 1</li>
        <li><span class="dot t2"></span>Tag 2</li>
        <li><span class="dot t3"></span>Tag 3</li>
        <li><span class="dot t4"></span>Tag 4</li>
        <li><span class="dot t5"></span>Tag 5</li>
        <li><span class="dot t6"></span>Tag 6</li>
      </ul>
      <button class="link">+ Add Tag</button>
    </div>

    <div class="section">
      <h4>FOLDERS</h4>
      <ul class="list folders">
        <li>📁 Folder 1</li>
        <li>📁 Folder 2</li>
        <li>📁 Folder 3</li>
        <li>📁 Folder 45</li>
      </ul>
      <button class="link">+ Add Folder</button>
    </div>
  </aside>

  <!-- MAIN CONTENT -->
  <main class="content">
    <header class="topbar">
      <h1>ALL</h1>
      <div class="actions">
        <button class="icon">＋</button>
        <button class="icon">▶</button>
        <button class="icon">🔔</button>
        <button class="dropdown">Last modified ⌄</button>
      </div>
    </header>

    <p class="subtitle">Just for test!</p>

    <div class="note">
      <div class="note-header">
        <h3>UI Inspiration</h3>
        <div class="status">
          <span class="s orange"></span>
          <span class="s blue"></span>
          <span class="s red"></span>
        </div>
      </div>
      <p>
        Collect clean and minimal UI ideas for future projects.
        Focus on dark themes, smooth gradients, subtle shadows,
        and simple card-based layouts.
      </p>
    </div>
  </main>

</body>
</html>
