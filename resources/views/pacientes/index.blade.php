@extends('layouts.app')

@section('content')
<section class="cabecario">
    <h1>Currículos</h1>

    {{-- <div class="cabExtras">

        <div class="dropdown">
            <button class="dropdown-toggle" id="dropdownFiltro"  data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                <div class="btFiltros filtros">
                    <figure>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                    </figure>
                    <span>Filtros</span>
                </div>
            </button>
            
            <form id="filter-form" method="GET" action="{{ route('pacientes.index') }}" class="dropdown-menu bloco-filtros" aria-labelledby="dropdownFiltro">

                <div class="row d-flex">
                    <div class="col-12">
                        <label for="nome" class="form-label">Nome do Candidato</label>
                        <input type="text" name="nome" id="nome" class="form-control" value="{{ request('nome') }}" placeholder="Buscar por nome...">                        
                    </div>
                    <div class="col-6">
                        <label for="vagas_interesse" class="form-label">Vagas de Interesse</label>
                        <select name="vagas_interesse[]" id="vagas_interesse" class="form-select" multiple>
                            @foreach (  
                                        ['Copa & Cozinha', 'Administrativo', 'Camareiro(a) de Hotel', 
                                        'Recepcionista', 'Atendente de Lojas e Mercados (Comércio & Varejo)',
                                        'Construção e Reparos', 'Conservação e Limpeza'] as $option)
                                <option value="{{ $option }}" {{ in_array($option, request('vagas_interesse', []))? 'selected' : ''}}>
                                    {{ $option }}
                                </option>
                            @endforeach                           
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="experiencia_profissional" class="form-label">Experiência Profissional</label>
                        <select name="experiencia_profissional[]" id="experiencia_profissional" class="form-select" multiple>
                            @foreach (  
                                        ['Nenhuma por enquanto', 'Copa & Cozinha', 'Administrativo', 'Camareiro(a) de Hotel', 
                                        'Recepcionista', 'Atendente de Lojas e Mercados (Comércio & Varejo)', 'TI (Tecnologia da Informação',
                                        'Construção e Reparos', 'Conservação e Limpeza'] as $option)
                                <option value="{{ $option }}" {{ in_array($option, request('experiencia_profissional', []))? 'selected' : ''}}>
                                    {{ $option }}
                                </option>
                            @endforeach                            
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select select2">
                            <option value="">Todos</option>
                            <option value="ativo" {{ request('status') == 'ativo' ? 'selected' : '' }} > Disponível</option>
                            <option value="processo" {{ request('status') == 'processo' ? 'selected' : '' }}> Em processo</option>
                            <option value="contratado" {{ request('status') == 'contratado' ? 'selected' : '' }} > Contratado</option>
                            <option value="inativo" {{ request('status') == 'inativo' ? 'selected' : '' }}> Inativo</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="sexo" class="form-label">Gênero</label>
                        <select name="sexo" id="sexo" class="form-select select2">
                            <option value="">Todos</option>
                            <option value="Homem" {{ request('sexo') == 'Homem' ? 'selected' : '' }}> Homem</option>
                            <option value="Mulher" {{ request('sexo') == 'Mulher' ? 'selected' : '' }}> Mulher</option>
                            <option value="Prefiro não dizer" {{ request('sexo') == 'Prefiro não dizer' ? 'selected' : '' }}> Prefiro não dizer</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="cnh" class="form-label">Possui CNH?</label>
                        <select name="cnh" id="cnh" class="form-select select2">
                            <option value="">Todos</option>
                            <option value="Sim"  {{ request('cnh') == 'Sim' ? 'selected' : '' }}> Sim</option>
                            <option value="Não"  {{ request('cnh') == 'Não' ? 'selected' : '' }}> Não</option>
                            <option value="Em andamento"  {{ request('cnh') == 'Em andamento' ? 'selected' : '' }}> Em andamento</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="min_age" class="form-label">Idade mínima:</label>
                        <input type="number" name="min_age" id="min_age" class="form-control" value="{{ request('min_age')}}" >
                    </div>

                    <div class="col-6">
                        <label for="reservista" class="form-label">Possui Reservista?</label>
                        <select name="reservista" id="reservista" class="form-select select2">
                            <option value="">Todos</option>
                            <option value="Sim" {{ request('reservista') == 'Sim' ? 'selected' : '' }}> Sim</option>
                            <option value="Não" {{ request('reservista') == 'Não' ? 'selected' : '' }}> Não</option>
                            <option value="Em andamento" {{ request('reservista') == 'Em andamento' ? 'selected' : '' }}> Em andamento</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="foi_jovem_aprendiz" class="form-label">Já foi Jovem Aprendiz?</label>
                        <select name="foi_jovem_aprendiz" id="foi_jovem_aprendiz" class="form-select select2">
                            <option value="">Todos</option>
                            <option value="Sim, da ASPPE"  {{ request('foi_jovem_aprendiz') == 'Sim, da ASPPE' ? 'selected' : '' }}> Sim, da ASPPE</option>
                            <option value="Sim, de Outra Qualificadora"  {{ request('foi_jovem_aprendiz') == 'Sim, de Outra Qualificadora' ? 'selected' : '' }}> Sim, de Outra Qualificadora</option>
                            <option value="Não"  {{ request('foi_jovem_aprendiz') == 'Não' ? 'selected' : '' }}> Não</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="escolaridade" class="form-label">Formação/Escolaridade</label>
                        <select name="escolaridade" id="escolaridade" class="form-select select2">
                            <option value="">Todos</option>
                            <option value="Ensino Fundamental Completo" {{ request('escolaridade') == 'Ensino Fundamental Completo' ? 'selected' : '' }}> Ensino Fundamental Completo</option>
                            <option value="Ensino Fundamental Cursando" {{ request('escolaridade') == 'Ensino Fundamental Cursando' ? 'selected' : '' }}> Ensino Fundamental Cursando</option>
                            <option value="Ensino Médio Completo" {{ request('escolaridade') == 'Ensino Médio Completo' ? 'selected' : '' }}> Ensino Médio Completo</option>
                            <option value="Ensino Médio Incompleto" {{ request('escolaridade') == 'Ensino Médio Incompleto' ? 'selected' : '' }}>  Ensino Médio Cursando</option>
                            <option value="Ensino Técnico Completo" {{ request('escolaridade') == 'Ensino Técnico Completo' ? 'selected' : '' }}> Ensino Técnico Completo</option>
                            <option value="Ensino Técnico Cursando" {{ request('escolaridade') == 'Ensino Técnico Cursando' ? 'selected' : '' }}> Ensino Técnico Cursando</option>
                            <option value="Superior Completo" {{ request('escolaridade') == 'Superior Completo' ? 'selected' : '' }}> Superior Completo</option>
                            <option value="Superior Cursando" {{ request('escolaridade') == 'Superior Cursando' ? 'selected' : '' }}> Superior Cursando</option>
                            <option value="Outro" {{ request('escolaridade') == 'Outro' ? 'selected' : '' }}> Outro</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="informatica" class="form-label">Possui conhecimento no pacote Office (Excel/Word)?</label>
                        <select name="informatica" id="informatica" class="form-select select2">
                            <option value="">Todos</option>
                            <option value="Básico" {{ request('informatica') == 'Básico' ? 'selected' : '' }}> Básico</option>
                            <option value="Intermediário" {{ request('informatica') == 'Intermediário' ? 'selected' : '' }}> Intermediário</option>
                            <option value="Avançado" {{ request('informatica') == 'Avançado' ? 'selected' : '' }}> Avançado</option>
                            <option value="Nenhum" {{ request('informatica') == 'Nenhum' ? 'selected' : '' }}> Nenhum</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="ingles" class="form-label">Inglês</label>
                        <select name="ingles" id="ingles" class="form-select select2">
                            <option value="">Todos</option>
                            <option value="Básico" {{ request('ingles') == 'Básico' ? 'selected' : '' }}> Básico</option>
                            <option value="Intermediário" {{ request('ingles') == 'Intermediário' ? 'selected' : '' }}> Intermediário</option>
                            <option value="Avançado" {{ request('ingles') == 'Avançado' ? 'selected' : '' }}> Avançado</option>
                            <option value="Nenhum" {{ request('ingles') == 'Nenhum' ? 'selected' : '' }}> Nenhum</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="cidade" class="form-label">Cidade:</label>
                        <select id="cidade" name="cidade" class="form-select select2">
                            <option>Todas</option>
                            @php
                            echo get_cidades($pacientes, 3);
                            @endphp
                        </select>
                    </div>
                  
                    <div class="col-6 mb-4">
                        <label for="data_min" class="form-label">Data Cadastro (de):</label>
                        <input type="date" name="data_min" id="data_min" class="form-control" value="{{ request('data_min') }}">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="data_max" class="form-label">Data Cadastro (até):</label>
                        <input type="date" name="data_max" id="data_max" class="form-control" value="{{ request('data_max') }}">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="filtro_data" class="form-label">Filtrar por Data</label>
                        <select name="filtro_data" id="filtro_data" class="form-select select2">
                            <option value="">Todas</option>
                            <option value="7" {{ request('filtro_data') == '7' ? 'selected' : '' }}>Últimos 7 dias</option>
                            <option value="15" {{ request('filtro_data') == '15' ? 'selected' : '' }}>Últimos 15 dias</option>
                            <option value="30" {{ request('filtro_data') == '30' ? 'selected' : '' }}>Últimos 30 dias</option>
                            <option value="90" {{ request('filtro_data') == '90' ? 'selected' : '' }}>Últimos 90 dias</option>
                        </select>
                    </div>

                     <div class="col-6 mb-4">
                        <label for="ingles" class="form-label">PCD</label>
                        <select name="pcd" id="pcd" class="form-select select2">
                            <option value="">Todos</option>
                            <option value="Sim, com laudo." {{ request('pcd') == 'Sim, com laudo.' ? 'selected' : '' }}> Sim, com laudo.</option>
                            <option value="Sim, sem laudo." {{ request('pcd') == 'Sim, sem laudo.' ? 'selected' : '' }}> Sim, sem laudo.</option>
                            <option value="Não" {{ request('pcd') == 'Não' ? 'selected' : '' }}> Não</option>                            
                        </select>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="ingles" class="form-label">Sua família é atendida por algum equipamento do governo?</label>
                        <select name="cras" id="cras" class="form-select select2">
                            <option value="">Todos</option>
                            <option value="Sim" {{ request('cras') == 'Sim' ? 'selected' : '' }}> Sim</option>                            
                            <option value="Não" {{ request('cras') == 'Não' ? 'selected' : '' }}> Não</option>                            
                        </select>
                    </div>


                    <div class="col-12 mt-1 d-flex justify-content-between">
                        <button type="submit" class="btn btn-padrao btn-cadastrar">Filtrar</button>                        
                        <a href="{{ route('pacientes.index') }}" class="btn btn-padrao btn-cancelar" name="limpar" value="limpar">Limpar</a>
                    </div>

                </div>

            </form>

        </div>

    </div> --}}

