<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class PricingChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($title, $prices, $dates): \ArielMejiaDev\LarapexCharts\LineChart
    {
        return $this->chart->lineChart()
            ->setTitle($title)
            ->addData('Price', $prices)
            ->setXAxis($dates);
    }
}
