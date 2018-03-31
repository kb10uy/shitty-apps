<?php
namespace Library;

class GachaPicker
{
    protected $weights;
    protected $values;
    protected $borders;
    protected $totalWeight;

    public function __construct(array $values)
    {
        if (count($values) === 0) throw new Exception('Invalid');
        $this->weights = [];
        $this->values = [];
        $this->borders = [];
        $this->totalWeight = 0;

        foreach ($values as $key => $value) {
            $this->values[] = $key;
            $this->weights[] = $value;
            $this->totalWeight = $this->borders[] = $this->totalWeight + $value;
        }
    }

    public function pickValue()
    {
        $index = 0;
        $r = mt_rand(0, $this->totalWeight - 1);
        while($this->borders[$index] <= $r) $index++;
        return $this->values[$index];
    }

    public function pickIndex()
    {
        $index = 0;
        $r = mt_rand(0, $this->totalWeight - 1);
        while($this->borders[$index] <= $r) $index++;
        return $index;
    }
}
