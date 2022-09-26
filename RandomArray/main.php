<?php
include './RandomArray.php';
include './Rand.php';
include './Size.php';
include './SumList.php';

const SEPARATOR = ' | ';

$randomArray = RandomArray::make(
    new Size(5, 7),
    new Rand(1, 100)
);

foreach ($randomArray->getArray() as $arrayRow) {
    echo implode(SEPARATOR, $arrayRow) . PHP_EOL;
}

foreach ($randomArray->getSumList()->getRow() as $rowIndex => $sum) {
    echo sprintf("row %s sum = %s %s", ++$rowIndex, $sum, PHP_EOL);
}

foreach ($randomArray->getSumList()->getCol() as $colIndex => $sum) {
    echo sprintf("column %s sum = %s %s", ++$colIndex, $sum, PHP_EOL);
}
