<?php
$output = shell_exec('git-reset-hard.sh');

echo "<pre>result = $output</pre>";
