<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header', ['page_title' => $page_title]); ?>

<section class="hero">
  <span class="kicker">Module</span>
  <h1>Concession Request</h1>
  <p class="lead">Submit and track concession requests. Use the Help button …</p>

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
    <textarea rows="5" placeholder="Describe the reason…"></textarea>

    <div class="actions">
      <button class="btn primary" type="button">Submit request</button>
      <button class="btn ghost" type="button">Save draft</button>
    </div>
  </div>
</section>

<!-- Help button -->
<button class="fab" onclick="openHelp('<?php echo $doc_slug; ?>')">Help</button>

<div class="overlay" id="overlay"></div>
<aside class="drawer" id="drawer" aria-hidden="true">
  <header><h3 id="docTitle">Help and docs</h3></header>
  <div class="content" id="docBody">
    <p class="muted">Loading documentation...</p>
  </div>
</aside>

<?php $this->load->view('partials/footer'); ?>
