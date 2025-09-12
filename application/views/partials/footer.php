<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
</div> <!-- .wrap -->

<script>
  // Open BetterDocs content in the drawer, based on slug
  async function openHelp(slug){
    const overlay = document.getElementById('overlay');
    const drawer  = document.getElementById('drawer');
    const titleEl = document.getElementById('docTitle');
    const bodyEl  = document.getElementById('docBody');

    // open the drawer
    overlay.classList.add('open');
    drawer.classList.add('open');
    drawer.setAttribute('aria-hidden','false');

    titleEl.textContent = 'Loading...';
    bodyEl.innerHTML = '<p class="muted">Fetching documentation from WordPress...</p>';

    try {
      const res = await fetch('<?php echo site_url('api/docs'); ?>/' + encodeURIComponent(slug));
      if(!res.ok){
        titleEl.textContent = 'Help and docs';
        bodyEl.innerHTML = '<p class="muted">Could not load, status ' + res.status + '.</p>';
        return;
      }
      const data = await res.json();
      titleEl.innerHTML = data.title || 'Help and docs';
      bodyEl.innerHTML  = (data.content || '') +
        (data.link ? '<p class="muted" style="margin-top:12px">Open full page, <a class="doclink" href="'+data.link+'" target="_blank" rel="noopener">view in WordPress</a></p>' : '');
    } catch(err){
      titleEl.textContent = 'Help and docs';
      bodyEl.innerHTML = '<p class="muted">Network error while fetching documentation.</p>';
    }
  }

  // drawer close handlers
  const overlay = document.getElementById('overlay');
  const drawer  = document.getElementById('drawer');
  function closeDrawer(){ overlay.classList.remove('open'); drawer.classList.remove('open'); drawer.setAttribute('aria-hidden','true'); }
  if (overlay){ overlay.addEventListener('click', closeDrawer); }
  document.addEventListener('keydown', e => { if (e.key === 'Escape') closeDrawer(); });
</script>

</body>
</html>
