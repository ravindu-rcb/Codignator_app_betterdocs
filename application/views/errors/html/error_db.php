<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Database error</title>
<style>body{font-family:Arial,Helvetica,sans-serif;padding:24px} pre{background:#f5f5f5;padding:12px;border-radius:6px}</style>
</head><body>
  <h2>Database error</h2>
  <p><?php echo isset($heading) ? $heading : 'DB error'; ?></p>
  <pre><?php echo isset($message) ? $message : 'No details'; ?></pre>
</body></html>
