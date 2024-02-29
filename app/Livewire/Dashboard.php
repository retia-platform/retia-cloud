<?php

namespace App\Livewire;

use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Livewire\Component;

class Dashboard extends Component
{
    private $inThroughputChartModel;

    private $outThroughputChartModel;

    public function mount()
    {
        $this->inThroughputChartModel = (new ColumnChartModel())
            ->addColumn('#1', 100, '#000000')
            ->addColumn('#2', 200, '#000000')
            ->addColumn('#3', 300, '#000000')
            ->addColumn('#4', 400, '#000000')
            ->addColumn('#5', 500, '#000000')
            ->setAnimated(true)
            ->withoutLegend();

        $this->outThroughputChartModel = (new ColumnChartModel())
            ->addColumn('#1', 100, '#000000')
            ->addColumn('#2', 200, '#000000')
            ->addColumn('#3', 300, '#000000')
            ->addColumn('#4', 400, '#000000')
            ->addColumn('#5', 500, '#000000')
            ->setAnimated(true)
            ->withoutLegend();
    }

    public function render()
    {
        return view('livewire.dashboard', [
            'inThroughputChartModel' => $this->inThroughputChartModel,
            'outThroughputChartModel' => $this->outThroughputChartModel,
        ]);
    }
}