</section>

<div class="bloco-filtros-ativos">
    Filtros ativos <span></span>
</div>


<section class="sessao">

    <article class="f-interna">

        <h4>Currículos em Destaque</h4>               
        <div class="table-container lista-curriculos">
            
            <ul class="tit-lista">
                <li class="col-nome">Nome</li> 
                <li class="col-data_nascimento">Data de Nascimento</li>
                <li class="col-genero">Gênero</li>
                <li class="col-endereco">Endereço</li>
                <li class="col-cidade">Cidade</li>
                <li class="col-uf">UF</li>
                <li class="col-email">E-mail</li>
                <li class="col-telefone_celular">Telefone Celular</li>
                <li class="col-telefone_recado">Telefone Fixo</li>               
                <li class="col-status">Status</li>
            </ul>

            @if ($pacientes->count() > 0)

                

                @foreach ($pacientes as $paciente)

                {{-- {{dd($paciente)}} --}}
                <ul onclick="window.open('{{ route('pacientes.edit', $paciente) }}', '_blank')" >                   
                    <li class="col-nome">
                        <div class="col-icon">
                            <b>Nome</b>
                            <svg class="ico-lista" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M3 19V5.7a1 1 0 0 1 .658-.94l9.671-3.516a.5.5 0 0 1 .671.47v4.953l6.316 2.105a1 1 0 0 1 .684.949V19h2v2H1v-2h2zm2 0h7V3.855L5 6.401V19zm14 0v-8.558l-5-1.667V19h5z"></path></g></svg>

                        </div>
                        <div class="col-info">
                            <span class="info-nome">
                                <strong>{{ $paciente->nome ?? '' }}</strong>
                            </span>                   

                        </div>

                    </li>
                    <li class="col-data_nascimento">
                        <b>Data de Nascimento</b>                        
                        {{ isset($paciente->data_nascimento) ? $paciente->data_nascimento->format('d/m/Y') : '' }}
                    </li>                    
                    <li class="col-genero">{{ $paciente->genero ?? ''}}</li>                                               

                    <li class="col-endereco">{{isset($paciente->endereco) ? $paciente->endereco : ''}}</li>
                    <li class="col-cidade">{{ isset($paciente->cidade) ? $paciente->cidade : '' }}</li>
                    <li class="col-uf">{{ isset($paciente->uf) ? $paciente->uf : ''}}</li>
                    <li class="col-email">                        
                        {{ $paciente->email ?? '' }}
                    </li>
                    <li class="col-telefone_celular">
                        @php
                            $celular = $paciente->telefone_celular ?? '';
                            if ($celular) {
                                $celular = preg_replace('/\D/', '', $celular);
                                if (strlen($celular) === 11) {
                                    // Formato: (11) 99999-9999
                                    $celular = '(' . substr($celular, 0, 2) . ') ' . substr($celular, 2, 5) . '-' . substr($celular, 7, 4);
                                } elseif (strlen($celular) === 10) {
                                    // Formato: (11) 9999-9999 (celular antigo)
                                    $celular = '(' . substr($celular, 0, 2) . ') ' . substr($celular, 2, 4) . '-' . substr($celular, 6, 4);
                                }
                            }
                        @endphp
                        {{ $celular }}
                    </li>
                    <li class="col-telefone_recado">
                        @php
                            $residencial = $paciente->telefone_fixo ?? '';
                            if ($residencial) {
                                $residencial = preg_replace('/\D/', '', $residencial);
                                if (strlen($residencial) === 10) {
                                    // Formato: (11) 3333-4444
                                    $residencial = '(' . substr($residencial, 0, 2) . ') ' . substr($residencial, 2, 4) . '-' . substr($residencial, 6, 4);
                                } elseif (strlen($residencial) === 11) {
                                    // Caso tenha 11 dígitos (com 9 na frente)
                                    $residencial = '(' . substr($residencial, 0, 2) . ') ' . substr($residencial, 2, 5) . '-' . substr($residencial, 7, 4);
                                }
                            }
                        @endphp
                        {{ $residencial }}
                    </li>
                    
                    <li class="col-status">
                        <b>Status</b>   
                        @if ($paciente->status === 'ativo')
                            <i class="fas fa-check-circle text-success"></i>
                        
                        @elseif ($paciente->status === 'inativo')
                            <i class="fas fa-ban text-danger"></i>
                        @else
                            <i class="fas fa-question-circle text-secondary"></i>
                        @endif                 

                        <span class="status-text">{{ ucfirst($paciente->status) }}</span>
                        
                        
                    </li>

                </ul>
                @endforeach

            @else
            <span class="sem-resultado">Nenhum paciente encontrado</span>
            @endif

            
        </div>
        <!-- No final da página, após a tabela ou lista de currículos -->
        <div class="pagination-wrapper">
            {{ $pacientes->appends(request()->query())->links('vendor.pagination.custom') }}
            <p class="pagination-info">Mostrando {{ $pacientes->firstItem() }} a {{ $pacientes->lastItem() }} de {{ $pacientes->total() }} currículos</p>
        </div>

    </article>

    <article class="f4 bts-interna">
        <a href="{{ route('pacientes.create') }}" class="btInt btCadastrar">Cadastrar <small>Paciente novo</small></a>
        @if (Auth::user()->email === 'marketing@asppe.org' || Auth::user()->email === 'clayton@email.com')
            {{-- <a href="{{ route('reports.export.pacientes') }}" class="btInt btExportar">Exportar <small>Exporte em excel</small></a> --}}
        @endif
        <a href="{{ route('companies.create') }}" class="btInt btHistorico">Histórico <small>Log de atividades</small></a>
    </article>
