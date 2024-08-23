<?php

namespace Rappasoft\LaravelLivewireTables\Views\Traits\Actions;

use Illuminate\View\ComponentAttributeBag;

trait HasActionAttributes
{
    protected array $actionAttributes = ['default-styling' => true, 'default-colors' => true];

    public function setActionAttributes(array $actionAttributes): self
    {
        $this->actionAttributes = [...['default-styling' => true, 'default-colors' => true], ...$actionAttributes];

        return $this;
    }

    public function getActionAttributes(): ComponentAttributeBag
    {
        $actionAttributes = [...['default-styling' => true, 'default-colors' => true], ...$this->actionAttributes];

        if (! $this->hasWireAction() && method_exists($this, 'getRoute')) {
            $actionAttributes['href'] = $this->getRoute();
        } else {
            $actionAttributes['href'] = '#';
        }

        return new ComponentAttributeBag($actionAttributes);
    }
}