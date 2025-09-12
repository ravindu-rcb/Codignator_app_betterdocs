<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP Error</title>
</head>
<body>
    <h2>A PHP Error was encountered</h2>
    <p><strong>Severity:</strong> <?php echo $severity; ?></p>
    <p><strong>Message:</strong> <?php echo $message; ?></p>
    <p><strong>Filename:</strong> <?php echo $filepath; ?></p>
    <p><strong>Line Number:</strong> <?php echo $line; ?></p>
</body>
</html>
