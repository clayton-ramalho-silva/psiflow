<?php $__env->startSection('content'); ?>
<section class="cabecario">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(route('jobs.index')); ?>">Empresas</a></li>
          <li class="breadcrumb-item active" aria-current="page">Editar: Vaga #<?php echo e($job->id); ?></li>
        </ol>
      </nav>

      
      <?php
          // Guarda a rota na variável
          $rota = route('jobs.index');
      ?>

      <?php if (isset($component)) { $__componentOriginal78eb9c36ebd15b0f8e38a41369c837c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal78eb9c36ebd15b0f8e38a41369c837c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.voltar','data' => ['rota' => $rota]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('voltar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['rota' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($rota)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal78eb9c36ebd15b0f8e38a41369c837c8)): ?>
<?php $attributes = $__attributesOriginal78eb9c36ebd15b0f8e38a41369c837c8; ?>
<?php unset($__attributesOriginal78eb9c36ebd15b0f8e38a41369c837c8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal78eb9c36ebd15b0f8e38a41369c837c8)): ?>
<?php $component = $__componentOriginal78eb9c36ebd15b0f8e38a41369c837c8; ?>
<?php unset($__componentOriginal78eb9c36ebd15b0f8e38a41369c837c8); ?>
<?php endif; ?>
      

</section>

