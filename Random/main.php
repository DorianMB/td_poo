<?php

use Illuminate\Support\Collection;

require '../vendor/autoload.php';


$allFile = __DIR__ . '/all.json';
$passedFile = __DIR__ . '/passed.json';

$all = collect(json_decode(file_get_contents($allFile), true));

$passed = file_exists($passedFile)
    ? collect(json_decode(file_get_contents($passedFile), true))
    : collect();

$student = $all->diff($passed)->random();

$passed->push($student);

$fp = fopen($passedFile, 'wb');
fwrite($fp, $passed->toJson());
fclose($fp);

echo "\n A ton tour $student ! \n\n";

if ($all->diff($passed)->isEmpty()) {
    unlink($passedFile);
    echo "Attention, ça repart... \n\n";
}
