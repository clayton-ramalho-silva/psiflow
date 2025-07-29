<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ResumeEditForm extends Component
{
    public $resume;    
    public $editResume;
    /**
     * Create a new component instance.
     */
    public function __construct($resume, $editResume)
    {
        $this->resume = $resume;        
        $this->editResume = $editResume;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.resume-edit-form');
    }
}
