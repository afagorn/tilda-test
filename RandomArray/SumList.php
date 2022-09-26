<?php

declare(strict_types=1);

class SumList
{
    private array $row;
    private array $col;

    public function __construct(array $row, $col)
    {
        $this->row = $row;
        $this->col = $col;
    }

    public function getRow(): array
    {
        return $this->row;
    }

    public function getCol(): array
    {
        return $this->col;
    }
}
