<?php

declare(strict_types=1);

class Size
{
    private int $row;
    private int $col;

    public function __construct(int $row, int $col)
    {
        if ($row <= 0 || $col <= 0) {
            throw new DomainException('Invalid array size');
        }

        $this->row = $row;
        $this->col = $col;
    }

    public function getCol(): int
    {
        return $this->col;
    }

    public function getRow(): int
    {
        return $this->row;
    }
}
