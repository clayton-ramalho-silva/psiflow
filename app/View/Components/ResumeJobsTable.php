<?php

namespace App\View\Components;

use App\Models\Resume;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ResumeJobsTable extends Component
{
    public $resume;   
    public $vagasAssociadas;       


    /**
     * Create a new component instance.
     */
    public function __construct(Resume $resume)
    {
        $this->resume = $resume;
    }
    

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        $this->vagasAssociadas = $this->getVagasAssociadas();

        return view('components.resume-jobs-table');
    }


    public function getVagasAssociadas()
    {
       $vagasAssociadas = $this->resume->jobs()
                ->whereDoesntHave('selections', function ($query) {
                    $query->where('resume_id', $this->resume->id);
                })
                ->get();
        
        return $vagasAssociadas;
    }
}
