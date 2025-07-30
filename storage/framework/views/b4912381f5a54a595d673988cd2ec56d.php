<?php $__env->startSection('content'); ?>
<section class="cabecario">
    <h1>Dashboard - Admin</h1>

    

</section>

<section class="sessao">


    <article class="f4 resumo" onclick="window.location='<?php echo e(route('companies.index')); ?>'" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver todas as empresas">

        <figure>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g>
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path d="M3 19V5.7a1 1 0 0 1 .658-.94l9.671-3.516a.5.5 0 0 1 .671.47v4.953l6.316 2.105a1 1 0 0 1 .684.949V19h2v2H1v-2h2zm2 0h7V3.855L5 6.401V19zm14 0v-8.558l-5-1.667V19h5z"></path>
                    </g>
                </svg>


            <figcaption>
                Empresas <span>ativas</span>
            </figcaption>
        </figure>

        <h3><?php echo e($totalEmpresasAtivas); ?></h3>

        <small><b><?php echo e($totalEmpresasInativas); ?> empresas</b> inativas</small>

    </article>



    <article class="f4 resumo" onclick="window.location='<?php echo e(route('jobs.index')); ?>'" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver todas as vagas">

        <figure>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><g id="_21-30" data-name="21-30"><g id="Document"><path d="M25.535,6.121,22.879,3.465A4.969,4.969,0,0,0,19.343,2H10A5.006,5.006,0,0,0,5,7V25a5.006,5.006,0,0,0,5,5H22a5.006,5.006,0,0,0,5-5V9.657A4.969,4.969,0,0,0,25.535,6.121ZM24.121,7.535A3.042,3.042,0,0,1,24.5,8H22a1,1,0,0,1-1-1V4.5a3.042,3.042,0,0,1,.465.38ZM22,28H10a3,3,0,0,1-3-3V7a3,3,0,0,1,3-3h9V7a3,3,0,0,0,3,3h3V25A3,3,0,0,1,22,28Z"></path><path d="M11,11h4a1,1,0,0,0,0-2H11a1,1,0,0,0,0,2Z"></path><path d="M21,13H11a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z"></path><path d="M21,17H11a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z"></path><path d="M19,21H11a1,1,0,0,0,0,2h8a1,1,0,0,0,0-2Z"></path></g></g></svg>


            <figcaption>
                Vagas <span>totais</span>
            </figcaption>
        </figure>

        <h3><?php echo e($totalJobs); ?></h3>

        <small><b><?php echo e($closedJobs); ?> vagas</b> inativas</small>

    </article>

    <article class="f4 resumo" onclick="window.location='<?php echo e(route('jobs.index')); ?>'" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver vagas abertas">

        <figure>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><g id="_21-30" data-name="21-30"><g id="Document"><path d="M25.535,6.121,22.879,3.465A4.969,4.969,0,0,0,19.343,2H10A5.006,5.006,0,0,0,5,7V25a5.006,5.006,0,0,0,5,5H22a5.006,5.006,0,0,0,5-5V9.657A4.969,4.969,0,0,0,25.535,6.121ZM24.121,7.535A3.042,3.042,0,0,1,24.5,8H22a1,1,0,0,1-1-1V4.5a3.042,3.042,0,0,1,.465.38ZM22,28H10a3,3,0,0,1-3-3V7a3,3,0,0,1,3-3h9V7a3,3,0,0,0,3,3h3V25A3,3,0,0,1,22,28Z"></path><path d="M11,11h4a1,1,0,0,0,0-2H11a1,1,0,0,0,0,2Z"></path><path d="M21,13H11a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z"></path><path d="M21,17H11a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z"></path><path d="M19,21H11a1,1,0,0,0,0,2h8a1,1,0,0,0,0-2Z"></path></g></g></svg>


            <figcaption>
                Vagas <span>abertas</span>
            </figcaption>
        </figure>

        <h3><?php echo e($totalJobs - $filledJobs); ?></h3>

        <small><b><?php echo e($filledJobs); ?></b> concluidas</small>

    </article>

    <article class="f4 resumo" onclick="window.location='<?php echo e(route('resumes.index')); ?>'" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver todos currículos">

        <figure>
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
            <defs>
                <style>
                    .cls-1 {
                        fill: #000;
                        stroke-width: 0px;
                    }
                </style>
            </defs>
            <path class="cls-1" d="M39.544,10.124l-6.62-6.651c-.931-.936-2.223-1.473-3.544-1.473H12c-2.757,0-5,2.243-5,5v34c0,2.757,2.243,5,5,5h24c2.757,0,5-2.243,5-5V13.651c0-1.331-.517-2.583-1.456-3.527ZM37.594,11h-4.594c-.551,0-1-.449-1-1v-4.62l5.594,5.62ZM39,41c0,1.654-1.346,3-3,3H12c-1.654,0-3-1.346-3-3V7c0-1.654,1.346-3,3-3h17.38c.209,0,.417.025.62.069v5.931c0,1.654,1.346,3,3,3h5.923c.047.212.077.429.077.651v27.349Z"></path>
            <path class="cls-1" d="M34,19h-6c-.552,0-1,.448-1,1s.448,1,1,1h6c.552,0,1-.448,1-1s-.448-1-1-1Z"></path>
            <path class="cls-1" d="M34,25H14c-.552,0-1,.448-1,1s.448,1,1,1h20c.552,0,1-.448,1-1s-.448-1-1-1Z"></path>
            <path class="cls-1" d="M34,31H14c-.552,0-1,.448-1,1s.448,1,1,1h20c.552,0,1-.448,1-1s-.448-1-1-1Z"></path>
            <path class="cls-1" d="M34,37H14c-.552,0-1,.448-1,1s.448,1,1,1h20c.552,0,1-.448,1-1s-.448-1-1-1Z"></path>
            <path class="cls-1" d="M16,22h6c1.654,0,3-1.346,3-3,0-2.282-1.546-4.191-3.639-4.788.989-.729,1.639-1.892,1.639-3.212,0-2.206-1.794-4-4-4s-4,1.794-4,4c0,1.32.65,2.483,1.639,3.212-2.093.597-3.639,2.506-3.639,4.788,0,1.654,1.346,3,3,3ZM19,9c1.103,0,2,.897,2,2s-.897,2-2,2-2-.897-2-2,.897-2,2-2ZM18,16h2c1.654,0,3,1.346,3,3,0,.551-.449,1-1,1h-6c-.551,0-1-.449-1-1,0-1.654,1.346-3,3-3Z"></path>
        </svg>

            <figcaption>
                Curr&iacute;culos <span>dispon&iacute;veis</span>
            </figcaption>
        </figure>

        <h3><?php echo e($totalResumes); ?></h3>

        <small><b>198 curr&iacute;culos</b> inativos</small>

    </article>



    <article class="f2-1">

        <h4>Vagas abertas</h4>

        <div class="table-container lista-vagas-disponiveis">

            <ul class="tit-lista">
                <li class="col1">Empresa</li>
                <li class="col2">Cargo</li>
                <li class="col3">Vagas</li>
                <li class="col4">Recrutador</li>
                <li class="col5">Status</li>
            </ul>

            <?php if($jobs->count() > 0): ?>

                <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('jobs.edit', $job)); ?>">
                    <ul>
                        <li class="col1">
                            <b>Empresa</b>
                            <?php if($job->company->logotipo): ?>
                                <?php if(file_exists(public_path('documents/companies/images/'.$job->company->logotipo))): ?>
                                    <img src="<?php echo e(asset("documents/companies/images/{$job->company->logotipo}")); ?>" alt="<?php echo e($job->company->nome_fantasia); ?>" title="<?php echo e($job->company->nome_fantasia); ?>">
                                <?php else: ?>
                                    <svg class="ico-lista" xmlns="http://www.w3.org/2000/svg" data-aa="<?php echo e(asset("documents/companies/images/{$job->company->logotipo}")); ?>" viewBox="0 0 24 24"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M3 19V5.7a1 1 0 0 1 .658-.94l9.671-3.516a.5.5 0 0 1 .671.47v4.953l6.316 2.105a1 1 0 0 1 .684.949V19h2v2H1v-2h2zm2 0h7V3.855L5 6.401V19zm14 0v-8.558l-5-1.667V19h5z"></path></g></svg>
                                <?php endif; ?>
                            <?php else: ?>
                                <svg class="ico-lista" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M3 19V5.7a1 1 0 0 1 .658-.94l9.671-3.516a.5.5 0 0 1 .671.47v4.953l6.316 2.105a1 1 0 0 1 .684.949V19h2v2H1v-2h2zm2 0h7V3.855L5 6.401V19zm14 0v-8.558l-5-1.667V19h5z"></path></g></svg>
                            <?php endif; ?>
                            <span>
                                <strong><?php echo e($job->company->nome_fantasia); ?></strong><br><?php echo e($job->company->cnpj); ?>

                            </span>
                        </li>
                        <li class="col2">
                            <b>Cargo</b>
                            <?php echo e($job->cargo); ?>

                        </li>
                        <li class="col3" data-bs-toggle="tooltip" data-bs-placement="top" title="Preenchidas/Disponíveis">
                            <b>Vagas</b>
                            <?php echo e($job->filled_positions); ?>/<?php echo e($job->qtd_vagas); ?>

                        </li>
                        <li class="col4">
                            <b>Recrutador</b>
                            <?php if(count($job->recruiters) <= 0): ?>
                                Nenhum
                            <?php else: ?>
                                <?php $__currentLoopData = $job->recruiters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recruiter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($recruiter->name); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </li>
                        <li class="col5">
                            <b>Status</b>
                            <i title="<?php echo e($job->status === 'fechada' ? 'Fechada' : ($job->status === 'cancelada' ? 'Cancelada' : 'Aberta')); ?>"></i>
                        </li>

                    </ul>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php else: ?>
            <span class="sem-resultado">Nenhuma vaga encontrada</span>
            <?php endif; ?>

        </div>

    </article>


    <article class="f1-2 b-Blue">

        <h4>Currículos Recentes</h4>

        <div class="table-container lista-curriculos-recentes">

            <ul class="tit-lista">
                <li class="col1">Nome</li>
                <li class="col2"></li>
            </ul>

            <?php if($resumes->count() > 0): ?>

                <?php $__currentLoopData = $resumes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resume): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('resumes.edit', $resume)); ?>">
                    <ul>
                        <li class="col1">
                            <svg class="ico-user" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><title></title><g id="User"><path d="M41.2452,33.0349a16,16,0,1,0-18.49,0A26.0412,26.0412,0,0,0,4,58a2,2,0,0,0,2,2H58a2,2,0,0,0,2-2A26.0412,26.0412,0,0,0,41.2452,33.0349ZM20,20A12,12,0,1,1,32,32,12.0137,12.0137,0,0,1,20,20ZM8.09,56A22.0293,22.0293,0,0,1,30,36h4A22.0293,22.0293,0,0,1,55.91,56Z"></path></g></svg>
                            <?php echo e($resume->informacoesPessoais->nome ?? 'N/A'); ?>

                        </li>
                        <li class="col2"><span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg>
                        </span></li>
                    </ul>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php else: ?>
            <span class="sem-resultado">Nenhuma vaga encontrada</span>
            <?php endif; ?>

        </div>

    </article>

</section>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('css-custom'); ?>
<style>
.linha-tabela{
    cursor: pointer;
    transition: all 0.25s ease-in-out;
}
.linha-tabela:hover{
    box-shadow: 0 3px 3px rgba(0, 0, 0, 0.16) !important;
    border-radius: 8px;
}

.sessao article.f1-2.b-Blue{
    height: 100vh;
    overflow: scroll;
}

</style>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts-custom'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/case/Área de trabalho/2025/ldweb/Projeto asppe/painelasppe/resources/views/dashboard/admin.blade.php ENDPATH**/ ?>