<?php

$sep='\\\\';
file_put_contents(getenv('commtempfile'), sprintf("seconds=%0.3f%smegabytes=%0.2f", microtime(TRUE) - $iTSBegin, $sep, (memory_get_peak_usage() / (1024 * 1024))));