<?php

namespace App\View\Components;

use App\Models\Resume;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ResumeSelectionsTable extends Component
{
    public $resume;
    public $jobAprovado;
    public $selections;
    public $VagasAssociadasComSelecoes;
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
        $temSelecaoAprovada = $this->resume->selections->contains('status_selecao', 'aprovado');

        
        if( $temSelecaoAprovada ) {
            $selection = $this->resume->selections->where('status_selecao', 'aprovado')->first();
            $this->jobAprovado = $selection->job;
        }

        
        $this->selections = $this->resume->selections;
        $this->VagasAssociadasComSelecoes = $this->getVagasAssociadasComSelecoes();
        // dd($this->VagasAssociadasComSelecoes);
        // dd($this->selections);
            

        return view('components.resume-selections-table');
    }

     public function getVagasAssociadasComSelecoes()
    {
        $VagasAssociadasComSelecoes = $this->resume->jobs()
                    ->whereHas('selections', function ($query) {
                        $query->where('resume_id', $this->resume->id);
                    })
                    ->get();
        
        return $VagasAssociadasComSelecoes;
    }
}
