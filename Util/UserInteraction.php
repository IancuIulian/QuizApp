<?php
declare(strict_types=1);


function askForInput(): string
{
    $handle = fopen("php://stdin", "r");
    $line   = fgets($handle);
    fclose($handle);
    return trim($line);
}