</section>
@endsection


@push('scripts-custom')
<script src="{{ asset('js/jquery.mask.js') }}"></script>
<script>

$(document).ready(function(){
    // Inicializa o Select2
    $('.bloco-filtros .select2').select2({
        placeholder: "Selecione",
    });

    // Botão limpar - redireciona para URL sem parâmetros
    $('button[name="limpar"]').on('click', function(e){
        e.preventDefault();
        window.location.href = "{{ route('pacientes.index') }}";
    });

    // Atualiza filtros ativos quando a página carrega
    updateActiveFilters();
});

// Função para mostrar filtros ativos
function updateActiveFilters(){
    let params = new URLSearchParams(window.location.search);
    let activeFilters = [];
    let filtersContainer = $('.bloco-filtros-ativos span');
    filtersContainer.empty(); // Limpa os filtros anteriores

    params.forEach((value, key) => {
        // Ignora parâmetros de paginação e vazios
        if( key !== 'page' && value && value !== 'Todos' && value !== 'Todas'){
            // Para arrays (selects múltiplos)
            if (key.endsWith('[]')){
                activeFilters.push(createFilterBadge(key.replace('[]', ''), value));
            } else {
                activeFilters.push(createFilterBadge(key, value));
            }
        }
    });

    if(activeFilters.length > 0) {
        filtersContainer.append(activeFilters);
        $('.bloco-filtros-ativos').slideDown(150);
    } else {
        $('.bloco-filtros-ativos').slideUp(150);
    }
}

