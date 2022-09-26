<?php

declare(strict_types=1);

class Staircase
{
    private const SEPARATOR = ' ';
    private int $size;
    private array $array;

    private function __construct(int $size)
    {
        $this->setSize($size);
        $this->create();
    }

    public static function make(int $size): Staircase
    {
        return new self($size);
    }

    public function getArray(): array
    {
        if (empty($this->array)) {
            $this->create();
        }

        return $this->array;
    }

    private function setSize(int $size): void
    {
        if ($size <= 0) {
            throw new DomainException('Invalid size value');
        }

        $this->size = $size;
    }

    public function create()
    {
        $array = [];
        $row = 1;
        $current = 1;

        while ($current < $this->size) {
            $arrayRow = [];

            for ($i = 0; $i < $row; $i++) {
                if ($current > $this->size) {
                    break;
                }

                $arrayRow[] = $current++;
            }

            $array[$row] = implode(self::SEPARATOR, $arrayRow);
            $row++;
        }

        $this->array = $array;
    }
}
