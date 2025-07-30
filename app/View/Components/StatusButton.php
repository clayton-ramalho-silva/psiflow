<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusButton extends Component
{
    public $id;
    public $status;
    public $route;
    public $statusOptions;
    /**
     * Create a new component instance.
     */
    public function __construct($id, $status, $route = 'resumes.updateStatus')
    {
        $this->id = $id;
        $this->status = $status;
        $this->route = $route;
        $this->statusOptions = [
            'ativo' => 'Ativo',
            'inativo' => 'Inativo',
            'processo' => 'Em processo',
            'contratado' => 'Contratado'
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.status-button');
    }
}