// Cria um badge para cada filtro com botão de remover
function createFilterBadge(key, value) {
    // Cria um elemento span para o badge
    let badge = $('<span class="filter-badge"></span>');

    // Adiciona o valor do filtro
    badge.append(document.createTextNode(value));

    // Adciona o botão de remover (x)
    let removeBtn = $('<button class="remove-filter" data-key="'+key+'" data-value="'+value+'">x</button>');
    badge.append(removeBtn);

    return badge;
}

// Remove um filtro especifico e recarrega a pagina
$(document).on('click', '.remove-filter', function(){
    let key = $(this).data('key');
    let value = $(this).data('value');
    let url = new URL(window.location.href);
    let params = new URLSearchParams(url.search);

    // Para filtros multiplos (array)
    if (key.endsWith('[]')){
        let currentValues = params.getAll(key);
        let newValues = currentValues.filter(v => v !== value);

        // Remove o parametro completamente se não houver mais valores
        params.delete(key);
        newValues.forEach(v => params.append(key, v));
    }
    // Para filtro simples
    else {
        params.delete(key);
    }

    // Remove também a página para voltar a primeira
    params.delete('paga');

    // Atualiza a URL e recarrega
    window.location.href = url.pathname + '?' + params.toString();

});

</script>
@endpush



@push('css-custom')
<style>
.subtitulo{
    font-weight: 500;
    font-size: 12px;
    color: #aaa;
}
.btInt{
flex-wrap: nowrap;
}

