<?php

declare(strict_types=1);

class RandomArray {
    private array $array;
    private Size $size;
    private Rand $rand;
    private SumList $sumList;

    private function __construct(Size $size, Rand $rand)
    {
        $this->size = $size;
        $this->rand = $rand;

        $this->create();
    }

    public function getArray(): array
    {
        return $this->array;
    }

    public function getSumList(): SumList
    {
        if (empty($this->sumList)) {
            $this->sumList = $this->countSumList();
        }

        return $this->sumList;
    }

    public function getRand(): Rand
    {
        return $this->rand;
    }

    public function getSize(): Size
    {
        return $this->size;
    }

    public static function make(Size $size, Rand $rand): randomArray
    {
        return new self($size, $rand);
    }

    private function create() {
        $array = [];

        for ($row=0; $row < $this->size->getRow(); $row++) {
            for ($col=0; $col < $this->size->getCol(); $col++) {
                $array[$row][$col] = $this->rand->getRand();
            }
        }

        $this->array = $array;
    }

    public function countSumList(): SumList
    {
        $sumColList = array_fill(0, $this->size->getCol(), 0);
        $sumRowList = [];

        for ($row=0; $row < $this->size->getRow(); $row++) {
            $sumRowList[$row] = array_sum($this->array[$row]);

            for ($col=0; $col < $this->size->getCol(); $col++) {
                $sumColList[$col] += $this->array[$row][$col];
            }
        }

        return new SumList($sumRowList, $sumColList);
    }
}
