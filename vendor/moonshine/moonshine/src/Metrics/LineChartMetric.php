<?php

declare(strict_types=1);

namespace MoonShine\Metrics;

class LineChartMetric extends Metric
{
    protected static string $view = 'moonshine::metrics.line-chart';

    protected array $lines = [];

    protected array $colors = [];

    protected array $assets = [
        'vendor/moonshine/libs/apexcharts/apexcharts.min.js',
        'vendor/moonshine/libs/apexcharts/apexcharts-config.js',
    ];

    public function lines(): array
    {
        return $this->lines;
    }

    public function line(array $line, string|array $color = '#7843E9'): static
    {
        $this->lines[] = $line;

        if(is_string($color)) {
            $this->colors[] = $color;
        } else {
            $this->colors = $color;
        }

        return $this;
    }

    public function color(int $index): string
    {
        return $this->colors[$index];
    }

    public function colors(): array
    {
        return $this->colors;
    }

    public function labels(): array
    {
        return collect($this->lines())
            ->collapse()
            ->mapWithKeys(fn ($item) => $item)
            ->sortKeys()
            ->keys()
            ->toArray();
    }
}