.lista-curriculos{
    overflow: scroll;
    height: 500px;
}

.linha-tabela{
    cursor: pointer;
    transition: all 0.25s ease-in-out;
}
.linha-tabela:hover{
    box-shadow: 0 3px 3px rgba(0, 0, 0, 0.16) !important;
    border-radius: 8px;
}
.bloco-filtros .col-12{
    margin-bottom: 11px;
}
.bloco-filtros .col-12 .form-label {
    width: 100%;
    margin: 0 !important;
    font-weight: 700;
    padding-bottom: 7px;
    color: #333333;
}

/* Estilo dos badges de filtro*/
.bloco-filtros-ativos {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    font-weight: 700;
    font-size: 12px;
    margin: 10px 0;
    border-radius: 20px;
    -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
    -ms-border-radius: 20px;
    padding: 3px 14px;
    background-color: #F2F2F2;
    letter-spacing: normal;
}

.filter-badge {
    display: inline-block;
    margin-right: 8px;   
    padding: 5px 10px;
    padding-left: 24px;
    background: #fff;
    border-radius: 15px;
    font-size: 12px;
    position: relative;
}

.remove-filter {
    margin-left: 5px;
    background: none;
    border: none;
    color: #6c757d;
    cursor: pointer;
    padding: 0 5px;
    color: #ff0000;
    font-size: 15px;
    position: absolute;
    top: 3px;
    left: 0;
    font-weight: 700;
    font-family: 'Montserrat';
    line-height: 1em;
}

.remove-filter:hover {
    color: #dc3545;
}




/* css paginate */
/* Em seu arquivo CSS */
.pagination-container {
    margin-top: 20px;
}

.pagination {
    display: flex;
    list-style: none;
    padding: 0;
    justify-content: center;
}

.page-item {
    margin: 0 2px;
}

.page-link {
    display: block;
    padding: 8px 12px;
    border-radius: 4px;
    border: 1px solid #ddd;
    color: #007bff;
    text-decoration: none;
    transition: background-color 0.2s;
}

