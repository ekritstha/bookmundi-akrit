<?php
class PriceFilter {
    private $ids;
    private $prices;

    public function __construct($ids, $prices) {
        $this->ids = $ids;
        $this->prices = $prices;
    }

    public function filter($threshold) {
        $filtered = array();
        for ($i = 0; $i < count($this->prices); $i++) {
            if ($this->prices[$i] > $threshold) {
                $filtered[] = $this->ids[$i];
            }
        }
        return $filtered;
    }

    public function sum($threshold) {
        $filtered_ids = $this->filter($threshold);
        $sum = 0;
        for ($i = 0; $i < count($filtered_ids); $i++) {
            $id = $filtered_ids[$i];
            $index = array_search($id, $this->ids);
            $sum += $this->prices[$index];
        }
        return $sum;
    }
}

$ids = array('A', 'B', 'C', 'D', 'E');
$prices = array(10, 20, 30, 40, 50);
$threshold = 30;

$filter = new PriceFilter($ids, $prices);
$filtered_ids = $filter->filter($threshold);
echo "IDs with prices greater than $threshold: " . implode(', ', $filtered_ids) . "\n";

$total_sum = $filter->sum($threshold);
echo "Total sum of prices greater than $threshold: $total_sum\n";

?>