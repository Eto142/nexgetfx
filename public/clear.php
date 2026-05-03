<?php
$base = dirname(__DIR__);
$output = shell_exec('cd ' . escapeshellarg($base) . ' && php artisan config:clear && php artisan cache:clear && php artisan view:clear && php artisan route:clear 2>&1');
echo '<pre>' . htmlspecialchars($output) . '</pre>';
echo '<br><strong>Done! Delete this file now.</strong>';
