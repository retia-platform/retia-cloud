<?php

namespace App\Traits;

use Asantibanez\LivewireCharts\Models\LineChartModel;

trait Chartable
{
    public function generateLineChart(): LineChartModel
    {
        return (new LineChartModel())
            ->setColors(['#000000'])
            ->setAnimated(true)
            ->setSmoothCurve()
            ->multiLine()
            ->withoutLegend();
    }
}
