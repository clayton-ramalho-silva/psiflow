<?php $__env->startSection('content'); ?>
<section class="cabecario">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(route('jobs.index')); ?>">Vagas</a></li>
          <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
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

    <article class="f1">

        <div class="container">

            <form id="form-jobs" class="form-padrao" action="<?php echo e(route('jobs.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="row">

                    <div class="mb-3 col-12">
                        <div class="floatlabel-wrapper required">
                            <label for="company_id" class="label-floatlabel" class="form-label floatlabel-label">Escolher Empresa</label>
                            <select name="company_id" id="company_id" class="form-select" required>
                                <option></option>
                                <?php $__currentLoopData = $companies->sortBy('nome_fantasia'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($company->id); ?>" <?php echo e(old('company_id') == $company->id ? 'selected' : ''); ?>> <?php echo e($company->nome_fantasia); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['company_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="mb-3 col-4 form-campo">
                        <div class="floatlabel-wrapper required">
                            <label for="cargo" class="label-floatlabel" class="form-label floatlabel-label">Setor</label>
                            <select name="cargo" id="cargo" class="form-select active-floatlabel" required>
                                <option></option>
                                <option value="Copa & Cozinha" <?php echo e(old('cargo') == 'Copa & Cozinha' ? 'selected': ''); ?> >Copa & Cozinha</option>
                                <option value="Administrativo" <?php echo e(old('cargo') == 'Administrativo' ? 'selected': ''); ?>>Administrativo</option>
                                <option value="Camareiro(a) de Hotel" <?php echo e(old('cargo') == 'Camareiro(a) de Hotel' ? 'selected': ''); ?>>Camareiro(a) de Hotel</option>
                                <option value="Recepcionista" <?php echo e(old('cargo') == 'Recepcionista' ? 'selected': ''); ?>>Recepcionista</option>
                                <option value="Atendente de Lojas e Mercados (Comércio & Varejo)" <?php echo e(old('cargo') == 'Atendente de Lojas e Mercados (Comércio & Varejo)' ? 'selected': ''); ?>>Atendente de Lojas e Mercados (Comércio & Varejo)</option>
                                <option value="Construção e Reparos" <?php echo e(old('cargo') == 'Construção e Reparos' ? 'selected': ''); ?>>Construção e Reparos</option>
                                <option value="Conservação e Limpeza" <?php echo e(old('cargo') == 'Conservação e Limpeza' ? 'selected': ''); ?>>Conservação e Limpeza</option>
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

                    <div class="mb-3 col-4 form-campo">
                        <div class="floatlabel-wrapper required">
                            <label for="cbo" class="label-floatlabel" class="form-label floatlabel-label">CBO</label>
                            <select name="cbo" id="cbo" class="form-select active-floatlabel" required>
                                <option></option>
                                <option value="4110-10" <?php echo e(old('cbo') == '4110-10' ? 'selected' : ''); ?>>4110-10 / Assistente Administrativo</option>
                                <option value="4122-05" <?php echo e(old('cbo') == '4122-05' ? 'selected' : ''); ?>>4122-05 / Contínuo</option>
                                <option value="4211-25" <?php echo e(old('cbo') == '4211-25' ? 'selected' : ''); ?>>4211-25 / Operador de Caixa</option>
                                <option value="4221-05" <?php echo e(old('cbo') == '4221-05' ? 'selected' : ''); ?>>4221-05 / Recepcionista Geral</option>
                                <option value="5133-15" <?php echo e(old('cbo') == '5133-15' ? 'selected' : ''); ?>>5133-15 / Camareiro de Hotel</option>
                                <option value="5134-05" <?php echo e(old('cbo') == '5134-05' ? 'selected' : ''); ?>>5134-05 / Garçom</option>
                                <option value="5134-15" <?php echo e(old('cbo') == '5134-15' ? 'selected' : ''); ?>>5134-15 / Cumim</option>
                                <option value="5134-25" <?php echo e(old('cbo') == '5134-25' ? 'selected' : ''); ?>>5134-25 / Copeiro</option>
                                <option value="5134-35" <?php echo e(old('cbo') == '5134-35' ? 'selected' : ''); ?>>5134-35 / Atendente de lanchonete</option>
                                <option value="5135-05" <?php echo e(old('cbo') == '5135-05' ? 'selected' : ''); ?>>5135-05 / Aux. nos Serviços de Alimentação</option>
                                <option value="5142-25" <?php echo e(old('cbo') == '5142-25' ? 'selected' : ''); ?>>5142-25 / Trabalhador de serviços de limpeza e conservação</option>
                                <option value="5143-25" <?php echo e(old('cbo') == '5143-25' ? 'selected' : ''); ?>>5143-25 / Trabalhador na Manutenção de Edificações</option>
                                <option value="5211-25" <?php echo e(old('cbo') == '5211-25' ? 'selected' : ''); ?>>5211-25 / Repositor de Mercadorias</option>
                                <option value="5211-35" <?php echo e(old('cbo') == '5211-35' ? 'selected' : ''); ?>>5211-35 / Frentista</option>
                                <option value="5211-40" <?php echo e(old('cbo') == '5211-40' ? 'selected' : ''); ?>>5211-40 / Atendente de lojas e mercados</option>                              
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

                    <div class="col-4 form-campo">
                        <div class="mb-3">
                            <div class="floatlabel-wrapper">
                                <label for="date" class="label-floatlabel" class="form-label floatlabel-label">Data de Entrevista na Empresa</label>
                                <input type="date" class="form-control active-floatlabel" id="data_entrevista_empresa" name="data_entrevista_empresa" value="<?php echo e(old('data_entrevista_empresa')); ?>">
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

                    <div class="mb-3 col-12">
                        <div class="floatlabel-wrapper form-textarea">
                            <label for="descricao" class="label-floatlabel" class="form-label floatlabel-label">Atividades esperadas</label>
                            <textarea name="descricao" id="descricao" cols="30" rows="10" class="form-control"><?php echo e(old('descricao')); ?></textarea>
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

                    <div class="mb-3 col-6 form-campo">
                        <div class="floatlabel-wrapper required">
                            <label for="genero" class="label-floatlabel" class="form-label floatlabel-label">Gênero</label>
                            <select name="genero" id="genero" class="form-select active-floatlabel" required>
                                <option></option>
                                <option value="Masculino" <?php echo e(old('genero') == 'Masculino' ? 'selected' : ''); ?>>Masculino</option>
                                <option value="Feminino" <?php echo e(old('genero') == 'Feminino' ? 'selected' : ''); ?>>Feminino</option>
                                <option value="Indiferente" <?php echo e(old('genero') == 'Indiferente' ? 'selected' : ''); ?>>Indiferente</option>
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

                    <div class="mb-3 col-6 form-campo">
                        <input type="number" placeholder="Quantidade de vagas" class="floatlabel form-control" id="qtd_vagas" name="qtd_vagas" value="<?php echo e(old('qtd_vagas')); ?>" required>
                        <?php $__errorArgs = ['genero'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3 col-4 form-campo">
                        <input type="text" placeholder="Cidade" class="floatlabel form-control" id="cidade" name="cidade" value="<?php echo e(old('cidade')); ?>" required>
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
                                echo get_estados(old('uf'));
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

                    

                    <div class="mb-3 col-6 form-campo">
                        <input type="text" placeholder="Salário" class="floatlabel form-control" id="salario" name="salario" value="<?php echo e(old('salario')); ?>" required>
                        <?php $__errorArgs = ['salario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3 col-6 form-campo">
                        <input type="text" placeholder="Escala" class="floatlabel form-control" id="dias_semana" name="dias_semana" value="<?php echo e(old('dias_semana')); ?>" required placeholder="Seg. à Sáb.">
                        <?php $__errorArgs = ['dias_semana'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3 col-6 form-campo">
                        <input type="text" placeholder="Horário" class="floatlabel form-control" id="horario" name="horario" value="<?php echo e(old('horario')); ?>" required>
                        <?php $__errorArgs = ['horario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3 col-6 form-campo">
                        <input type="text" placeholder="Dia, Hora e Modalidade do Curso" class="floatlabel form-control" id="dias_curso" name="dias_curso" value="<?php echo e(old('dias_curso')); ?>">
                        <?php $__errorArgs = ['dias_curso'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3 col-6 form-campo">
                        <input type="text" placeholder="Benefícios" class="floatlabel form-control" id="exp_profissional" name="exp_profissional" value="<?php echo e(old('exp_profissional')); ?>" required>
                        <?php $__errorArgs = ['cargo'];
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
                            <textarea class="form-control active-floatlabel" id="beneficios" name="beneficios" required><?php echo e(old('beneficios')); ?></textarea>
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

                    <div class="mb-3 col-6 form-campo">
                        <div class="floatlabel-wrapper required">
                            <label for="informatica" class="label-floatlabel" class="form-label floatlabel-label">Conhecimento em informática?</label>
                            <select name="informatica" id="informatica" class="form-select active-floatlabel" required>
                                <option></option>
                                <option value="Não" <?php echo e(old('informatica') == 'Não' ? 'selected' : ''); ?>>Não</option>
                                <option value="Básico" <?php echo e(old('informatica') == 'Básico' ? 'selected' : ''); ?>>Básico</option>
                                <option value="Intermediário" <?php echo e(old('informatica') == 'Intermediário' ? 'selected' : ''); ?>>Intermediário</option>
                                <option value="Avançado" <?php echo e(old('informatica') == 'Avançado' ? 'selected' : ''); ?>>Avançado</option>
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

                    <div class="mb-3 col-6 form-campo">
                        <div class="floatlabel-wrapper required">
                            <label for="ingles" class="label-floatlabel" class="form-label floatlabel-label">Conhecimento em inglês?</label>
                            <select name="ingles" id="ingles" class="form-select active-floatlabel" required>
                                <option></option>
                                <option value="Não" <?php echo e(old('ingles') == 'Não' ? 'selected' : ''); ?>>Não</option>
                                <option value="Básico" <?php echo e(old('ingles') == 'Básico' ? 'selected' : ''); ?>>Básico</option>
                                <option value="Intermediário" <?php echo e(old('ingles') == 'Intermediário' ? 'selected' : ''); ?>>Intermediário</option>
                                <option value="Avançado" <?php echo e(old('ingles') == 'Avançado' ? 'selected' : ''); ?>>Avançado</option>
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

                <div class="col-12 bloco-submit mt-3 d-flex">
                    <button type="submit" class="btn-padrao btn-cadastrar">Salvar</button>
                </div>

            </form>
        </div>

    </article>

</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts-custom'); ?>
<script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.mask.js')); ?>"></script>
<script>
$('#salario').mask('#.##0,00', {reverse: true});
$('#company_id').select2({
    placeholder: "Selecione",
});
/*
$('#setor').select2({
    placeholder: "Selecione um setor",
});
*/
$('#uf').select2({
    placeholder: "Selecione",
});
$('#cbo').select2({
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
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('css-custom'); ?>
<style>
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

</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/flav6095/painelasppe.com.br/resources/views/jobs/create.blade.php ENDPATH**/ ?>