.page-item.active .page-link {
    background-color: #007bff;
    color: white;
    border-color: #007bff;
}

.page-item.disabled .page-link {
    color: #6c757d;
    pointer-events: none;
    cursor: default;
    background-color: #fff;
    border-color: #ddd;
}

.page-link:hover {
    background-color: #f8f9fa;
}

.btn-cancelar{
    padding: 10px 30px;
}



/* Estilo responsivo */
@media (max-width: 576px) {
    .pagination {
        flex-wrap: wrap;
    }
    
    .page-item {
        margin-bottom: 5px;
    }
}

.table-container.lista-curriculos {
    width: 100%;
    overflow-x: auto; /* Habilita scroll horizontal quando necessário */
    overflow-y: auto; /* Mantém o scroll vertical */
    white-space: nowrap; /* Impede que o conteúdo quebre em várias linhas */
    -webkit-overflow-scrolling: touch; /* Melhora o scroll em dispositivos móveis */
}

.tit-lista, .lista-curriculos > ul {
    min-width: 100%; /* Garante que a largura mínima seja 100% do container */
    display: inline-block; /* Ou você pode usar display: flex */
}

/* Se estiver usando flexbox (opcional) */
.tit-lista {
    display: flex;
    position: sticky;
    top: 0;
    background-color: #fff;
    z-index: 4;
}



.lista-curriculos > ul {
    display: flex;
}



.tit-lista {
    display: flex;
    flex-wrap: nowrap; /* Isso é essencial! */
}

.tit-lista li {
    flex-shrink: 0; /* Impede que os itens encolham */    
}

.lista-curriculos > ul {
    display: flex;
    flex-wrap: nowrap;
}

.lista-curriculos > ul > li {
    flex-shrink: 0;
    margin-right: 10px;
   
}

.table-container.lista-curriculos ul{
    width: fit-content;
}

/* coluna nome */
.col-nome{
    width: 400px;
}

.col-info{
    position: relative;
    margin-left: 15px;
}

p.badge{
    position: absolute;
    top: -18px;
    right: -30px;
}

/* coluna email */
.col-email{
    width: 250px;
}

.col-data_nascimento{
    width: 160px;
}

.col-rg{
    width: 160px;
}
.col-cpf{
    width: 160px;
}

.col-estado_civil{
    width: 160px;
}
.col-possui_filhos{
    width: 160px;
}
.col-instagram{
    width: 160px;
}
.col-linkedin{
    width: 190px;
}
.col-telefone_celular{
    width: 160px;
}
.col-telefone_recado{
    width: 160px;
}
.col-nome_recado{
    width: 160px;
}

.col-endereco{
    width: 200px;
    white-space: pre-wrap;
}
.col-cidade{
    width: 100px;
}
.col-uf{
    width: 50px;
}


/* coluna vaga */
.col-vaga{
    width: 200px;
    max-width: 200px;
    overflow: hidden;
}

.col-vaga p{
    white-space: pre-wrap;
    margin-bottom: 5px;
}

.col-experiencia_profissional{
    width: 200px;
    max-width: 200px;
    overflow: hidden;
}

.col-experiencia_profissional p{
    white-space: pre-wrap;
    margin-bottom: 5px;
}

.col-tamanho_uniforme{
    width: 200px;
}


/* coluna cnh */
.col-cnh{
    width: 100px;
}

/* coluna genero */
.col-genero{
    width: 100px;
}

/* coluna reservista */
.col-reservista{
    width: 115px;
}

.col-jovem-aprendiz{
    width: 200px;
}

.col-formacao{
    width: 240px;
}

.col-formacao_complemento{
    width: 240px;
    white-space: pre-wrap;
}
.col-informatica{
    width: 200px;
    white-space: pre-wrap;
}
.col-ingles{
    width: 100px;
}
.col-entrevistado{
    width: 115px;
    display: flex;
    justify-content: center;
}

.col-entrevistado a{
    width: auto;
    padding: 5px;
}

.col-status{
    width: 100px;
}

.col-status i{
    margin-right: 10px;
}

.col-filhos_sim, .col-genero_outro, .col-tipo_cnh, 
.col-pcd, .col-pcd_sim, .col-superior_periodo, .col-cras{
    width: 200px;
    white-space: pre-wrap;
}

.col-nacionalidade{
    width: 150px;
    white-space: pre-wrap;
}


</style>
@endpush