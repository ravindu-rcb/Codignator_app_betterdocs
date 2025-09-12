<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Concession</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
<style>
  :root {
    --bg: #0b0f19;
    --panel: #12172a;
    --panel-2: #0f1426;
    --text: #e8ecf4;
    --muted: #9fb0d0;
    --accent: #6aa1ff;
    --accent-2: #8a5cff;
    --success: #30d158;
    --shadow: rgba(0, 0, 0, 0.28);
  }
  * { box-sizing: border-box; }
  html, body { height: 100%; }
  body {
    margin: 0;
    font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
    color: var(--text);
    background:
      radial-gradient(1100px 300px at 50% -120px, rgba(138, 92, 255, 0.25), transparent 60%),
      linear-gradient(180deg, #0b0f19, #0b0f19 40%, #0e1426 100%);
    background-attachment: fixed;
  }

  /* Page container */
  .wrap {
    max-width: 1100px;
    margin: 48px auto;
    padding: 0 20px 80px;
  }

  /* Header card */
  .hero {
    position: relative;
    border-radius: 18px;
    background: linear-gradient(180deg, #111735, #0f1428);
    box-shadow: 0 20px 60px var(--shadow), inset 0 1px 0 rgba(255,255,255,0.06);
    overflow: hidden;
    padding: 36px 28px;
  }
  .hero:before {
    content: "";
    position: absolute;
    inset: -2px;
    background: radial-gradient(600px 140px at 30% -40px, rgba(106,161,255,0.45), transparent 60%),
                radial-gradient(600px 140px at 80% -40px, rgba(48,209,88,0.18), transparent 60%);
    pointer-events: none;
  }
  .kicker {
    display: inline-block;
    letter-spacing: .12em;
    font-size: 12px;
    color: var(--muted);
    text-transform: uppercase;
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.08);
    padding: 6px 10px;
    border-radius: 999px;
  }
  h1 {
    margin: 12px 0 8px;
    font-size: clamp(28px, 3.8vw, 44px);
    line-height: 1.06;
    font-weight: 800;
    letter-spacing: -0.02em;
  }
  .lead {
    margin: 0;
    color: var(--muted);
    font-size: 15.5px;
    max-width: 70ch;
  }

  /* Content card */
  .card {
    margin-top: 22px;
    background: linear-gradient(180deg, var(--panel), var(--panel-2));
    border: 1px solid rgba(255,255,255,0.06);
    border-radius: 16px;
    box-shadow: 0 12px 40px var(--shadow);
    padding: 22px;
  }
  .card h2 {
    margin: 0 0 12px;
    font-size: 20px;
  }
  label { display:block; margin: 12px 0 6px; color: var(--muted); font-size: 14px; }
  input[type="text"], textarea, select {
    width: 100%;
    padding: 12px 14px;
    border-radius: 12px;
    border: 1px solid rgba(255,255,255,0.08);
    background: #0e1326;
    color: var(--text);
    outline: none;
    transition: border .15s ease;
  }
  input:focus, textarea:focus, select:focus { border-color: rgba(106,161,255,0.6); }
  .row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
  }
  .actions { margin-top: 16px; display:flex; gap: 10px; }
  .btn {
    appearance: none;
    border: 0;
    border-radius: 12px;
    padding: 12px 16px;
    font-weight: 600;
    cursor: pointer;
    transition: transform .04s ease, box-shadow .2s ease, background .2s ease;
  }
  .btn:active { transform: translateY(1px); }
  .btn.primary {
    background: linear-gradient(180deg, #6aa1ff, #4c86f2);
    color: white;
    box-shadow: 0 10px 30px rgba(78,136,242,0.45);
  }
  .btn.ghost {
    background: rgba(255,255,255,0.06);
    color: var(--text);
    border: 1px solid rgba(255,255,255,0.10);
  }

  /* Floating Help button */
  .fab {
    position: fixed;
    right: 22px;
    bottom: 22px;
    height: 56px;
    border-radius: 999px;
    background: linear-gradient(180deg, #8a5cff, #6a48ff);
    color: white;
    padding: 0 18px 0 14px;
    display: flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 18px 40px rgba(106,72,255,0.4);
    border: 0;
    font-weight: 700;
    letter-spacing: .01em;
    cursor: pointer;
  }
  .fab svg { width: 20px; height: 20px; }

  /* Sidebar drawer */
  .overlay {
    position: fixed;
    inset: 0;
    background: rgba(3, 6, 18, 0.55);
    opacity: 0;
    visibility: hidden;
    transition: opacity .2s ease, visibility .2s ease;
  }
  .overlay.open { opacity: 1; visibility: visible; }

  .drawer {
    position: fixed;
    top: 0;
    right: -380px;
    width: 360px;
    height: 100vh;
    background: #0f1428;
    border-left: 1px solid rgba(255,255,255,0.08);
    box-shadow: -24px 0 60px rgba(0,0,0,0.35);
    transition: right .25s ease;
    display: flex;
    flex-direction: column;
  }
  .drawer.open { right: 0; }
  .drawer header {
    padding: 18px 18px 12px;
    border-bottom: 1px solid rgba(255,255,255,0.06);
  }
  .drawer header h3 { margin: 0; font-size: 18px; }
  .drawer .content { padding: 16px 18px 22px; overflow: auto; }
  .doclink {
    display: block;
    font-weight: 700;
    background: rgba(106,161,255,0.12);
    border: 1px solid rgba(106,161,255,0.30);
    color: #cfe0ff;
    padding: 12px 14px;
    border-radius: 12px;
    text-decoration: none;
    word-break: break-word;
  }
  .muted { color: var(--muted); font-size: 13px; margin-top: 10px; }

  @media (max-width: 780px) {
    .row { grid-template-columns: 1fr; }
    .drawer { width: 92vw; }
  }
</style>
</head>
<body>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
  $page_title = 'Concession';
  $this->load->view('partials/header', compact('page_title'));
?>
<div class="wrap">
  <section class="hero">
    <span class="kicker">Module</span>
    <h1>Concession Request</h1>
    <p class="lead">
      Submit and track concession requests. Use the Help button at the bottom right,
      then open the sidebar for the documentation link created in BetterDocs.
    </p>

    <div class="card">
      <h2>New request</h2>
      <div class="row">
        <div>
          <label>Requester name</label>
          <input type="text" placeholder="Enter your name" />
        </div>
        <div>
          <label>Department</label>
          <input type="text" placeholder="Finance, HR, Operations" />
        </div>
      </div>

      <div class="row">
        <div>
          <label>Concession type</label>
          <select>
            <option selected>Select a type</option>
            <option>Fee reduction</option>
            <option>Deadline extension</option>
            <option>Special approval</option>
          </select>
        </div>
        <div>
          <label>Reference ID (optional)</label>
          <input type="text" placeholder="Ticket or case ID" />
        </div>
      </div>

      <label>Reason</label>
      <textarea rows="5" placeholder="Describe the reason. Add context and any supporting details."></textarea>

      <div class="actions">
        <button class="btn primary" type="button">Submit request</button>
        <button class="btn ghost" type="button">Save draft</button>
      </div>
    </div>
  </section>
</div>

<!-- Floating Help button -->
<button class="fab" onclick="openHelp('understanding-elements')" title="Open help">
  <svg viewBox="0 0 24 24" fill="none">
    <path d="M12 2a10 10 0 1 0 .001 20.001A10 10 0 0 0 12 2Zm0 14.5a1.25 1.25 0 1 1 0 2.5 1.25 1.25 0 0 1 0-2.5Zm1.2-9.4c1.62.44 2.8 1.8 2.8 3.4 0 1.38-.8 2.44-2.02 3.22-.52.32-.88.86-.98 1.48l-.05.3h-1.9l.06-.36c.2-1.26.94-2.16 1.94-2.78.84-.52 1.25-1.08 1.25-1.86 0-.88-.66-1.6-1.64-1.86-1.24-.34-2.48.3-2.9 1.5l-1.78-.62c.68-1.98 2.88-3.08 4.92-2.56Z" fill="currentColor"/>
  </svg>
  Help
</button>


<!-- Overlay and Drawer -->
<div class="overlay" id="overlay"></div>
<aside class="drawer" id="drawer" aria-hidden="true">
  <header><h3 id="docTitle">Help and docs</h3></header>
  <div class="content" id="docBody">
    <p class="muted">Loading documentation...</p>
  </div>
</aside>


<?php $this->load->view('partials/footer'); ?>

<script>
  const helpBtn = document.getElementById('helpBtn');
  const overlay = document.getElementById('overlay');
  const drawer = document.getElementById('drawer');

  function openDrawer() {
    overlay.classList.add('open');
    drawer.classList.add('open');
    drawer.setAttribute('aria-hidden', 'false');
  }
  function closeDrawer() {
    overlay.classList.remove('open');
    drawer.classList.remove('open');
    drawer.setAttribute('aria-hidden', 'true');
  }
  helpBtn.addEventListener('click', openDrawer);
  overlay.addEventListener('click', closeDrawer);
  // Escape key support
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeDrawer();
  });
</script>
</body>
</html>
