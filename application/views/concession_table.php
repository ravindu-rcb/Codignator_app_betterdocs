<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('partials/header', ['page_title' => $page_title]); ?>

<section class="hero">
  <span class="kicker">Module</span>
  <h1>Concession Table</h1>
  <p class="lead">List of concession requests. Click Help to open the BetterDocs article.</p>

  <div class="card">
    <h2>All concessions</h2>

    <div style="overflow:auto">
      <table style="width:100%; border-collapse:collapse">
        <thead>
          <tr style="text-align:left">
            <th style="padding:10px 12px; border-bottom:1px solid rgba(255,255,255,.08)">ID</th>
            <th style="padding:10px 12px; border-bottom:1px solid rgba(255,255,255,.08)">Requester</th>
            <th style="padding:10px 12px; border-bottom:1px solid rgba(255,255,255,.08)">Type</th>
            <th style="padding:10px 12px; border-bottom:1px solid rgba(255,255,255,.08)">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $r): ?>
          <tr>
            <td style="padding:10px 12px; border-bottom:1px solid rgba(255,255,255,.06)"><?php echo html_escape($r['ID']); ?></td>
            <td style="padding:10px 12px; border-bottom:1px solid rgba(255,255,255,.06)"><?php echo html_escape($r['Requester']); ?></td>
            <td style="padding:10px 12px; border-bottom:1px solid rgba(255,255,255,.06)"><?php echo html_escape($r['Type']); ?></td>
            <td style="padding:10px 12px; border-bottom:1px solid rgba(255,255,255,.06)"><?php echo html_escape($r['Status']); ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div class="actions">
      <a class="btn ghost" href="<?php echo site_url('concession/new'); ?>">New request</a>
    </div>
  </div>
</section>

<!-- Help button uses the BetterDocs slug you passed -->
<button class="fab" onclick="openHelp('<?php echo $doc_slug; ?>')" title="Open help">Help</button>

<div class="overlay" id="overlay"></div>
<aside class="drawer" id="drawer" aria-hidden="true">
  <header><h3 id="docTitle">Help and docs</h3></header>
  <div class="content" id="docBody">
    <p class="muted">Loading documentation...</p>
  </div>
</aside>

<?php $this->load->view('partials/footer'); ?>
