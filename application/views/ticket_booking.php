<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header', ['page_title'=>$page_title]); ?>

<section class="hero">
  <span class="kicker">Module</span>
  <h1>Ticket Booking</h1>
  <p class="lead">Create and manage ticket bookings. Use the Help button for the Ticket Booking guide in BetterDocs.</p>

  <div class="card">
    <h2>New booking</h2>

    <div class="row">
      <div>
        <label>Customer name</label>
        <input type="text" placeholder="Enter customer name"/>
      </div>
      <div>
        <label>Contact number</label>
        <input type="text" placeholder="07x xxxxxxx"/>
      </div>
    </div>

    <div class="row">
      <div>
        <label>Event</label>
        <input type="text" placeholder="Event name"/>
      </div>
      <div>
        <label>Date</label>
        <input type="text" placeholder="YYYY-MM-DD"/>
      </div>
    </div>

    <div class="row">
      <div>
        <label>Seats</label>
        <input type="text" placeholder="Number of seats"/>
      </div>
      <div>
        <label>Reference ID (optional)</label>
        <input type="text" placeholder="Booking reference"/>
      </div>
    </div>

    <div class="actions">
      <button class="btn primary" type="button">Confirm booking</button>
      <button class="btn ghost" type="button">Save draft</button>
    </div>
  </div>
</section>

<!-- floating Help -->
<button class="fab" onclick="openHelp('add-movie-event')" title="Open help">
  <svg viewBox="0 0 24 24" fill="none">
    <path d="M12 2a10 10 0 1 0 .001 20.001A10 10 0 0 0 12 2Zm0 14.5a1.25 1.25 0 1 1 0 2.5 1.25 1.25 0 0 1 0-2.5Zm1.2-9.4c1.62.44 2.8 1.8 2.8 3.4 0 1.38-.8 2.44-2.02 3.22-.52.32-.88.86-.98 1.48l-.05.3h-1.9l.06-.36c.2-1.26.94-2.16 1.94-2.78.84-.52 1.25-1.08 1.25-1.86 0-.88-.66-1.6-1.64-1.86-1.24-.34-2.48.3-2.9 1.5l-1.78-.62c.68-1.98 2.88-3.08 4.92-2.56Z" fill="currentColor"/>
  </svg>
  Help
</button>


<div class="overlay" id="overlay"></div>
<aside class="drawer" id="drawer" aria-hidden="true">
  <header><h3 id="docTitle">Help and docs</h3></header>
  <div class="content" id="docBody">
    <p class="muted">Loading documentation...</p>
  </div>
</aside>


<?php $this->load->view('partials/footer'); ?>
