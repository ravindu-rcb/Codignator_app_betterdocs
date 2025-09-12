<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title><?php echo isset($page_title) ? $page_title : 'App'; ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
<style>
  :root { --bg:#0b0f19; --panel:#12172a; --panel-2:#0f1426; --text:#e8ecf4; --muted:#9fb0d0; --accent:#6aa1ff; --accent-2:#8a5cff; --shadow:rgba(0,0,0,0.28); }
  *{box-sizing:border-box} html,body{height:100%}
  body{margin:0;font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;color:var(--text);
       background: radial-gradient(1100px 300px at 50% -120px, rgba(138,92,255,.25), transparent 60%), linear-gradient(180deg,#0b0f19,#0b0f19 40%,#0e1426 100%); background-attachment:fixed;}
  /* header nav */
  .top{position:sticky;top:0;z-index:50;background:rgba(10,14,28,.6);backdrop-filter:blur(10px);border-bottom:1px solid rgba(255,255,255,.06)}
  .top .inner{max-width:1100px;margin:0 auto;display:flex;align-items:center;gap:14px;padding:10px 16px}
  .brand{font-weight:800;letter-spacing:.2px}
  .nav{display:flex;gap:8px;margin-left:auto}
  .nav a{display:inline-block;padding:8px 12px;border-radius:10px;text-decoration:none;color:#cfe0ff;border:1px solid transparent}
  .nav a:hover{border-color:rgba(255,255,255,.12);background:rgba(255,255,255,.05)}
  .nav a.active{background:linear-gradient(180deg,#6aa1ff,#4c86f2);color:#fff;border-color:transparent;box-shadow:0 8px 24px rgba(78,136,242,.35)}
  /* shared page styles */
  .wrap{max-width:1100px;margin:32px auto 90px;padding:0 20px}
  .hero{position:relative;border-radius:18px;background:linear-gradient(180deg,#111735,#0f1428);box-shadow:0 20px 60px var(--shadow),inset 0 1px 0 rgba(255,255,255,.06);overflow:hidden;padding:36px 28px}
  .kicker{display:inline-block;letter-spacing:.12em;font-size:12px;color:var(--muted);text-transform:uppercase;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.08);padding:6px 10px;border-radius:999px}
  h1{margin:12px 0 8px;font-size:clamp(28px,3.8vw,44px);line-height:1.06;font-weight:800;letter-spacing:-.02em}
  .lead{margin:0;color:var(--muted);font-size:15.5px;max-width:70ch}
  .card{margin-top:22px;background:linear-gradient(180deg,var(--panel),var(--panel-2));border:1px solid rgba(255,255,255,.06);border-radius:16px;box-shadow:0 12px 40px var(--shadow);padding:22px}
  .card h2{margin:0 0 12px;font-size:20px}
  label{display:block;margin:12px 0 6px;color:var(--muted);font-size:14px}
  input[type="text"], textarea, select{width:100%;padding:12px 14px;border-radius:12px;border:1px solid rgba(255,255,255,.08);background:#0e1326;color:var(--text);outline:none;transition:border .15s ease}
  input:focus, textarea:focus, select:focus{border-color:rgba(106,161,255,.6)}
  .row{display:grid;grid-template-columns:1fr 1fr;gap:14px}
  .actions{margin-top:16px;display:flex;gap:10px}
  .btn{appearance:none;border:0;border-radius:12px;padding:12px 16px;font-weight:600;cursor:pointer;transition:transform .04s ease, box-shadow .2s ease, background .2s ease}
  .btn:active{transform:translateY(1px)}
  .btn.primary{background:linear-gradient(180deg,#6aa1ff,#4c86f2);color:white;box-shadow:0 10px 30px rgba(78,136,242,.45)}
  .btn.ghost{background:rgba(255,255,255,.06);color:var(--text);border:1px solid rgba(255,255,255,.10)}
  /* floating help */
  .fab{position:fixed;right:22px;bottom:22px;height:56px;border-radius:999px;background:linear-gradient(180deg,#8a5cff,#6a48ff);color:white;padding:0 18px 0 14px;display:flex;align-items:center;gap:10px;box-shadow:0 18px 40px rgba(106,72,255,.4);border:0;font-weight:700;letter-spacing:.01em;cursor:pointer}
  .fab svg{width:20px;height:20px}
  .overlay{position:fixed;inset:0;background:rgba(3,6,18,.55);opacity:0;visibility:hidden;transition:opacity .2s ease, visibility .2s ease}
  .overlay.open{opacity:1;visibility:visible}
  .drawer{position:fixed;top:0;right:-380px;width:360px;height:100vh;background:#0f1428;border-left:1px solid rgba(255,255,255,.08);box-shadow:-24px 0 60px rgba(0,0,0,.35);transition:right .25s ease;display:flex;flex-direction:column}
  .drawer.open{right:0}
  .drawer header{padding:18px 18px 12px;border-bottom:1px solid rgba(255,255,255,.06)}
  .drawer header h3{margin:0;font-size:18px}
  .drawer .content{padding:16px 18px 22px;overflow:auto}
  .doclink{display:block;font-weight:700;background:rgba(106,161,255,.12);border:1px solid rgba(106,161,255,.30);color:#cfe0ff;padding:12px 14px;border-radius:12px;text-decoration:none;word-break:break-word}
  .muted{color:var(--muted);font-size:13px;margin-top:10px}
  @media (max-width:780px){ .row{grid-template-columns:1fr} .drawer{width:92vw} }
</style>
</head>
<body>

<?php
  $CI = get_instance();
  $active = $CI->router->class; // 'concession' or 'ticketbooking'
  $method  = $CI->router->method;  // 'index' or 'new'
?>
<header class="top">
  <div class="inner">
    <div class="brand">CI3 Demo</div>
    <nav class="nav">
        <a href="<?php echo site_url('concession'); ?>"
            class="<?php echo ($active==='concession' && $method==='index') ? 'active' : ''; ?>">
            Concession
        </a>

        <a href="<?php echo site_url('concession/new'); ?>"
            class="<?php echo ($active==='concession' && $method==='new') ? 'active' : ''; ?>">
            New Concession
        </a>
        <a href="<?php echo site_url('ticket-booking'); ?>"
            class="<?php echo $active==='ticketbooking' ? 'active' : ''; ?>">
            Ticket Booking
        </a>
    </nav>
  </div>
</header>

<div class="wrap">
