<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Edit Note</title>
  <link rel="stylesheet" href="/views/assets/css/edit-note.css" />
</head>
<body>

  <!-- SIDEBAR -->
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
      </ul>
    </div>

    <div class="section">
      <h4>FOLDERS</h4>
      <ul class="list folders">
        <li>📁 Folder 1</li>
        <li>📁 Folder 2</li>
      </ul>
    </div>
  </aside>

  <!-- MAIN CONTENT -->
  <main class="content">
    <header class="topbar">
      <h1>Edit note</h1>
      <button class="back">← Back</button>
    </header>

    <div class="editor">
      <input
        type="text"
        class="title-input"
        placeholder="Note title..."
      />

      <textarea
        class="content-input"
        placeholder="Write your note here..."
      ></textarea>

      <div class="actions">
        <button class="save">Save note</button>
      </div>
    </div>
  </main>

</body>
</html>
