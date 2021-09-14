<?php

class Point {
    private int $x;
    private int $y;

    public function __construct(int $x, int $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function getx (): int {
        return $this->x;
    }

    public function gety (): int {
        return $this->y;
    }

    public function setx ($amount): void {
        $this->x = $amount;
    }

    public function sety($amount): void {
        $this->y = $amount;
    }
}



class Points {

    public function __construct($coordinates1, $coordinates2) {
        $this->coordinates1 = $coordinates1;
        $this->coordinates2 = $coordinates2;
    }

    public function swapPoints() {
        $first = $this->coordinates1->getx($this->coordinates1);
        $second = $this->coordinates1->gety($this->coordinates1);
        $this->coordinates1->setx($this->coordinates2->getx());
        $this->coordinates1->sety($this->coordinates2->gety());
        $this->coordinates2->setx($first);
        $this->coordinates2->sety($second);
    }

}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

$swapped = new Points($p1, $p2);
$swapped->swapPoints();

var_dump($swapped);