<section class="sessao">

    <article class="f1 container-form-create">

        <div class="container">

            <div class="row form-padrao">

                <div class="col-8 py-0 pe-5 form-l">

                    <h4 class="fw-normal mb-4">Detalhes da Vaga</h4>

                    <form id="form-jobs" class="form-padrao" action="<?php echo e(route('jobs.update', $job)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="row">

                            <div class="mb-3 col-12">
                                <input type="text" name="company_id" id="company_id" class="floatlabel form-control" placeholder="Empresa" value="<?php echo e($job->company->nome_fantasia); ?>" disabled>
                                <?php $__errorArgs = ['company_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            

                            <div class="mb-3 form-campo col-6">
                                <div class="floatlabel-wrapper required">
                                    <label for="cargo" class="label-floatlabel" class="form-label floatlabel-label">Setor</label>
                                    <select name="cargo" id="cargo" class="form-select active-floatlabel" required>
                                        <option></option>
                                        <option value="Copa & Cozinha" <?php echo e($job->cargo === 'Copa & Cozinha' ? 'selected' : ''); ?> >Copa & Cozinha</option>
                                        <option value="Administrativo" <?php echo e($job->cargo === 'Administrativo' ? 'selected' : ''); ?>>Administrativo</option>
                                        <option value="Camareiro(a) de Hotel" <?php echo e($job->cargo === 'Camareiro(a) de Hotel' ? 'selected' : ''); ?>>Camareiro(a) de Hotel</option>
                                        <option value="Recepcionista" <?php echo e($job->cargo === 'Recepcionista' ? 'selected' : ''); ?>>Recepcionista</option>
                                        <option value="Atendente de Lojas e Mercados (Comércio & Varejo)" <?php echo e($job->cargo === 'Atendente de Lojas e Mercados (Comércio & Varejo)' ? 'selected' : ''); ?>>Atendente de Lojas e Mercados (Comércio & Varejo)</option>
                                        <option value="Construção e Reparos" <?php echo e($job->cargo === 'Construção e Reparos' ? 'selected' : ''); ?>>Construção e Reparos</option>
                                        <option value="Conservação e Limpeza" <?php echo e($job->cargo === 'Conservação e Limpeza' ? 'selected' : ''); ?>>Conservação e Limpeza</option>
                                    </select>
                                    <?php $__errorArgs = ['cargo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="mb-3 form-campo col-6">
                                <div class="floatlabel-wrapper required">
                                    <label for="cbo" class="label-floatlabel" class="form-label floatlabel-label">CBO</label>
                                    <select name="cbo" id="cbo" class="form-select active-floatlabel" required>
                                        <option></option>
                                        <option value="4110-10" <?php echo e($job->cbo === '4110-10' ? 'selected' : ''); ?>>4110-10 / Assistente Administrativo</option>
                                        <option value="4122-05" <?php echo e($job->cbo === '4122-05' ? 'selected' : ''); ?>>4122-05 / Contínuo</option>
                                        <option value="4211-25" <?php echo e($job->cbo === '4211-25' ? 'selected' : ''); ?>>4211-25 / Operador de Caixa</option>
                                        <option value="4221-05" <?php echo e($job->cbo === '4221-05' ? 'selected' : ''); ?>>4221-05 / Recepcionista Geral</option>
                                        <option value="5133-15" <?php echo e($job->cbo === '5133-15' ? 'selected' : ''); ?>>5133-15 / Camareiro de Hotel</option>
                                        <option value="5134-05" <?php echo e($job->cbo === '5134-05' ? 'selected' : ''); ?>>5134-05 / Garçom</option>
                                        <option value="5134-15" <?php echo e($job->cbo === '5134-15' ? 'selected' : ''); ?>>5134-15 / Cumim</option>
                                        <option value="5134-25" <?php echo e($job->cbo === '5134-25' ? 'selected' : ''); ?>>5134-25 / Copeiro</option>
                                        <option value="5134-35" <?php echo e($job->cbo === '5134-35' ? 'selected' : ''); ?>>5134-35 / Atendente de lanchonete</option>
                                        <option value="5135-05" <?php echo e($job->cbo === '5135-05' ? 'selected' : ''); ?>>5135-05 / Aux. nos Serviços de Alimentação</option>
                                        <option value="5142-25" <?php echo e($job->cbo === '5142-25' ? 'selected' : ''); ?>>5142-25 / Trabalhador de serviços de limpeza e conservação</option>
                                        <option value="5143-25" <?php echo e($job->cbo === '5143-25' ? 'selected' : ''); ?>>5143-25 / Trabalhador na Manutenção de Edificações</option>
                                        <option value="5211-25" <?php echo e($job->cbo === '5211-25' ? 'selected' : ''); ?>>5211-25 / Repositor de Mercadorias</option>
                                        <option value="5211-35" <?php echo e($job->cbo === '5211-35' ? 'selected' : ''); ?>>5211-35 / Frentista</option>
                                        <option value="5211-40" <?php echo e($job->cbo === '5211-40' ? 'selected' : ''); ?>>5211-40 / Atendente de lojas e mercados</option>                                        
                                    </select>
                                    <?php $__errorArgs = ['cbo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="mb-3 col-12">
                                <div class="floatlabel-wrapper form-textarea">
                                    <label for="descricao" class="label-floatlabel" class="form-label floatlabel-label">Atividades esperadas</label>
                                    <textarea name="descricao" id="descricao" cols="30" rows="10" class="form-control"><?php echo e($job->descricao); ?></textarea>
                                    <?php $__errorArgs = ['descricao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="mb-3 form-campo col-6">
                                <div class="floatlabel-wrapper required">
                                    <label for="genero" class="label-floatlabel" class="form-label floatlabel-label">Gênero</label>
                                    <select name="genero" id="genero" class="form-select active-floatlabel" required>
                                        <option></option>
                                        <option value="Masculino" <?php echo e($job->genero === 'Masculino' ? 'selected' : ''); ?>>Masculino</option>
                                        <option value="Feminino" <?php echo e($job->genero === 'Feminino' ? 'selected' : ''); ?>>Feminino</option>
                                        <option value="Indiferente" <?php echo e($job->genero === 'Indiferente' ? 'selected' : ''); ?>>Indiferente</option>
                                    </select>
                                    <?php $__errorArgs = ['genero'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="mb-3 form-campo col-6">
                                <input type="number" placeholder="Quantidade de vagas" class="floatlabel form-control" id="qtd_vagas" name="qtd_vagas" required value="<?php echo e($job->qtd_vagas); ?>">
                                <?php $__errorArgs = ['genero'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3 form-campo col-4">
                                <input type="text" placeholder="Cidade" class="floatlabel form-control" id="cidade" name="cidade" required value="<?php echo e($job->cidade); ?>">
                                <?php $__errorArgs = ['cidade'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3 form-campo col-2">
                                <div class="floatlabel-wrapper required">
                                    <label for="uf" class="label-floatlabel" class="form-label floatlabel-label">UF</label>
                                    <select name="uf" id="uf" class="form-select active-floatlabel" required>
                                        <option></option>
                                        <?php
                                        echo get_estados($job->uf);
                                        ?>
                                    </select>
                                    <?php $__errorArgs = ['genero'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            

                            <div class="mb-3 form-campo col-6">
                                <input type="text" placeholder="Salário" class="floatlabel form-control" id="salario" name="salario" required value="<?php echo e($job->salario_formatted); ?>">
                                <?php $__errorArgs = ['salario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3 form-campo col-6">
                                <input type="text" placeholder="Escala" class="floatlabel form-control" id="dias_semana" name="dias_semana" required placeholder="Seg. à Sáb." value="<?php echo e($job->dias_semana); ?>">
                                <?php $__errorArgs = ['dias_semana'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3 form-campo col-6">
                                <input type="text" placeholder="Horário" class="floatlabel form-control" id="horario" name="horario" required value="<?php echo e($job->horario); ?>">
                                <?php $__errorArgs = ['horario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3 form-campo col-6">
                                <input type="text" placeholder="Dia, Hora e Modalidade do Curso" class="floatlabel form-control" id="dias_curso" name="dias_curso" value="<?php echo e($job->dias_curso); ?>">
                                <?php $__errorArgs = ['dias_curso'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3 form-campo col-6">
                                <input type="text" placeholder="Benefícios" class="floatlabel form-control" id="exp_profissional" name="exp_profissional" required value="<?php echo e($job->exp_profissional); ?>">
                                <?php $__errorArgs = ['exp_profissional'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3 col-12">
                                <div class="floatlabel-wrapper form-textarea">
                                    <label for="beneficios" class="label-floatlabel" class="form-label floatlabel-label">Requisitos/Diferenciais</label>
                                    <textarea class="form-control active-floatlabel" id="beneficios" name="beneficios" required><?php echo e($job->beneficios); ?></textarea>
                                    <?php $__errorArgs = ['exp_profissional'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="mb-3 form-campo col-6">
                                <div class="floatlabel-wrapper required">
                                    <label for="informatica" class="label-floatlabel" class="form-label floatlabel-label">Conhecimento em informática?</label>
                                    <select name="informatica" id="informatica" class="form-select active-floatlabel" required>
                                        <option></option>
                                        <option value="Não" <?php echo e($job->informatica === 'Não' ? 'selected' : ''); ?>>Não</option>
                                        <option value="Básico" <?php echo e($job->informatica === 'Básico' ? 'selected' : ''); ?>>Básico</option>
                                        <option value="Intermediário" <?php echo e($job->informatica === 'Intermediário' ? 'selected' : ''); ?>>Intermediário</option>
                                        <option value="Avançado" <?php echo e($job->informatica === 'Avançado' ? 'selected' : ''); ?>>Avançado</option>
                                    </select>
                                    <?php $__errorArgs = ['informatica'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="mb-3 form-campo col-6">
                                <div class="floatlabel-wrapper required">
                                    <label for="ingles" class="label-floatlabel" class="form-label floatlabel-label">Conhecimento em inglês?</label>
                                    <select name="ingles" id="ingles" class="form-select active-floatlabel" required>
                                        <option></option>
                                        <option value="Não" <?php echo e($job->ingles === 'Não' ? 'selected' : ''); ?>>Não</option>
                                        <option value="Básico" <?php echo e($job->ingles === 'Básico' ? 'selected' : ''); ?>>Básico</option>
                                        <option value="Intermediário" <?php echo e($job->ingles === 'Intermediário' ? 'selected' : ''); ?>>Intermediário</option>
                                        <option value="Avançado" <?php echo e($job->ingles === 'Avançado' ? 'selected' : ''); ?>>Avançado</option>
                                    </select>
                                    <?php $__errorArgs = ['ingles'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                        </div>

                        <div class="col-12 bloco-submit d-flex mt-3">
                            <button type="submit" class="btn-padrao btn-cadastrar">Atualizar</button>
                            <a href="<?php echo e(route('jobs.index')); ?>" class="btn-padrao btn-cancelar ms-3">Cancelar</a>
                        </div>

                    </form>

                </div>

                <div class="col-4 border-start py-0 ps-5 form-r bloco-obs">

                    
                        <div class="row my-3">
                            <a href="<?php echo e(route('reports.export.job.pdf', $job->id)); ?>" target="_blank" class="btn-padrao btn-cadastrar btn-exportar">Exportar Vaga PDF</a>
                        </div>
                        
                    

                    <h4>Contratação</h4>


                    <div class="row d-flex">

                        <div class="col bloco-data-contratacao">
                            <?php if(!$job->data_inicio_contratacao): ?>
                                <form action="<?php echo e(route('jobs.startContraction', $job)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="data_inicio_contratacao" id="data_inicio_contratacao" value="start">
                                    <button type="submit" class="btn btn-secondary btn-iniciar btn-sm">Iniciar</button>
                                </form>

                            <?php else: ?>
                                <button class="btn btn-success btn-sm">Início: <?php echo e($job->data_inicio_contratacao->format('d/m/Y')); ?></button>

                            <?php endif; ?>

                            <?php if(!$job->data_fim_contratacao): ?>
                                <form action="<?php echo e(route('jobs.endContraction', $job)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="data_fim_contratacao" id="data_fim_contratacao" value="end">
                                    <button type="submit" class="btn btn-secondary btn-finalizar btn-sm">Finalizar</button>
                                </form>

                            <?php else: ?>
                                <button class="btn btn-danger btn-sm">Fim: <?php echo e($job->data_fim_contratacao->format('d/m/Y')); ?></button>
                            <?php endif; ?>

                        </div>

                    </div>

                    
                    <h5 class="fw-normal mb-2">Data de Entrevista na Empresa:</h5>

                    <div class="row">
                        <form action="<?php echo e(route('jobs.updateDataEntrevistaEmpresa', $job)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="col-12 form-campo">
                                <div class="mb-3">
                                    <div class="floatlabel-wrapper">
                                        <label for="date" class="label-floatlabel" class="form-label floatlabel-label">Data de Entrevista na Empresa</label>
                                       
                                        <input type="date" class="form-control active-floatlabel" id="data_entrevista_empresa" name="data_entrevista_empresa"
                                            value="<?php echo e($job->data_entrevista_empresa ? \Carbon\Carbon::parse($job->data_entrevista_empresa)->format('Y-m-d') : ''); ?>">
                                        <?php $__errorArgs = ['data_entrevista_empresa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn-padrao btn-cadastrar">Atualizar</button>
                        </form>
                    </div>

                    <h4 class="fw-norma mt-5">Observações:</h4>

                    <div class="row">

                        <form class="form-padrao" action="<?php echo e(route('jobs.updateStatus', $job->id)); ?>" method="post">

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="mb-3">
                                <div class="floatlabel-wrapper required">
                                    <label for="status" class="label-floatlabel" class="form-label floatlabel-label">Status</label>
                                    <select name="status" id="status" class="form-select active-floatlabel" onchange="this.form.submit()">
                                        <option value="aberta" <?php echo e($job->status == 'aberta'? 'selected' : ''); ?> >Aberta</option>
                                        <option value="fechada" <?php echo e($job->status == 'fechada'? 'selected' : ''); ?> >Fechada</option>
                                        <option value="espera" <?php echo e($job->status == 'espera'? 'selected' : ''); ?> >Congelada</option>
                                        <option value="cancelada" <?php echo e($job->status == 'cancelada'? 'selected' : ''); ?> >Cancelada</option>
                                    </select>
                                </div>
                            </div>

                        </form>


                        <?php if(Auth::user()->role == 'admin'): ?>
                            <form class="form-padrao" action="<?php echo e(route('jobs.associateRecruiter', $job->id)); ?>" method="POST">

                                <?php echo csrf_field(); ?>
                                <div class="mb-3">
                                    <div id="box-recrutadores" class="floatlabel-wrapper required">
                                        <label for="recruiters" class="label-floatlabel" class="form-label floatlabel-label" style="background-color: #fff">Recrutadores</label>
                                        <select name="recruiters[]" id="recruiters" class="form-select select-recrutadores" multiple onchange="this.form.submit()">
                                            <?php $__currentLoopData = $recruiters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recruiter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($recruiter->id); ?>" <?php echo e($job->recruiters->contains($recruiter->id) ? 'selected' : ''); ?>>
                                                    &bull; <?php echo e($recruiter->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                            </form>

                        <?php endif; ?>

                    </div>

                    <div class="row mb-3 mt-3 bloco-observacoes">

                        <div class="card">
                            <div class="card-header bg-transparent">
                            <p>Observações:</p>
                            </div>
                            <div class="card-body">
                                <?php if($job->observacoes->isNotEmpty()): ?>
                                    <?php $__currentLoopData = $job->observacoes->sortByDesc('created_at'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $observacao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="card-text"><b><?php echo e($observacao->created_at->format('d/m/y')); ?></b> - <?php echo e($observacao->observacao); ?> </p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    Nenhuma observação.
                                <?php endif; ?>

                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <form class="form-padrao d-flex justify-content-center" action="<?php echo e(route('jobs.storeHistory', $job->id)); ?>" method="post">

                            <?php echo csrf_field(); ?>
                            <div class="floatlabel-wrapper form-textarea">
                                <label for="beneficios" class="label-floatlabel" class="form-label floatlabel-label">Escreva sua observação</label>
                                <textarea name="observacao" id="observacao" class="form-control"></textarea>
                            </div>
                            <button class="btn-padrao btn-cadastrar mt-3" type="submit">Salvar</button>

                        </form>

                    </div>

                </div>


            </div>

        </div>

    </article>

    <!-- Currículos Associados a esta Vaga-->
    <article class="f1">

        <div class="container">

            <div class="row">

                <div class="col-12 d-flex justify-content-between">

                    <h4>Currículos associados a esta vaga</h4>

                    <!-- Button trigger modal Associar um currículo a esta vaga -->
                    <button type="button" class="btn-padrao btn-associar-vaga" data-bs-toggle="modal" data-bs-target="#associarCurriculoModal">
                        Associar currículo
                    </button>          

                    <!-- Modal -->
                    <div class="modal fade modal-associar-vaga" id="associarCurriculoModal" tabindex="-1" aria-labelledby="associarCurriculoModal" aria-hidden="true">

                       <div class="modal-dialog modal-dialog-centered modal-xl">

                           <div class="modal-content">

                               <div class="modal-header">
                                   <h4>Currículos Disponíveis para Associar: </h4>
                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                               </div>

                               <div class="modal-body">

                                    
                                    <form method="GET" action="<?php echo e(route('jobs.edit', $job->id)); ?>" class="mb-3">
                                        <div class="input-group">
                                            <input type="text" name="buscar_nome" class="form-control" placeholder="Buscar por nome..." value="<?php echo e(request('buscar_nome')); ?>">
                                            
                                            <button id="botao-buscar-none" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                            </button>
                                        </div>
                                    </form>

                                    <div class="table-container lista-associar-vaga">

                                        <ul class="tit-lista">
                                            
                                            <li class="col1">Nome</li>
                                            <li class="col2">Tipo de Vaga</li>
                                            <li class="col3">CNH</li> 
                                            <li class="col4">Informática</li> 
                                            <li class="col5">Inglês</li> 
                                            <li class="col6">Ações</li> 
                                        
                                        </ul>

                                        
                                            <?php if($curriculosParaAssociar->count() > 0): ?>

                                                <?php $__currentLoopData = $curriculosParaAssociar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curriculo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <ul>
                                                        <li class="col1">
                                                            <b>Nome</b>
                                                            <svg class="ico-lista" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M3 19V5.7a1 1 0 0 1 .658-.94l9.671-3.516a.5.5 0 0 1 .671.47v4.953l6.316 2.105a1 1 0 0 1 .684.949V19h2v2H1v-2h2zm2 0h7V3.855L5 6.401V19zm14 0v-8.558l-5-1.667V19h5z"></path></g></svg>
                                                            <span>
                                                                <strong><?php echo e($curriculo->informacoesPessoais->nome); ?></strong>
                                                            </span>
                                                        </li>
                                                        <li class="col2">
                                                            <b>Tipo de Vaga</b>
                                                            <?php if(is_array($curriculo->vagas_interesse)): ?>
                                                                <?php $__currentLoopData = $curriculo->vagas_interesse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vaga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php echo e($vaga); ?>,
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                                
                                                            <?php endif; ?>
                                                        </li>
                                                        <li class="col3">
                                                            <b>CNH</b>
                                                            <?php echo e($curriculo->informacoesPessoais->cnh); ?>

                                                        </li>
                                                        <li class="col4">
                                                            <b>Informática</b>
                                                            <?php echo e($curriculo->escolaridade->informatica); ?>

                                                        </li>
                                                        <li class="col5">
                                                            <b>Inglês</b>
                                                            <?php echo e($curriculo->escolaridade->ingles); ?>

                                                        </li>
                                                        <li class="col6">
                                                            <b>Ações</b>
                                                            
                                                            <form action="<?php echo e(route('interviews.associarVaga')); ?>" method="POST" style="display:inline;">
                                                                <?php echo csrf_field(); ?>
                                                                <input type="hidden" name="job_id" value="<?php echo e($job->id); ?>">
                                                                <input type="hidden" name="resume_id" value="<?php echo e($curriculo->id); ?>">
                                                                <button type="submit" class="btn btn-success btn-sm">Associar</button>
                                                            </form>

                                                            
                                                        </li>
                                                    </ul>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                              
                                            <?php else: ?>
                                            
                                                <span class="sem-resultado">Nenhuma vaga encontrada</span>
                                            
                                            <?php endif; ?>
                                                
                                       
                                    </div>
                                     <!-- No final da página, após a tabela ou lista de currículos -->
                                    <div class="pagination-wrapper">
                                        <?php echo e($curriculosParaAssociar->appends(request()->query())->links('vendor.pagination.custom')); ?>

                                        <p class="pagination-info">Mostrando <?php echo e($curriculosParaAssociar->firstItem()); ?> a <?php echo e($curriculosParaAssociar->lastItem()); ?> de <?php echo e($curriculosParaAssociar->total()); ?> currículos</p>
                                    </div>

                               </div>

                           </div>

                       </div>

                   </div>
                   <!-- Fim Modal -->               


                </div>

                <div class="table-container lista-curriculos-associados">
                    <?php
                        $isAdmin = Auth::user()->role == 'admin' ? true : false;                        
                    ?>

                    <ul class="tit-lista">
                        <li class="col1 <?php echo e($isAdmin ? 'col1-admin' : ''); ?>">Nome</li>
                        <li class="col2 <?php echo e($isAdmin ? 'col2-admin' : ''); ?>">Tipo de vaga</li>
                        <li class="col3 <?php echo e($isAdmin ? 'col3-admin' : ''); ?>">Entrevistado</li>
                        <li class="col4 <?php echo e($isAdmin ? 'col4-admin' : ''); ?>">Status</li>
                        <?php if($isAdmin): ?>
                            <li class="col5 <?php echo e($isAdmin ? 'col5-admin' : ''); ?>">Ações</li>                            
                        <?php endif; ?>
                    </ul>

                    <?php if($job->resumes()->count() > 0): ?>
                       
                        <?php $__currentLoopData = $job->resumes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resume): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <ul onclick="window.location='<?php echo e(route('resumes.edit', $resume)); ?>'" >
                            <li class="col1 <?php echo e($isAdmin ? 'col1-admin' : ''); ?>">
                                <b>Nome</b>
                                <svg class="ico-lista" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M3 19V5.7a1 1 0 0 1 .658-.94l9.671-3.516a.5.5 0 0 1 .671.47v4.953l6.316 2.105a1 1 0 0 1 .684.949V19h2v2H1v-2h2zm2 0h7V3.855L5 6.401V19zm14 0v-8.558l-5-1.667V19h5z"></path></g></svg>
                                <span>
                                    <strong><?php echo e($resume->informacoesPessoais->nome); ?></strong>
                                </span>
                            </li>
                            <li class="col2 <?php echo e($isAdmin ? 'col2-admin' : ''); ?>">
                                <b>Tipo de Vaga</b>
                                <?php $__empty_1 = true; $__currentLoopData = $resume->vagas_interesse ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vaga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php echo e($vaga); ?><?php if(!$loop->last): ?>,<?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    Nenhuma vaga especificada
                                <?php endif; ?>
                            </li>                            
                            <li class="col3 <?php echo e($isAdmin ? 'col3-admin' : ''); ?>">
                                <b>Entrevista</b>
                                <?php if($resume->interview): ?>
                                    <a href="<?php echo e(route('interviews.show', $resume->interview->id)); ?>" class="link-entrevista text-success fw-bold"  data-bs-toggle="tooltip" data-bs-placement="top" title="Ver entrevista">Sim</a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('interviews.interviewResume', $resume)); ?>"  class="link-entrevista text-danger fw-bold" data-bs-toggle="tooltip" data-bs-placement="top" title="Entrevistar">Não</a>
                                <?php endif; ?>
                            </li>
                            <li class="col4 <?php echo e($isAdmin ? 'col4-admin' : ''); ?>">
                                <b>Status</b>
                               
                                  <?php switch($resume->status):
                                    case ('ativo'): ?>
                                        <i class="status-ativo" title="Disponível"></i>Disponível
                                        <?php break; ?>
                                    <?php case ('inativo'): ?>
                                        <i class="status-inativo" title="Inativo"></i>Inativo
                                        <?php break; ?>
                                    <?php case ('processo'): ?>
                                        <i class="status-em-processo" title="Em processo"></i>Em processo
                                        <?php break; ?>
                                    <?php case ('contratado'): ?>
                                        <i class="status-contratado" title="Contratado"></i>Contratado
                                        <?php break; ?>                           
                                        
                                <?php endswitch; ?>                               
                                
                            </li>
                            <?php if($isAdmin): ?>
                                <li class="col5 <?php echo e($isAdmin ? 'col5-admin' : ''); ?>">
                                    <form action="<?php echo e(route('interviews.desassociarVaga')); ?>" method="POST" style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="job_id" value="<?php echo e($job->id); ?>">
                                        <input type="hidden" name="resume_id" value="<?php echo e($resume->id); ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Desassociar</button>
                                    </form>
                                </li>
                                
                            <?php endif; ?>
                            

                        </ul>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php else: ?>
                    <span class="sem-resultado">Nenhum currículo associado a esta vaga</span>
                    <?php endif; ?>

                </div>

            </div>

        </div>

    </article>

    <!-- Processos seletivos a esta Vaga-->

    <article class="f1">

        <div class="container">

            <div class="row">

                <h4>Processos Seletivos para esta vaga</h4>

                <div class="table-container lista-processos-seletivos-vaga">

                    <ul class="tit-lista">
                        <li class="col1">Candidato</li>
                        <li class="col2">Tipo de vaga</li>
                        <li class="col3">Status da Seleção</li>
                        <li class="col4">Avaliação</li>
                        <li class="col5">Obs.:</li>
                        <li class="col6">Status</li>
                    </ul>

                    <?php if($job->selections()->count() > 0): ?>

                        <?php $__currentLoopData = $job->selections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selecao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <ul data-bs-toggle="modal" data-bs-target="#modal-selecao-<?php echo e($selecao->id); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver Processo Seletivo desta vaga">
                            <li class="col1">
                                <b>Candidato</b>
                                <svg class="ico-lista" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M3 19V5.7a1 1 0 0 1 .658-.94l9.671-3.516a.5.5 0 0 1 .671.47v4.953l6.316 2.105a1 1 0 0 1 .684.949V19h2v2H1v-2h2zm2 0h7V3.855L5 6.401V19zm14 0v-8.558l-5-1.667V19h5z"></path></g></svg>
                                <span>
                                    <strong><?php echo e($selecao->resume->informacoesPessoais->nome); ?></strong>
                                </span>
                            </li>
                            <li class="col2">
                                <b>Tipo de Vaga</b>
                                <?php $__currentLoopData = $selecao->resume->vagas_interesse ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vaga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($vaga); ?>,
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </li>
                            <li class="col3">
                                <b>Status da Seleção</b>
                                <?php echo e($selecao->status_selecao == 'aprovado' ? 'Contratado' : $selecao->status_selecao); ?>

                            </li>
                            <li class="col4">
                                <b>Avaliação</b>
                                <?php echo e($selecao->avaliacao == 1 ? 'Positiva' : 'Negativa'); ?>

                            </li>
                            <li class="col5">
                                <b>Obs.</b>
                                <?php echo e($selecao->observacao); ?>

                            </li>
                            <li class="col6">
                                <b>Status</b>
                                  <?php switch($selecao->resume->status):
                                    case ('ativo'): ?>
                                        <i class="status-ativo" title="Disponível"></i>Disponível
                                        <?php break; ?>
                                    <?php case ('inativo'): ?>
                                        <i class="status-inativo" title="Inativo"></i>Inativo
                                        <?php break; ?>
                                    <?php case ('processo'): ?>
                                        <i class="status-em-processo" title="Em processo"></i>Em processo
                                        <?php break; ?>
                                    <?php case ('contratado'): ?>
                                        <i class="status-contratado" title="Contratado"></i>Contratado
                                        <?php break; ?>                           
                                        
                                <?php endswitch; ?>
                            </li>

                        </ul>

                        <!-- Modal -->
                        <div class="modal fade modal-vagas" id="modal-selecao-<?php echo e($selecao->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                            <div class="modal-dialog">

                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h4>Vaga - Nº <?php echo e($job->id); ?></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="row">

                                            <div class="col-12">

                                                <h4>Processo Seletivo</h4>

                                                <form class="form-padrao d-flex" action="<?php echo e(route('selections.updateSelection', $selecao->id)); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PUT'); ?>

                                                    <div class="col-6">

                                                        <div class="mb-3 col-12">

                                                            <div class="floatlabel-wrapper required">
                                                                <label for="status_selecao" class="label-floatlabel" class="form-label floatlabel-label">Status da Seleção:</label>
                                                                <select name="status_selecao" id="status_selecao" class="form-select active-floatlabel" required>
                                                                    <option value="aprovado" <?php echo e($selecao->status_selecao == 'aprovado' ? 'selected' : ''); ?> > Contratado</option>
                                                                    <option value="reprovado" <?php echo e($selecao->status_selecao == 'reprovado' ? 'selected' : ''); ?> > Reprovado</option>
                                                                    <option value="aguardando" <?php echo e($selecao->status_selecao == 'aguardando' ? 'selected' : ''); ?>> Aguardando</option>
                                                                </select>
                                                                <?php $__errorArgs = ['status_selecao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>

                                                        </div>

                                                        <div class="col-12">

                                                            <div class="floatlabel-wrapper required">
                                                                <label for="avaliacao" class="label-floatlabel" class="form-label floatlabel-label">Avaliação:</label>
                                                                <select name="avaliacao" id="avaliacao" class="form-select active-floatlabel" required>
                                                                    <option value="0" <?php echo e($selecao->avaliacao == 0 ? 'selected' : ''); ?> > Negativa</option>
                                                                    <option value="1" <?php echo e($selecao->avaliacao == 1 ? 'selected' : ''); ?>> Positiva</option>
                                                                </select>
                                                                <?php $__errorArgs = ['avaliacao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col-6">

                                                        <div class="floatlabel-wrapper form-textarea">
                                                            <label for="observacao" class="label-floatlabel" class="form-label floatlabel-label">Observacao:</label>
                                                            <textarea name="observacao" id="observacao" cols="30" rows="10" class="form-control"><?php echo e($selecao->observacao); ?></textarea>
                                                            <?php $__errorArgs = ['observacao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>

                                                    </div>

                                                    <div class="col-12 d-flex justify-content-center">

                                                        <button class="btn btn-primary btn-padrao btn-cadastrar" type="submit" <?php echo e($selecao->status_selecao == 'aprovado' ? 'disabled' : ''); ?>>Atualizar</button>
                                                        

                                                    </div>

                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

            <?php else: ?>
            <span class="sem-resultado">Nenhum processo seletivo para esta vaga</span>
            <?php endif; ?>

        </div>

    </article>

</section>

<?php if(request('buscar_nome')): ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = new bootstrap.Modal(document.getElementById('associarCurriculoModal'));
        modal.show();
    });
</script>
<?php endif; ?>



<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts-custom'); ?>
<script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.mask.js')); ?>"></script>


<script>
$('#salario').mask('#.##0,00', {reverse: true});
/*
$('#setor').select2({
    placeholder: "Selecione um setor",
});
*/

$('#uf').select2({
    placeholder: "Selecione",
});
$('#cargo').select2({
    placeholder: "Selecione",
});
$('#genero').select2({
    placeholder: "Selecione",
});
$('#informatica').select2({
    placeholder: "Selecione",
});
$('#ingles').select2({
    placeholder: "Selecione",
});

$("#form-jobs").validate({
    ignore: [],
    rules:{
        company_id:"required",
        //setor:"required",
        cargo:"required",
        genero:"required",
        qtd_vagas:"required",
        cidade:"required",
        uf:"required",
        salario:"required",
        dias_semana:"required",
        horario:"required",
        //dias_curso:"required",
        exp_profissional:"required",
        beneficios:"required",
        informatica:"required",
        ingles:"required",
    }
});

// Validação inicial
var validator = $( "#form-jobs" ).validate();
validator.form();

$(document).find('.select2').each(function(){
    var input = $(this),
        val   = input[0].innerText;

    if(val && val !== 'Selecione'){
        input.find('.select2-selection').addClass('valid');
    }

});









// Busca do Modal
/*
document.addEventListener('DOMContentLoaded', function() {
    // Seleciona o campo de busca e a lista de currículos
    const searchInput = document.createElement('input');
    searchInput.setAttribute('type', 'text');
    searchInput.setAttribute('placeholder', 'Buscar currículos...');
    searchInput.style.width = '100%';
    searchInput.style.marginBottom = '15px';
    searchInput.style.padding = '10px';

    // Insere o campo de busca antes da lista
    const listContainer = document.querySelector('.lista-associar-vaga');
    listContainer.insertBefore(searchInput, listContainer.firstChild);

    // Função de busca
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        // Seleciona todas as listas de currículos (exceto o cabeçalho)
        const curriculoLists = document.querySelectorAll('.lista-associar-vaga > ul:not(.tit-lista)');
        
        curriculoLists.forEach(lista => {
            const nome = lista.querySelector('.col1 span strong').textContent.toLowerCase();
            const tipoVaga = lista.querySelector('.col2').textContent.toLowerCase();
            const cnh = lista.querySelector('.col3').textContent.toLowerCase();
            const informatica = lista.querySelector('.col4').textContent.toLowerCase();
            const ingles = lista.querySelector('.col5').textContent.toLowerCase();

            // Verifica se algum campo contém o termo de busca
            const match = 
                nome.includes(searchTerm) ||
                tipoVaga.includes(searchTerm) ||
                cnh.includes(searchTerm) ||
                informatica.includes(searchTerm) ||
                ingles.includes(searchTerm);

            // Mostra ou esconde a lista baseado no resultado da busca
            lista.style.display = match ? 'block' : 'none';
        });
    });
});
*/
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('css-custom'); ?>
   


<style>
article.container-form-create{
    box-shadow: none;
    padding: 0;
}

.btn-cadastrar{
    background-color: #0056b3;
    padding: 10px 50px;
}
.btn-cadastrar:hover{
    background-color: #046dde;
}
.breadcrumb-item{
    font-size: 23px;
    font-weight: 500;
}

.breadcrumb-item a{

    color: grey !important;
}

.breadcrumb-item.active{
    color: #009cff !important;
}
.btn-iniciar{
    background: #0056b3;
}
.btn-iniciar:hover{
    background: #046dde;
}
.btn-finalizar{
    background: #008000;
}
.btn-finalizar:hover{
    background: #02a302;
}

label{
    font-size: 10px;
    font-weight: 600;
    color: #aaa;
}

/*.sessao p, */
#observacao::placeholder{
    font-weight: 500;
    font-size: 11px;
    color: #aaa;
}

.coluna-tipo-vaga{
    width: 250px !important;
}

#associarCurriculoModal{
    z-index: 99999;
}

#botao-buscar-none{
    
    background: #F8F8F8;
    border-radius: 50px;
    -moz-border-radius: 50px;
    -webkit-border-radius: 50px;
    -ms-border-radius: 50px;
    width: 37px;
    height: 37px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 7px;
    left: 11px;
    z-index: 0;

}
#botao-buscar-none svg{
    overflow: visible;
    width: 20px;
    height: auto;
    stroke: #183550;
}

input[name='buscar_nome']{
    padding-left: 50px !important;
}


.col1-admin{
width: 35% !important;
}

.col2-admin{
    width: 35% !important;
}

.col3-admin{
    width: 10% !important;
}

.col4-admin{
    width: 10% !important;
}

.col5-admin{
    width: 10% !important;
}

.form-padrao .bloco-obs .bloco-observacoes .card-text{
    font-size: 14px !important;
    color: #333 !important; 
    font-weight: 400 !important;
}

.form-padrao .bloco-obs .bloco-observacoes .card-text b{
    font-size: 13px !important;
    color: #287FC0 !important; 
    font-weight: bold !important;
}

.btn-exportar{
    height: 38px !important;
}

@media (max-width: 1024px) {
    .justify-content-between{
        flex-flow: column;
    }
}

.bloco-observacoes .card-body{
    overflow: auto;
    max-height: 300px;
}

</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/flav6095/painelasppe.com.br/resources/views/jobs/edit.blade.php ENDPATH**/ ?>