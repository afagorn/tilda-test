<?php
include './Staircase.php';

$staircase = Staircase::make(100);

foreach ($staircase->getArray() as $row) {
    echo sprintf('%s%s', $row, PHP_EOL);
}
