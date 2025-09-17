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
<button class="fab" onclick="openHelp('<?php echo $doc_slug; ?>')" title="Open help">Help</button>


<div class="overlay" id="overlay"></div>
<aside class="drawer" id="drawer" aria-hidden="true">
  <header><h3 id="docTitle">Help and docs</h3></header>
  <div class="content" id="docBody">
    <p class="muted">Loading documentation...</p>
  </div>
</aside>


<?php $this->load->view('partials/footer'); ?>
