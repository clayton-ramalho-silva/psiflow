<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Asppe - Cadastro de Currículo</title>

<!-- CSS Scripts -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    <!-- Customized Bootstrap Stylesheet -->
  <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/estilos.css')); ?>" type="text/css" rel="stylesheet"> <meta charset="utf-8">

  <style>
    body{
        background-color: #f6f6f6;
    }
    /* Esconde o input original */
    .file-input {
        display: none;
    }
    
    /* Estiliza o botão */
    .file-label {
        display: inline-block;
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s;
    }
    
    /* Efeito hover */
    .file-label:hover {
        background-color: #0056b3;
    }
    
    /* Estiliza o texto do nome do arquivo */
    .file-name {
        margin-left: 10px;
        font-size: 14px;
        color: #333;
    }
    
    /* Estiliza a prévia da imagem */
    .preview-container {
        text-align: center;
        margin-top: 15px;
    }
    
    .preview-image {
        display: block;
        max-width: 200px;
        max-height: 200px;
        width: auto;
        height: auto;
        border-radius: 10px;
        border: 2px solid #ddd;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    /* Estilo para documentos */
    .preview-doc {
        text-align: center;
        font-size: 14px;
        color: #333;
        margin-top: 10px;
    }
    
    .btn-select-file{
        background-color: gray;
    }
    
    .btn-select-file:hover{
        background-color: #a7a7a7;
    }
    
    /*Botãos submit e cancelar*/
    .btn-cadastrar{
        background-color: #0056b3;
        padding: 10px 50px;
    }
    
    .btn-cadastrar:hover{
        background-color: #046dde;
    }
    
    
            /*Cabeçario*/
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
    
    article.container-form-create{
        box-shadow: none;
        padding: 0;
    }

    main{
        float: unset;
        margin: 0 auto;
    }

    .header{
        max-width: 1200px;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-bottom: 50px;
    }

    .container-logo{
        display: flex;
        justify-content: center;
        width: 100%;
    }
    
    .container-logo .logo{
        font-size: 0;
    }

    .header p{
        width: 100%;
        text-align: center;        
    }

    #bloco-submit-mobile{
        display: none;
    }

    #bloco-submit-desktop{
        display: flex;
    }
    
    .label-autorizacao{
        font-size: 13px;
        letter-spacing: 1px;
        margin-top: 3px;
        font-weight: 500;
    }
    
    .titulo-autorizacao{
        font-size: 13px;
        font-weight: bold;
    }

    .texto-autorizacao{
        font-size: 13px;
        letter-spacing: 1px;
    }
    @media(max-width: 480px){
        .form-padrao .form-l{
            order: 1;
        }
        .form-padrao .form-r{
            order: 2;
        }

       #bloco-submit-desktop{
            display: none;
        }

        #bloco-submit-mobile{
        display: flex;
        order: 3;
    }
    }
</style>

</head>
<body>
    <?php if(session('success')): ?>
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg width="30px" height="30px" style="margin-bottom: 10px" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <title>success</title>
            <g id="Page-1" stroke="none" stroke-width="1" fill="#ffffff" fill-rule="evenodd">
                <g id="add-copy" fill="#ffffff" transform="translate(42.666667, 42.666667)">
                    <path d="M213.333333,3.55271368e-14 C95.51296,3.55271368e-14 3.55271368e-14,95.51296 3.55271368e-14,213.333333 C3.55271368e-14,331.153707 95.51296,426.666667 213.333333,426.666667 C331.153707,426.666667 426.666667,331.153707 426.666667,213.333333 C426.666667,95.51296 331.153707,3.55271368e-14 213.333333,3.55271368e-14 Z M213.333333,384 C119.227947,384 42.6666667,307.43872 42.6666667,213.333333 C42.6666667,119.227947 119.227947,42.6666667 213.333333,42.6666667 C307.43872,42.6666667 384,119.227947 384,213.333333 C384,307.43872 307.438933,384 213.333333,384 Z M293.669333,137.114453 L323.835947,167.281067 L192,299.66912 L112.916693,220.585813 L143.083307,190.4192 L192,239.335893 L293.669333,137.114453 Z" id="Shape">

        </path>
                </g>
            </g>
        </svg>
      <div>
        <?php echo e(session('success')); ?>

      </div>
    </div>
    <?php endif; ?>

    <?php if(session('danger')): ?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg width="30px" height="30px" style="margin-bottom: 10px" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>danger</title>
                <g id="Page-1" stroke="none" stroke-width="1" fill="#ffffff" fill-rule="evenodd">
                    <g id="error-copy" fill="#ffffff" transform="translate(42.666667, 42.666667)">
                        <path d="M213.333333,3.55271368e-14 C95.51296,3.55271368e-14 3.55271368e-14,95.51296 3.55271368e-14,213.333333 C3.55271368e-14,331.153707 95.51296,426.666667 213.333333,426.666667 C331.153707,426.666667 426.666667,331.153707 426.666667,213.333333 C426.666667,95.51296 331.153707,3.55271368e-14 213.333333,3.55271368e-14 Z M213.333333,384 C119.227947,384 42.6666667,307.43872 42.6666667,213.333333 C42.6666667,119.227947 119.227947,42.6666667 213.333333,42.6666667 C307.43872,42.6666667 384,119.227947 384,213.333333 C384,307.43872 307.438933,384 213.333333,384 Z M240.64,213.333333 L293.973333,160 L272,138.026667 L218.666667,191.36 L165.333333,138.026667 L143.36,160 L196.693333,213.333333 L143.36,266.666667 L165.333333,288.64 L218.666667,235.306667 L272,288.64 L293.973333,266.666667 L240.64,213.333333 Z" id="Shape">
                        </path>
                    </g>
                </g>
            </svg>
          <div>
            <?php echo e(session('danger')); ?>

          </div>
        </div>
    <?php endif; ?>
    <div class="header">
        <div class="container-logo">
            <a href="https://painelasppe.com.br/cadastro-curriculo" class="logo">ASPPE - Sistema</a>

        </div>
        <p class="mb-2 mt-3">Cadastre seu currículo.</p> 
        <p>Entraremos em contato assim que encontrarmos a vaga ideal para você.</p>
    </div>
    <main>
        <section class="sessao">
    
            <article class="f1 container-form-create">
        
                <div class="container">
        
                    <h4 class="fw-normal mb-4">Cadastro de Currículo</h4>
        
                    <form class="form-padrao" id="form-companies-create" action="<?php echo e(route('publicResume.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
        
                            
                            <div class="col-9 py-0 pe-5 form-l">

                                <div class="row">

                                    <div class="col-12 form-campo">
                                        <div class="mb-3">
                                            <input type="text" placeholder="Nome Completo" class="floatlabel form-control" id="nome" name="nome" required value="<?php echo e(old('nome')); ?>">
                                            <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        </div>
                                    </div>

                                    <div class="col-6 form-campo">
                                        <div class="mb-3">
                                            <input type="text" placeholder="CPF" class="floatlabel form-control" id="cpf" name="cpf" value="<?php echo e(old('cpf')); ?>" required placeholder="CPF">
                                            <div id="cpf-error" class="d-none alert alert-danger"></div>
                                            <?php $__errorArgs = ['cpf'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-6 form-campo">
                                        <div class="mb-3">
                                            <input type="text" placeholder="RG" class="floatlabel form-control" id="rg" name="rg" required placeholder="RG" value="<?php echo e(old('rg')); ?>" >
                                            <?php $__errorArgs = ['rg'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>   

                                    <!-- CNH -->
                                    <div class="col-6 form-campo">
                                        <div class="mb-3">
                                            <div class="floatlabel-wrapper required">
                                                <label for="cnh" class="label-floatlabel" class="form-label floatlabel-label">Possui CNH?</label>
                                                <select name="cnh" id="cnh" class="form-select active-floatlabel" required>
                                                    <option></option>
                                                    <option value="Sim"  <?php echo e(old('cnh') == 'Sim' ? 'selected' : ''); ?>> Sim</option>
                                                    <option value="Não"  <?php echo e(old('cnh') == 'Não' ? 'selected' : ''); ?>> Não</option>
                                                    <option value="Em andamento"  <?php echo e(old('cnh') == 'Em andamento' ? 'selected' : ''); ?>> Em andamento</option>
                                                </select>                                        
                                                <?php $__errorArgs = ['cnh'];
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

                                    <!-- Campo de Tipo de CNH (inicialmente oculto) -->
                                    <div class="col-6 form-campo" id="tipoCnhContainer">
                                        <div class="mb-3">
                                            <div class="floatlabel-wrapper">
                                                <label for="tipo_cnh" class="label-floatlabel form-label floatlabel-label">Tipo de CNH</label>
                                                <select name="tipo_cnh" id="tipo_cnh" class="form-select active-floatlabel" disabled>
                                                    <option></option>
                                                    <option value="A" <?php echo e(old('tipo_cnh') == 'A' ? 'selected' : ''); ?>>A - Motocicleta</option>
                                                    <option value="B" <?php echo e(old('tipo_cnh') == 'B' ? 'selected' : ''); ?>>B - Automóvel</option>
                                                    <option value="AB" <?php echo e(old('tipo_cnh') == 'AB' ? 'selected' : ''); ?>>AB - Motocicleta e Automóvel</option>
                                                    <option value="C" <?php echo e(old('tipo_cnh') == 'C' ? 'selected' : ''); ?>>C - Caminhão</option>
                                                    <option value="D" <?php echo e(old('tipo_cnh') == 'D' ? 'selected' : ''); ?>>D - Ônibus</option>
                                                    <option value="E" <?php echo e(old('tipo_cnh') == 'E' ? 'selected' : ''); ?>>E - Carreta</option>
                                                </select>
                                                <?php $__errorArgs = ['tipo_cnh'];
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

                                    <!-- Data de Nascimento -->
                                    <div class="col-6 form-campo">
                                        <div class="mb-3">
                                            <div class="floatlabel-wrapper required">
                                                <label for="date" class="label-floatlabel" class="form-label floatlabel-label">Data de Nascimento</label>
                                                <input type="date" class="form-control active-floatlabel" id="data_nascimento" name="data_nascimento" value="<?php echo e(old('data_nascimento')); ?>" required>
                                                <?php $__errorArgs = ['data_nascimento'];
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

                                    <!-- Nacionalidade teste -->
                                    <?php
                                        $paises = getPaises();                                
                                    ?>
                                    <div class="col-6 form-campo">
                                        <div class="mb-3">
                                            <div class="floatlabel-wrapper required">
                                                <label for="nacionalidade" class="label-floatlabel" class="form-label floatlabel-label">Nacionalidade</label>
                                                <select name="nacionalidade" id="nacionalidade" class="form-select active-floatlabel" required>
                                                    <option></option>
                                                    <?php $__currentLoopData = $paises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pais): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($pais); ?>" <?php echo e(old('nacionalidade') ==  "$pais"  ? 'selected' : ''); ?>> <?php echo e($pais); ?></option>                                                                                        
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php $__errorArgs = ['nacionalidade'];
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

                                    <!-- Estado Civil -->
                                    <div class="col-6 form-campo">
                                        <div class="mb-3">
                                            <div class="floatlabel-wrapper required">
                                                <label for="estado_civil" class="label-floatlabel" class="form-label floatlabel-label">Estado Civil</label>
                                                <select name="estado_civil" id="estado_civil" class="form-select active-floatlabel" required>
                                                    <option></option>
                                                    <option value="Solteiro" <?php echo e(old('estado_civil') == 'Solteiro' ? 'selected' : ''); ?>> Solteiro</option>
                                                    <option value="Casado" <?php echo e(old('estado_civil') == 'Casado' ? 'selected' : ''); ?>> Casado</option>
                                                    <option value="Divorciado" <?php echo e(old('estado_civil') == 'Divorciado' ? 'selected' : ''); ?>> Divorciado</option>
                                                    <option value="Viúvo" <?php echo e(old('estado_civil') == 'Viúvo' ? 'selected' : ''); ?>> Viúvo</option>                                            
                                                </select>
                                                <?php $__errorArgs = ['estado_civil'];
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

                                    <!-- Reservista -->
                                    <div class="col-6 form-campo">
                                        <div class="mb-3">
                                            <div class="floatlabel-wrapper required">
                                                <label for="reservista" class="label-floatlabel" class="form-label floatlabel-label">Possui Reservista?(Dispensa do Exército)</label>
                                                <select name="reservista" id="reservista" class="form-select active-floatlabel" required>
                                                    <option></option>
                                                    <option value="Sim" <?php echo e(old('reservista') == 'Sim' ? 'selected' : ''); ?>> Sim</option>
                                                    <option value="Não" <?php echo e(old('reservista') == 'Não' ? 'selected' : ''); ?>> Não</option>
                                                    <option value="Em andamento" <?php echo e(old('reservista') == 'Em andamento' ? 'selected' : ''); ?>> Em andamento</option>                                            
                                                </select>
                                                <?php $__errorArgs = ['reservista'];
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

                                    
                                    <div class="col-4 form-campo">
                                        <div class="mb-3">
                                            <div class="floatlabel-wrapper required">
                                                <label for="possui_filhos" class="label-floatlabel" class="form-label floatlabel-label">Possui filhos?</label>
                                                <select name="possui_filhos" id="possui_filhos" class="form-select active-floatlabel" required>
                                                    <option></option>
                                                    <option value="Sim" <?php echo e(old('possui_filhos') == 'Sim' ? 'selected' : ''); ?>> Sim</option>
                                                    <option value="Não" <?php echo e(old('possui_filhos') == 'Não' ? 'selected' : ''); ?>> Não</option>
                                                </select>
                                                <?php $__errorArgs = ['possui_filhos'];
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

                                    <!-- Campo de filhos_sim (inicialmente disabled) -->
                                    <div class="col-4 form-campo" id="filhosSimContainer" >
                                        <div class="mb-3">
                                            <div class="floatlabel-wrapper">
                                                <input type="number" class="floatlabel form-control" id="filhos_qtd" name="filhos_qtd"  placeholder="Quantidade dos filhos?" value="<?php echo e(old('filhos_qtd')); ?>" disabled>
                                                <?php $__errorArgs = ['filhos_qtd'];
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
                                    <div class="col-4 form-campo" id="filhosSimContainer" >
                                        <div class="mb-3">
                                            <div class="floatlabel-wrapper">
                                                <input type="text" class="floatlabel form-control" id="filhos_sim" name="filhos_sim"  placeholder="Qual a idade dos filhos?" value="<?php echo e(old('filhos_sim')); ?>" disabled>
                                                <?php $__errorArgs = ['filhos_sim'];
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

                                    
                                    <div class="col-6 form-campo">
                                        <div class="mb-3">
                                            <div class="floatlabel-wrapper required">
                                                <label for="sexo" class="label-floatlabel" class="form-label floatlabel-label">Gênero</label>
                                                <select name="sexo" id="sexo" class="form-select active-floatlabel" required>
                                                    <option></option>
                                                    <option value="Mulher" <?php echo e(old('sexo') == 'Mulher' ? 'selected' : ''); ?>> Feminino</option>                                            
                                                    <option value="Homem" <?php echo e(old('sexo') == 'Homem' ? 'selected' : ''); ?>> Masculino</option>
                                                    <option value="Outro" <?php echo e(old('sexo') == 'Outro' ? 'selected' : ''); ?>> Outro</option>
                                                </select>
                                                <?php $__errorArgs = ['sexo'];
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

                                    <!-- Campo de sexo_outro -->
                                    <div class="col-6 form-campo" id="sexoOutroContainer" >
                                        <div class="mb-3">
                                            <div class="floatlabel-wrapper">
                                                <input type="text" class="floatlabel form-control" id="sexo_outro" name="sexo_outro" placeholder="Qual o seu gênero?" value="<?php echo e(old('sexo_outro')); ?>" disabled>
                                                <?php $__errorArgs = ['sexo_outro'];
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

                                    
                                    <div class="col-6 form-campo">
                                        <div class="mb-3">
                                            <div class="floatlabel-wrapper required">
                                                <label for="pcd" class="label-floatlabel" class="form-label floatlabel-label">PCD?</label>
                                                <select name="pcd" id="pcd" class="form-select active-floatlabel" required>
                                                    <option></option>
                                                    <option value="Sim, com laudo." <?php echo e(old('pcd') == 'Sim, com laudo.' ? 'selected' : ''); ?>> Sim, com laudo.</option>
                                                    <option value="Sim, sem laudo." <?php echo e(old('pcd') == 'Sim, sem laudo.' ? 'selected' : ''); ?>> Sim, sem laudo.</option>
                                                    <option value="Não" <?php echo e(old('pcd') == 'Não' ? 'selected' : ''); ?>> Não</option>
                                                </select>
                                                <?php $__errorArgs = ['pcd'];
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

                                    <!-- Campo de pcd_sim (inicialmente oculto) -->
                                    <div class="col-6 form-campo" id="pcdContainer" >
                                        <div class="mb-3">
                                            <div class="floatlabel-wrapper">
                                                <input type="text" class="floatlabel form-control" id="pcd_sim" name="pcd_sim" placeholder="Número do CID" value="<?php echo e(old('pcd_sim')); ?>" disabled>
                                                <?php $__errorArgs = ['pcd_sim'];
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

                                    <h4 class="fw-normal mb-4 mt-4">Endereço</h4>

                                    <div class="col-12 form-campo">
                                        <div class="mb-3 position-relative" style="width: 30%">
                                            <i class="fas fa-spinner"></i>
                                            <input type="text" placeholder="CEP" class="floatlabel form-control" id="cep" name="cep" value="<?php echo e(old('cep')); ?>" required>
                                            <?php $__errorArgs = ['cep'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-8 form-campo">
                                        <div class="mb-3">
                                            <input type="text" placeholder="Rua" class="floatlabel form-control" id="logradouro" name="logradouro" value="<?php echo e(old('logradouro')); ?>" required>
                                            <?php $__errorArgs = ['logradouro'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-2 form-campo">
                                        <div class="mb-2">
                                            <input type="text" placeholder="Número" class="floatlabel form-control" id="numero" name="numero" value="<?php echo e(old('numero')); ?>" required>
                                            <?php $__errorArgs = ['numero'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-2 form-campo">
                                        <div class="mb-2">
                                            <input type="text" placeholder="Complemento" class="floatlabel form-control" id="complemento" name="complemento" value="<?php echo e(old('complemento')); ?>" required>
                                            <?php $__errorArgs = ['complemento'];
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
                                            <input type="text" placeholder="Bairro" class="floatlabel form-control" id="bairro" name="bairro" value="<?php echo e(old('bairro')); ?>" required>
                                            <?php $__errorArgs = ['bairro'];
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
                                    </div>

                                    <div class="mb-3 form-campo col-4">
                                        <div class="floatlabel-wrapper required">
                                            <label for="uf" class="label-floatlabel" class="form-label floatlabel-label">UF</label>
                                            <select name="uf" id="uf" class="form-select active-floatlabel" required>
                                                <option></option>
                                                <?php
                                                echo get_estados(old('uf'));
                                                ?>
                                            </select>
                                            <?php $__errorArgs = ['uf'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                
                                    <h4 class="fw-normal mb-4 mt-4">Informações Contato</h4>

                                    <div class="col-6 form-campo">
                                        <div class="mb-3">
                                            <input type="email" placeholder="E-mail" class="floatlabel form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-3 form-campo">
                                        <div class="mb-3">
                                            <input type="text" placeholder="Instagram (opcional)" class="floatlabel form-control" id="instagram" value="<?php echo e(old('instagram')); ?>" name="instagram">
                                            <?php $__errorArgs = ['instagram'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-3 form-campo">
                                        <div class="mb-3">
                                            <input type="text" placeholder="LinkedIn (opcional)" class="floatlabel form-control" id="linkedin" value="<?php echo e(old('linkedin')); ?>" name="linkedin">
                                            <?php $__errorArgs = ['linkedin'];
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
                                            <input type="text" placeholder="Telefone Celular(Whatsapp)" class="floatlabel form-control" id="telefone_celular" value="<?php echo e(old('telefone_celular')); ?>" name="telefone_celular" required>
                                            <?php $__errorArgs = ['telefone_celular'];
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
                                            <input type="text" placeholder="Telefone para recado" class="floatlabel form-control" id="telefone_residencial" value="<?php echo e(old('telefone_residencial')); ?>" name="telefone_residencial" required>
                                            <?php $__errorArgs = ['telefone_residencial'];
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
                                            <input type="text" placeholder="Nome para recado" class="floatlabel form-control" id="nome_contato" value="<?php echo e(old('nome_contato')); ?>" name="nome_contato" required>
                                            <?php $__errorArgs = ['nome_contato'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <h4 class="fw-normal mb-4 mt-4">Mais Informações</h4>

                                    <!-- Vagas Interesse -->
                                    <div class="d-flex col-6 form-campo checkbox-group required">
                                        <div class="mb-3 form-checkbox">
                                            <label for="email" class="form-label">Em quais vagas você está interessado?</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="vagas_interesse2" value="Administrativo" name="vagas_interesse[]"
                                                <?php if(old('vagas_interesse') && in_array('Administrativo', old('vagas_interesse'))): ?> checked <?php endif; ?>>                                        
                                                <label class="form-check-label" for="vagas_interesse2">
                                                    Administrativo
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="vagas_interesse5" value="Atendente de Lojas e Mercados (Comércio & Varejo)" name="vagas_interesse[]" 
                                                <?php if(old('vagas_interesse') && in_array('Atendente de Lojas e Mercados (Comércio & Varejo)', old('vagas_interesse'))): ?> checked <?php endif; ?>>                                        
                                                <label class="form-check-label" for="vagas_interesse5">
                                                    Atendente de Lojas e Mercados
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="vagas_interesse3" value="Camareiro(a) de Hotel" name="vagas_interesse[]" 
                                                <?php if(old('vagas_interesse') && in_array('Camareiro(a) de Hotel', old('vagas_interesse'))): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="vagas_interesse3">
                                                    Camareiro(a)/Mensageiro em Hotéis
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="vagas_interesse7" value="Conservação e Limpeza" name="vagas_interesse[]"
                                                <?php if(old('vagas_interesse') && in_array('Conservação e Limpeza', old('vagas_interesse'))): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="vagas_interesse7">
                                                    Conservação e Limpeza
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="vagas_interesse1" value="Copa & Cozinha" name="vagas_interesse[]" 
                                                <?php if(old('vagas_interesse') && in_array('Copa & Cozinha', old('vagas_interesse'))): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="vagas_interesse1">
                                                    Copa & Cozinha
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="vagas_interesse6" value="Construção e Reparos" name="vagas_interesse[]" 
                                                <?php if(old('vagas_interesse') && in_array('Construção e Reparos', old('vagas_interesse'))): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="vagas_interesse6">
                                                    Manutenção/Construção e Reparos
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="vagas_interesse4" value="Recepcionista" name="vagas_interesse[]" 
                                                <?php if(old('vagas_interesse') && in_array('Recepcionista', old('vagas_interesse'))): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="vagas_interesse4">
                                                    Recepção
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="vagas_interesse8" value="Garçom/Cumim" name="vagas_interesse[]" 
                                                <?php if(old('vagas_interesse') && in_array('Garçom/Cumim', old('vagas_interesse'))): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="vagas_interesse8">
                                                    Garçom/Cumim
                                                </label>
                                            </div>
                                            
                                            <?php $__errorArgs = ['vagas_interesse'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <!-- Experiência -->
                                    <div class="d-flex col-6 form-campo">
                                        <div class="mb-3 form-checkbox">
                                            <label for="telefone_residencial" class="form-label">Já possui alguma experiência profissional?</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="experiencia_profissional3" value="Administrativo" name="experiencia_profissional[]" 
                                                <?php if(old('experiencia_profissional') && in_array('Administrativo', old('experiencia_profissional'))): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="experiencia_profissional3">
                                                    Administrativo
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="experiencia_profissional6" value="Atendente de Lojas e Mercados (Comércio & Varejo)" name="experiencia_profissional[]" 
                                                <?php if(old('experiencia_profissional') && in_array('Atendente de Lojas e Mercados (Comércio & Varejo)', old('experiencia_profissional'))): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="experiencia_profissional6">
                                                    Atendente de Lojas e Mercados
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="experiencia_profissional4" value="Camareiro(a) de Hotel" name="experiencia_profissional[]" 
                                                <?php if(old('experiencia_profissional') && in_array('Camareiro(a) de Hotel', old('experiencia_profissional'))): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="experiencia_profissional4">
                                                    Camareiro(a)/Mensageiro em Hotéis
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="experiencia_profissional9" value="Conservação e Limpeza" name="experiencia_profissional[]" 
                                                <?php if(old('experiencia_profissional') && in_array('Conservação e Limpeza', old('experiencia_profissional'))): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="experiencia_profissional9">
                                                    Conservação e Limpeza
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="experiencia_profissional2" value="Copa & Cozinha" name="experiencia_profissional[]" 
                                                <?php if(old('experiencia_profissional') && in_array('Copa & Cozinha', old('experiencia_profissional'))): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="experiencia_profissional2">
                                                    Copa & Cozinha
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="experiencia_profissional8" value="Construção e Reparos" name="experiencia_profissional[]" 
                                                <?php if(old('experiencia_profissional') && in_array('Construção e Reparos', old('experiencia_profissional'))): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="experiencia_profissional8">
                                                    Manutenção/Construção e Reparos
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="experiencia_profissional5" value="Recepcionista" name="experiencia_profissional[]" 
                                                <?php if(old('experiencia_profissional') && in_array('Recepcionista', old('experiencia_profissional'))): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="experiencia_profissional5">
                                                    Recepção
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="experiencia_profissional7" value="Garçon/Cumim" name="experiencia_profissional[]" 
                                                <?php if(old('experiencia_profissional') && in_array('Garçon/Cumim', old('experiencia_profissional'))): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="experiencia_profissional7">
                                                    Garçon/Cumim
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="experiencia_profissional1" value="Nenhuma por enquanto" name="experiencia_profissional[]" 
                                                <?php if(old('experiencia_profissional') && in_array('Nenhuma por enquanto', old('experiencia_profissional'))): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="experiencia_profissional1">
                                                    Nenhuma Experiencia Profissional
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="experiencia_profissional10" value="Outro" name="experiencia_profissional[]" 
                                                <?php if(old('experiencia_profissional') && in_array('Outro', old('experiencia_profissional'))): ?> checked <?php endif; ?>>
                                                <label class="form-check-label" for="experiencia_profissional10">
                                                    Outro
                                                </label>
                                            </div>
                                            <div class="campo-escondido check-experiencia">
                                                <input type="text" placeholder="Qual?" class="floatlabel form-control" id="experiencia_profissional_outro" name="experiencia_profissional_outro" <?php echo e(old('experiencia_profissional_outro')); ?>>
                                            </div>
                                            <?php $__errorArgs = ['experiencia_profissional'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <!-- Formação -->
                                    <div class="d-flex col-12 form-campo">
                                        <div class="mb-3 form-checkbox">
                                            <label for="telefone_celular" class="form-label">Formação/Escolaridade*
                                                (Especifique no campo "OUTRO" caso tenha Ensino Superior, Técnico ou outro)</label>
                                                <div class="form-check form-check">
                                                    <input class="form-check-input" type="checkbox" name="escolaridade[]" id="escolaridade4" value="Ensino Fundamental Completo" 
                                                    <?php if(old('escolaridade') && in_array('Ensino Fundamental Completo', old('escolaridade'))): ?> checked <?php endif; ?>>
                                                    <label class="form-check-label" for="escolaridade4">
                                                        Ensino Fundamental Completo
                                                    </label>
                                                </div>
                                                <div class="form-check form-check">
                                                    <input class="form-check-input" type="checkbox" name="escolaridade[]" id="escolaridade5" value="Ensino Fundamental Cursando" 
                                                    <?php if(old('escolaridade') && in_array('Ensino Fundamental Cursando', old('escolaridade'))): ?> checked <?php endif; ?>>
                                                    <label class="form-check-label" for="escolaridade5">
                                                        Ensino Fundamental Cursando
                                                    </label>
                                                </div>
                                                
                                        
                                                <div class="col-12 form-campo check-fundamental-cursando" id="fundamentalCursandoContainer" style="display: none;">
                                                    <div class="mb-3">
                                                        <div class="floatlabel-wrapper">
                                                            <label for="fundamental_select_periodo" class="label-floatlabel">Período de estudo?</label>
                                                            <select name="fundamental_periodo" id="fundamental_select_periodo" class="form-select active-floatlabel">
                                                                <option></option>
                                                                <option value="Manhã" <?php echo e(old('fundamental_periodo') == 'Manhã' ? 'selected' : ''); ?>>Manhã</option>
                                                                <option value="Tarde" <?php echo e(old('fundamental_periodo') == 'Tarde' ? 'selected' : ''); ?>>Tarde</option>
                                                                <option value="Noite" <?php echo e(old('fundamental_periodo') == 'Noite' ? 'selected' : ''); ?>>Noite</option>
                                                                <option value="Integral" <?php echo e(old('fundamental_periodo') == 'Integral' ? 'selected' : ''); ?>>Integral</option>                                                                                                                
                                                            </select>
                                                            <?php $__errorArgs = ['fundamental_periodo'];
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

                                                <div class="col-12 form-campo check-fundamental-cursando" id="fundamentalCursandoContainer" style="display: none;">
                                                    <div class="mb-3">
                                                        <div class="floatlabel-wrapper">
                                                            <label for="fundamental_select_modalidade" class="label-floatlabel">Modalidade</label>
                                                            <select name="fundamental_modalidade" id="fundamental_select_modalidade" class="form-select active-floatlabel">
                                                                <option></option>
                                                                <option value="Presencial" <?php echo e(old('fundamental_modalidade') == 'Presencial' ? 'selected' : ''); ?>>Presencial</option>
                                                                <option value="EAD" <?php echo e(old('fundamental_modalidade') == 'EAD' ? 'selected' : ''); ?>>EAD</option>
                                                                <option value="Híbrido" <?php echo e(old('fundamental_modalidade') == 'Híbrido' ? 'selected' : ''); ?>>Híbrido</option>
                                                                <option value="Outros" <?php echo e(old('fundamental_modalidade') == 'Outros' ? 'selected' : ''); ?>>Outros</option>                                                        
                                                            </select>
                                                            <?php $__errorArgs = ['fundamental_modalidade'];
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

                                                
                                                <div class="form-check form-check">
                                                    <input class="form-check-input" type="checkbox" name="escolaridade[]" id="escolaridade2" value="Ensino Médio Completo" 
                                                    <?php if(old('escolaridade') && in_array('Ensino Médio Completo', old('escolaridade'))): ?> checked <?php endif; ?>>
                                                    <label class="form-check-label" for="escolaridade2">
                                                        Ensino Médio Completo
                                                    </label>
                                                </div>
                                                <div class="form-check form-check">
                                                    <input class="form-check-input" type="checkbox" name="escolaridade[]" id="escolaridade1" value="Ensino Médio Incompleto" 
                                                    <?php if(old('escolaridade') && in_array('Ensino Médio Incompleto', old('escolaridade'))): ?> checked <?php endif; ?>>
                                                    <label class="form-check-label" for="escolaridade1">
                                                        Ensino Médio Cursando
                                                    </label>
                                                </div>
                                                
                                        
                                                <div class="col-12 form-campo check-medio-cursando" id="medioCursandoContainer" style="display: none;">
                                                    <div class="mb-3">
                                                        <div class="floatlabel-wrapper">
                                                            <label for="medio_select_periodo" class="label-floatlabel">Período de estudo?</label>
                                                            <select name="medio_periodo" id="medio_select_periodo" class="form-select active-floatlabel">
                                                                <option></option>
                                                                <option value="Manhã" <?php echo e(old('medio_periodo') == 'Manhã' ? 'selected' : ''); ?>>Manhã</option>
                                                                <option value="Tarde" <?php echo e(old('medio_periodo') == 'Tarde' ? 'selected' : ''); ?>>Tarde</option>
                                                                <option value="Noite" <?php echo e(old('medio_periodo') == 'Noite' ? 'selected' : ''); ?>>Noite</option>
                                                                <option value="Integral" <?php echo e(old('medio_periodo') == 'Integral' ? 'selected' : ''); ?>>Integral</option>                                                                                                                
                                                            </select>
                                                            <?php $__errorArgs = ['medio_periodo'];
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

                                                <div class="col-12 form-campo check-medio-cursando" id="medioCursandoContainer" style="display: none;">
                                                    <div class="mb-3">
                                                        <div class="floatlabel-wrapper">
                                                            <label for="medio_select_modalidade" class="label-floatlabel">Modalidade</label>
                                                            <select name="medio_modalidade" id="medio_select_modalidade" class="form-select active-floatlabel">
                                                                <option></option>
                                                                <option value="Presencial" <?php echo e(old('medio_modalidade') == 'Presencial' ? 'selected' : ''); ?>>Presencial</option>
                                                                <option value="EAD" <?php echo e(old('medio_modalidade') == 'EAD' ? 'selected' : ''); ?>>EAD</option>
                                                                <option value="Híbrido" <?php echo e(old('medio_modalidade') == 'Híbrido' ? 'selected' : ''); ?>>Híbrido</option>
                                                                <option value="Outros" <?php echo e(old('medio_modalidade') == 'Outros' ? 'selected' : ''); ?>>Outros</option>                                                        
                                                            </select>
                                                            <?php $__errorArgs = ['medio_modalidade'];
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

                                                
                                                <div class="form-check form-check">
                                                    <input class="form-check-input" type="checkbox" name="escolaridade[]" id="escolaridade6" value="Ensino Técnico Completo" 
                                                    <?php if(old('escolaridade') && in_array('Ensino Técnico Completo', old('escolaridade'))): ?> checked <?php endif; ?>>
                                                    <label class="form-check-label" for="escolaridade6">
                                                        Ensino Técnico Completo
                                                    </label>
                                                </div>
                                                <div class="form-check form-check">
                                                    <input class="form-check-input" type="checkbox" name="escolaridade[]" id="escolaridade7" value="Ensino Técnico Cursando" 
                                                    <?php if(old('escolaridade') && in_array('Ensino Técnico Cursando', old('escolaridade'))): ?> checked <?php endif; ?>>
                                                    <label class="form-check-label" for="escolaridade7">
                                                        Ensino Técnico Cursando
                                                    </label>
                                                </div>

                                                
                                        
                                                <div class="col-12 form-campo check-tecnico-cursando" id="tecnicoCursandoContainer" style="display: none;">
                                                    <div class="mb-3">
                                                        <input  type="text" placeholder="Qual curso?" class="floatlabel form-control" id="tecnico_curso" name="tecnico_curso" value="<?php echo e(old('tecnico_curso')); ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="floatlabel-wrapper">
                                                            <label for="tecnico_select_periodo" class="label-floatlabel">Período de estudo?</label>
                                                            <select name="tecnico_periodo" id="tecnico_select_periodo" class="form-select active-floatlabel">
                                                                <option></option>
                                                                <option value="Manhã" <?php echo e(old('tecnico_periodo') == 'Manhã' ? 'selected' : ''); ?>>Manhã</option>
                                                                <option value="Tarde" <?php echo e(old('tecnico_periodo') == 'Tarde' ? 'selected' : ''); ?>>Tarde</option>
                                                                <option value="Noite" <?php echo e(old('tecnico_periodo') == 'Noite' ? 'selected' : ''); ?>>Noite</option>
                                                                <option value="Integral" <?php echo e(old('tecnico_periodo') == 'Integral' ? 'selected' : ''); ?>>Integral</option>                                                                                                                
                                                            </select>
                                                            <?php $__errorArgs = ['tecnico_periodo'];
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

                                                <div class="col-12 form-campo check-tecnico-cursando" id="tecnicoCursandoContainer" style="display: none;">
                                                    <div class="mb-3">
                                                        <div class="floatlabel-wrapper">
                                                            <label for="tecnico_select_modalidade" class="label-floatlabel">Modalidade</label>
                                                            <select name="tecnico_modalidade" id="tecnico_select_modalidade" class="form-select active-floatlabel">
                                                                <option></option>
                                                                <option value="Presencial" <?php echo e(old('tecnico_modalidade') == 'Presencial' ? 'selected' : ''); ?>>Presencial</option>
                                                                <option value="EAD" <?php echo e(old('tecnico_modalidade') == 'EAD' ? 'selected' : ''); ?>>EAD</option>
                                                                <option value="Híbrido" <?php echo e(old('tecnico_modalidade') == 'Híbrido' ? 'selected' : ''); ?>>Híbrido</option>
                                                                <option value="Outros" <?php echo e(old('tecnico_modalidade') == 'Outros' ? 'selected' : ''); ?>>Outros</option>                                                        
                                                            </select>
                                                            <?php $__errorArgs = ['tecnico_modalidade'];
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

                                                
                                                <div class="form-check form-check">
                                                    <input class="form-check-input" type="checkbox" name="escolaridade[]" id="escolaridade8" value="Superior Completo" 
                                                    <?php if(old('escolaridade') && in_array('Superior Completo', old('escolaridade'))): ?> checked <?php endif; ?>>
                                                    <label class="form-check-label" for="escolaridade8">
                                                        Superior Completo
                                                    </label>
                                                </div>
                                                <div class="form-check form-check">
                                                    <input class="form-check-input" type="checkbox" name="escolaridade[]" id="escolaridade9" value="Superior Cursando" 
                                                    <?php if(old('escolaridade') && in_array('Superior Cursando', old('escolaridade'))): ?> checked <?php endif; ?>>
                                                    <label class="form-check-label" for="escolaridade9">
                                                        Superior Cursando
                                                    </label>
                                                </div>
                                                
                                        
                                                <div class="col-12 form-campo check-superior-cursando" id="superiorCursandoContainer" style="display: none;">
                                                    <div class="mb-3">
                                                        <input  type="text" placeholder="Qual curso?" class="floatlabel form-control" id="superior_curso" name="superior_curso" value="<?php echo e(old('superior_curso')); ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <input  type="text" placeholder="Qual Instituição?" class="floatlabel form-control" id="superior_semestre" name="superior_instituicao" value="<?php echo e(old('superior_instituicao')); ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="floatlabel-wrapper">
                                                            <label for="superior_select_periodo" class="label-floatlabel">Qual ao Período?</label>
                                                            <select name="superior_periodo" id="superior_select_periodo" class="form-select active-floatlabel">
                                                                <option></option>
                                                                <option value="Manhã" <?php echo e(old('superior_periodo') == 'Manhã' ? 'selected' : ''); ?>>Manhã</option>
                                                                <option value="Tarde" <?php echo e(old('superior_periodo') == 'Tarde' ? 'selected' : ''); ?>>Tarde</option>
                                                                <option value="Noite" <?php echo e(old('superior_periodo') == 'Noite' ? 'selected' : ''); ?>>Noite</option>
                                                                <option value="Integral" <?php echo e(old('superior_periodo') == 'Integral' ? 'selected' : ''); ?>>Integral</option>                                                        
                                                            </select>
                                                            <?php $__errorArgs = ['superior_periodo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>                                            
                                                    <div class="mb-3">
                                                        <div class="floatlabel-wrapper">
                                                            <label for="superior_select_modalidade" class="label-floatlabel">Modalidade</label>
                                                            <select name="superior_semestre" id="superior_select_modalidade" class="form-select active-floatlabel">
                                                                <option></option>
                                                                <option value="Presencial" <?php echo e(old('superior_semestre') == 'Presencial' ? 'selected' : ''); ?>>Presencial</option>
                                                                <option value="EAD" <?php echo e(old('superior_semestre') == 'EAD' ? 'selected' : ''); ?>>EAD</option>
                                                                <option value="Híbrido" <?php echo e(old('superior_semestre') == 'Híbrido' ? 'selected' : ''); ?>>Híbrido</option>
                                                                <option value="Outros" <?php echo e(old('superior_semestre') == 'Outros' ? 'selected' : ''); ?>>Outros</option>                                                        
                                                            </select>
                                                            <?php $__errorArgs = ['superior_semestre'];
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


                                                
                                                <div class="form-check form-check">
                                                    <input class="form-check-input" type="checkbox" name="escolaridade[]" id="escolaridade3" value="Outro" 
                                                    <?php if(old('escolaridade') && in_array('Outro', old('escolaridade'))): ?> checked <?php endif; ?>>
                                                    <label class="form-check-label" for="escolaridade3">
                                                    Outro
                                                    </label>
                                                </div>

                                                
                                                <div class="campo-escondido check-escolaridade">
                                                    <input type="text" placeholder="Qual curso?" class="floatlabel form-control" id="escolaridade_outro" name="escolaridade_outro" value="<?php echo e(old('escolaridade_outro')); ?>">                                            
                                                    <input type="text" placeholder="Qual Instituição?" class="floatlabel form-control" id="instituicao" name="instituicao" value="<?php echo e(old('instituicao')); ?>">
                                                    <div class="mb-3">
                                                        <div class="floatlabel-wrapper">
                                                            <label for="outro_select_periodo" class="label-floatlabel">Qual ao Período?</label>
                                                            <select name="outro_periodo" id="outro_select_periodo" class="form-select active-floatlabel  campo-select-2">
                                                                <option></option>
                                                                <option value="Manhã" <?php echo e(old('outro_periodo') == 'Manhã' ? 'selected' : ''); ?>>Manhã</option>
                                                                <option value="Tarde" <?php echo e(old('outro_periodo') == 'Tarde' ? 'selected' : ''); ?>>Tarde</option>
                                                                <option value="Noite" <?php echo e(old('outro_periodo') == 'Noite' ? 'selected' : ''); ?>>Noite</option>
                                                                <option value="Integral" <?php echo e(old('outro_periodo') == 'Integral' ? 'selected' : ''); ?>>Integral</option>                                                        
                                                            </select>
                                                            <?php $__errorArgs = ['outro_periodo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>                                            
                                                    <div class="mb-3">
                                                        <div class="floatlabel-wrapper">
                                                            <label for="outro_select_modalidade" class="label-floatlabel">Modalidade</label>
                                                            <select name="semestre" id="outro_select_modalidade" class="form-select active-floatlabel  campo-select-2">
                                                                <option></option>
                                                                <option value="Presencial" <?php echo e(old('semestre') == 'Presencial' ? 'selected' : ''); ?>>Presencial</option>
                                                                <option value="EAD" <?php echo e(old('semestre') == 'EAD' ? 'selected' : ''); ?>>EAD</option>
                                                                <option value="Híbrido" <?php echo e(old('semestre') == 'Híbrido' ? 'selected' : ''); ?>>Híbrido</option>
                                                                <option value="Outros" <?php echo e(old('semestre') == 'Outros' ? 'selected' : ''); ?>>Outros</option>                                                        
                                                            </select>
                                                            <?php $__errorArgs = ['semestre'];
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
                                                <?php $__errorArgs = ['escolaridade'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <!-- Jovem Aprendiz -->
                                    <div class="d-flex col-6 form-campo">
                                        <div class="mb-3 form-checkbox">
                                            <label for="foi_jovem_aprendiz" class="form-label">Já foi Jovem Aprendiz?</label>
                                            <div class="form-check form-check">
                                                <input class="form-check-input" type="radio" name="foi_jovem_aprendiz" id="foi_jovem_aprendiz1" value="Sim, da ASPPE" <?php echo e(old('foi_jovem_aprendiz') == 'Sim, da ASPPE' ? 'checked' : ''); ?>>
                                                <label class="form-check-label" for="foi_jovem_aprendiz1">
                                                    Sim, da ASPPE
                                                </label>
                                            </div>
                                            <div class="form-check form-check">
                                                <input class="form-check-input" type="radio" name="foi_jovem_aprendiz" id="foi_jovem_aprendiz2" value="Sim, de Outra Qualificadora" <?php echo e(old('foi_jovem_aprendiz') == 'Sim, de Outra Qualificadora' ? 'checked' : ''); ?>>
                                                <label class="form-check-label" for="foi_jovem_aprendiz2">
                                                    Sim, de Outra Qualificadora
                                                </label>
                                            </div>
                                            <div class="form-check form-check">
                                                <input class="form-check-input" type="radio" name="foi_jovem_aprendiz" id="foi_jovem_aprendiz3" value="Não" <?php echo e(old('foi_jovem_aprendiz') == 'Não' ? 'checked' : ''); ?>>
                                                <label class="form-check-label" for="foi_jovem_aprendiz3">
                                                    Não
                                                </label>
                                            </div>
                                            <?php $__errorArgs = ['foi_jovem_aprendiz'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                
                                    <!-- Uniformes-->
                                    

                                    <div class="d-flex col-6 form-campo">

                                        <div class="mb-3 form-checkbox">
                                            <label for="informatica" class="form-label">Possui conhecimento no pacote Office (Excel/Word)</label>
                                            <div class="form-check form-check">
                                                <input class="form-check-input" type="radio" name="informatica" id="informatica1" value="Básico" <?php echo e(old('informatica') == 'Básico' ? 'checked' : ''); ?>>
                                                <?php $__errorArgs = ['informatica'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <label class="form-check-label" for="informatica1">
                                                    Básico
                                                </label>
                                            </div>

                                            <div class="form-check form-check">
                                                <input class="form-check-input" type="radio" name="informatica" id="informatica2" value="Intermediário" <?php echo e(old('informatica') == 'Intermediário' ? 'checked' : ''); ?>>
                                                <?php $__errorArgs = ['informatica'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <label class="form-check-label" for="informatica2">
                                                Intermediário
                                                </label>
                                            </div>

                                            <div class="form-check form-check">
                                                <input class="form-check-input" type="radio" name="informatica" id="informatica3" value="Avançado" <?php echo e(old('informatica') == 'Avançado' ? 'checked' : ''); ?>>
                                                <?php $__errorArgs = ['informatica'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <label class="form-check-label" for="informatica3">
                                                Avançado
                                                </label>
                                            </div>

                                            <div class="form-check form-check">
                                                <input class="form-check-input" type="radio" name="informatica" id="informatica3" value="Nenhum" <?php echo e(old('informatica') == 'Nenhum' ? 'checked' : ''); ?>>
                                                <?php $__errorArgs = ['informatica'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <label class="form-check-label" for="informatica3">
                                                Nenhum / Inexistente
                                                </label>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="d-flex col-6 form-campo">

                                        <div class="mb-3 form-checkbox">
                                            <label for="ingles" class="form-label">Conhecimento de Inglês?</label>
                                            <div class="form-check form-check">
                                                <input class="form-check-input" type="radio" name="ingles" id="ingles1" value="Básico" <?php echo e(old('ingles') == 'Básico' ? 'checked' : ''); ?>>
                                                <?php $__errorArgs = ['ingles'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <label class="form-check-label" for="ingles1">
                                                    Básico
                                                </label>
                                            </div>

                                            <div class="form-check form-check">
                                                <input class="form-check-input" type="radio" name="ingles" id="ingles2" value="Intermediário" <?php echo e(old('ingles') == 'Intermediário' ? 'checked' : ''); ?>>
                                                <?php $__errorArgs = ['ingles'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <label class="form-check-label" for="ingles2">
                                                Intermediário
                                                </label>
                                            </div>

                                            <div class="form-check form-check">
                                                <input class="form-check-input" type="radio" name="ingles" id="ingles3" value="Avançado" <?php echo e(old('ingles') == 'Avançado' ? 'checked' : ''); ?>>
                                                <?php $__errorArgs = ['ingles'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <label class="form-check-label" for="ingles3">
                                                Avançado
                                                </label>
                                            </div>

                                            <div class="form-check form-check">
                                                <input class="form-check-input" type="radio" name="ingles" id="ingles4" value="Nenhum" <?php echo e(old('ingles') == 'Nenhum' ? 'checked' : ''); ?>>
                                                <?php $__errorArgs = ['ingles'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <label class="form-check-label" for="ingles4">
                                                Nenhum / Inexistente
                                                </label>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="d-flex col-6 form-campo">
                                        <div class="mb-3 form-checkbox">
                                            <label for="cras" class="form-label">Sua família é atendida por algum equipamento do governo?(CRAS/CREAS/BOLSA FAMÍLIA/AUX. BRASIL)</label>
                                            <div class="form-check form-check">
                                                <input class="form-check-input" type="radio" name="cras" id="cras1" value="Sim" <?php echo e(old('cras') == 'Sim' ? 'checked' : ''); ?>>
                                                <?php $__errorArgs = ['cras'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <label class="form-check-label" for="cras1">
                                                    Sim
                                                </label>
                                            </div>

                                            <div class="form-check form-check">
                                                <input class="form-check-input" type="radio" name="cras" id="cras2" value="Não" <?php echo e(old('cras') == 'Não' ? 'checked' : ''); ?>>
                                                <?php $__errorArgs = ['cras'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <label class="form-check-label" for="cras2">
                                                Não
                                                </label>
                                            </div>                                  

                                        </div>
                                    </div>     
                                    
                                    <div class="d-flex col-6 form-campo">
                                        <div class="mb-3 form-checkbox pb-3">
                                            <label for="fonte" class="form-label">Como ficou sabendo do nosso programa?</label>
                                            <input type="text" placeholder="Site/Google/Etc" class="floatlabel form-control" id="fonte" name="fonte" <?php echo e(old('fonte')); ?> required>
                                            <?php $__errorArgs = ['fonte'];
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

                                
                                <div class="row">
                                    <div class="col-12 form-campo">
                                        <h5 class="titulo-autorizacao my-3">Autorização de uso de imagem e dados para fins do processo seletivo</h5>
                                        <p class="texto-autorizacao mb-3">Autorizo, de forma gratuita, o uso da minha imagem e dados pessoais exclusivamente para fins internos da ASPPE – Prepara Jovem, relacionados ao processo de inscrição, entrevista, triagem, encaminhamento e contato com empresas parceiras.
Declaro estar ciente de que essas informações serão utilizadas apenas no contexto do sistema de vagas, com total respeito à confidencialidade e sempre visando as melhores oportunidades para minha formação profissional.
Estou ciente de que essa autorização não se estende a divulgação pública e que a imagem será utilizada apenas nos registros internos da instituição.</p>
                                        <!-- Checkbox de autorização (obrigatório para todos) -->
                                        <div class="form-check mb-3">
                                            <input type="checkbox" 
                                                id="autorizacao_uso_dados" 
                                                name="autorizacao_uso_dados" 
                                                class="form-check-input" 
                                                required
                                                value="1">
                                            <label for="autorizacao_uso_dados" class="form-check-label label-autorizacao">
                                                Li e autorizo o uso da minha imagem e dados pessoais para os fins acima descritos.
                                            </label>
                                            <?php $__errorArgs = ['autorizacao_uso_dados'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <!-- Checkbox condicional para menores (só aparece se menor de idade) -->
                                        <div class="form-check mb-3" id="autorizacao-responsavel-container" style="display: none;">
                                            <input type="checkbox" 
                                                id="autorizacao_responsavel_menor" 
                                                name="autorizacao_responsavel_menor" 
                                                class="form-check-input"
                                                value="1">
                                            <label for="autorizacao_responsavel_menor" class="form-check-label label-autorizacao">
                                                Se menor de idade, declaro que esta autorização é concedida com ciência do(a) responsável legal.
                                            </label>
                                            <?php $__errorArgs = ['autorizacao_responsavel_menor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>


                                    </div>
                                </div>

                                <div class="col-9 bloco-submit d-flex mt-3">
                                    <button type="submit" class="btn-padrao btn-cadastrar">Cadastrar</button>
                                    <a href="<?php echo e(route('resumes.index')); ?>" class="btn-padrao btn-cancelar ms-3">Cancelar</a>
                                </div>

                            </div>
                        
                            <div class="col-3 border-start py-0 ps-5 form-r">
        
                                <div class="mb-3 d-flex flex-column align-items-center">
                                    <p class="fw-bold text-center">Faça Upload do Currículo</p>
        
                                    
                                    <input type="file" id="file-upload" class="file-input"
                                        accept=".pdf" name="curriculo_doc" required>
        
                                    <div class="preview-container mb-3">
        
                                        <div id="preview-doc" class="preview-doc" style="display: none;">
                                            <p id="file-name"></p>
                                            <a id="file-download" href="#" target="_blank" class="btn btn-sm btn-primary">Baixar</a>
                                        </div>
                                    </div>
        
                                    <label for="file-upload" class="btn-select-file btn-padrao">Selecionar</label>                                    
        
                                    <?php $__errorArgs = ['curriculo_doc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="alert alert-danger"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>                                
                            </div>

                            <div id="bloco-submit-mobile" class="col-9 bloco-submit mt-3">
                                <button type="submit" class="btn-padrao btn-cadastrar">Cadastrar</button>
                                <a href="#" class="btn-padrao btn-cancelar ms-3">Cancelar</a>
                            </div>
        
                        </div>
        
                    </form>
                </div>
        
            </article>
        
        </section>

    </main>



    <!-- JavaScript Libraries  <div id="cpf-error" class="d-none alert alert-danger"></div> -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


<!-- Template Javascript -->
<script src="<?php echo e(asset('js/main.js')); ?>"></script>

<script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.mask.js')); ?>"></script>
<script src="<?php echo e(asset('js/floatlabels.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
<script>
    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00000';
    },
    spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };


document.addEventListener("DOMContentLoaded", function () {
    const fileUpload = document.getElementById('file-upload');
    
    // Evento change para quando um arquivo for selecionado
    fileUpload.addEventListener('change', function (event) {
        // Remover mensagem de erro se existir
        removeErrorMessage();
        
        if (event.target.files.length === 0) {
            return; // Sai da função se nenhum arquivo for selecionado
        }
        
        const file = event.target.files[0]; // Obtém o arquivo selecionado
        
        // Verifica se o arquivo é um PDF
        if (file.type !== "application/pdf") {
            showErrorMessage("Por favor, selecione um arquivo PDF.");
            event.target.value = ""; // Limpa o campo
            return;
        }
        
        // Atualiza a prévia do documento
        document.getElementById("file-name").textContent = file.name;
        document.getElementById("file-download").href = URL.createObjectURL(file);
        document.getElementById("preview-doc").style.display = "block";
    });
    
    // Validação no envio do formulário
    const form = fileUpload.closest('form');
    form.addEventListener('submit', function(event) {
        if (!fileUpload.value) {
            event.preventDefault(); // Impede o envio do formulário
            showErrorMessage("O currículo é obrigatório. Por favor, selecione um arquivo PDF.");
            // Fazer scroll para o campo de upload para chamar atenção do usuário
            fileUpload.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    });
    
    // Função para mostrar mensagem de erro
    function showErrorMessage(message) {
        // Remover mensagem anterior se existir
        removeErrorMessage();
        
        // Criar e inserir nova mensagem de erro após o botão de seleção
        const errorDiv = document.createElement('div');
        errorDiv.id = 'curriculo-error';
        errorDiv.className = 'alert alert-danger mt-2';
        errorDiv.textContent = message;
        
        const labelElement = document.querySelector('label[for="file-upload"]');
        labelElement.insertAdjacentElement('afterend', errorDiv);
    }
    
    // Função para remover mensagem de erro
    function removeErrorMessage() {
        const errorElement = document.getElementById('curriculo-error');
        if (errorElement) {
            errorElement.remove();
        }
    }
});


$('#uf').select2({
    placeholder: "Selecione",
});
$('#estado_civil').select2({
    placeholder: "Selecione",
});
$('#possui_filhos').select2({
    placeholder: "Selecione",
});
$('#sexo').select2({
    placeholder: "Selecione",
});
$('#cnh').select2({
    placeholder: "Selecione",
});
$('#tipo_cnh').select2({
    placeholder: "Selecione",
});
$('#informatica').select2({
    placeholder: "Selecione",
});
$('#ingles').select2({
    placeholder: "Selecione",
});
$('#tamanho_uniforme').select2({
    placeholder: "Selecione",
});
$('#nacionalidade').select2({
    placeholder: "Selecione",
});
$('#pcd').select2({
    placeholder: "Selecione",
});
$('#reservista').select2({
    placeholder: "Selecione",
});

// $('#fundamental_periodo').select2({
//     placeholder: "Selecione",
// });
// $('#medio_periodo').select2({
//     placeholder: "Selecione",
// });
// $('#tecnico_periodo').select2({
//     placeholder: "Selecione",
// });

// $('#superior_periodo').select2({
//     placeholder: "Selecione",
// });

$('#fundamental_select_periodo, #fundamental_select_modalidade, #medio_select_periodo, #medio_select_modalidade, #tecnico_select_periodo, #tecnico_select_modalidade, #superior_select_periodo, #superior_select_modalidade, #outro_select_periodo, #outro_select_modalidade ').select2({
    placeholder: "Selecione",
});

$('#rg').mask('00.000.000-0');
$('#cep').mask('00000-000');
$('#telefone_celular').mask('(00) 00000-0000');
$('#telefone_residencial').mask(SPMaskBehavior, spOptions);

$('#cep').on('input', function(){

    var cep     = $(this).val(),
        digitos = cep.length;

    if(digitos === 9){

        $('.fa-spinner').show();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            },
            url : "<?php echo e(url('getCep')); ?>",
            data : {'cep': cep},
            type : 'POST',
            dataType : 'json',
            success : function(result){

                $('.fa-spinner').hide();

                if(result.msg === '1'){

                    $('#cidade').val(result.cidade);
                    $('#bairro').val(result.bairro);
                    //$('#uf').val(result.uf);
                    $('#uf').val(result.uf).trigger('change');

                    $('#logradouro').val(result.rua);

                    setTimeout(function(){
                        $('.floatlabel').trigger('change');
                    }, 150)

                } else if(result.msg === '3'){

                    $.message('CEP inválido, por favor verifique o número informado', 2);

                } else {

                    $.message('CEP não encontrado, por favor verifique o número informado', 2);

                }

            }
        });

    }

});

$("#form-companies-create").validate({
    ignore: [],
    rules:{
        nome:"required",
        cpf:"required",
        cnh:"required",
        data_nascimento:"required",
        nacionalidade:"required",
        estado_civil:"required",
        reservista:"required",
        possui_filhos:"required",
        sexo:"required",
        pcd:"required",
        cep:"required",
        logradouro:"required",
        numero:"required",
        escolaridade:"required",
        complemento:"required",
        bairro:"required",
        cidade:"required",
        uf:"required",
        email:"required",
        telefone_celular:"required",
        telefone_residencial:"required",
        nome_contato:"required",
        foi_jovem_aprendiz:"required",
        informatica:"required",
        ingles:"required",
        cras:"required",
        fonte:"required"        
        //rg:"required",
        //tamanho_uniforme:"required",
    }
});


// Função para validar CPF
function validarCPF(cpf) {
    // Remove caracteres não numéricos
    cpf = cpf.replace(/[^\d]/g, '');
    
    // Verifica se tem 11 dígitos
    if (cpf.length !== 11) {
        return false;
    }
    
    // Verifica se todos os dígitos são iguais (ex: 111.111.111-11)
    if (/^(\d)\1+$/.test(cpf)) {
        return false;
    }
    
    // Validação do primeiro dígito verificador
    let soma = 0;
    for (let i = 0; i < 9; i++) {
        soma += parseInt(cpf.charAt(i)) * (10 - i);
    }
    let resto = 11 - (soma % 11);
    let digitoVerificador1 = resto === 10 || resto === 11 ? 0 : resto;
    
    if (digitoVerificador1 !== parseInt(cpf.charAt(9))) {
        return false;
    }
    
    // Validação do segundo dígito verificador
    soma = 0;
    for (let i = 0; i < 10; i++) {
        soma += parseInt(cpf.charAt(i)) * (11 - i);
    }
    resto = 11 - (soma % 11);
    let digitoVerificador2 = resto === 10 || resto === 11 ? 0 : resto;
    
    return digitoVerificador2 === parseInt(cpf.charAt(10));
}

// Aplicar validação ao campo CPF
$(document).ready(function() {
    $('#cpf').mask('000.000.000-00');
    
    // Validação quando o formulário for enviado
    $('form').submit(function(event) {
        const cpf = $('#cpf').val();
        
        if (!validarCPF(cpf)) {
            event.preventDefault();
            // Adiciona classe de erro e mensagem
            $('#cpf').addClass('is-invalid');
            
            // Verifica se já existe uma mensagem de erro
            if ($('#cpf-error').length === 0) {
                $('#cpf').after('<div id="cpf-error" class="alert alert-danger">CPF inválido. Por favor, verifique.</div>');
            }
            return false;
        } else {
            // Remove mensagens de erro se o CPF for válido
            $('#cpf').removeClass('is-invalid');
            $('#cpf-error').remove();
        }
    });
    
    // Validação em tempo real (opcional)
    $('#cpf').on('blur', function() {
        const cpf = $(this).val();
        
        // Só valida se o campo estiver completo
        if (cpf.length === 14) {
            if (!validarCPF(cpf)) {
                $(this).addClass('is-invalid');
                if ($('#cpf-error').length === 0) {
                    $(this).after('<div id="cpf-error" class="alert alert-danger">CPF inválido. Por favor, verifique.</div>');
                }
            } else {
                $(this).removeClass('is-invalid');
                $('#cpf-error').remove();
            }
        }
    });
});



document.addEventListener('DOMContentLoaded', function() {
    const dataNascimento = document.getElementById('data_nascimento');
    const responsavelContainer = document.getElementById('autorizacao-responsavel-container');
    const checkboxResponsavel = document.getElementById('autorizacao_responsavel_menor');
    
    function calcularIdade(dataNasc) {
        const hoje = new Date();
        const nascimento = new Date(dataNasc);
        let idade = hoje.getFullYear() - nascimento.getFullYear();
        const mes = hoje.getMonth() - nascimento.getMonth();
        
        if (mes < 0 || (mes === 0 && hoje.getDate() < nascimento.getDate())) {
            idade--;
        }
        
        return idade;
    }
    
    function verificarMenorIdade() {
        if (dataNascimento.value) {
            const idade = calcularIdade(dataNascimento.value);
            
            if (idade < 18) {
                responsavelContainer.style.display = 'block';
                checkboxResponsavel.required = true;
            } else {
                responsavelContainer.style.display = 'none';
                checkboxResponsavel.required = false;
                checkboxResponsavel.checked = false;
            }
        }
    }
    
    // Verificar ao carregar a página (para casos de retorno com erro)
    if (dataNascimento.value) {
        verificarMenorIdade();
    }
    
    // Verificar quando a data é alterada
    dataNascimento.addEventListener('change', verificarMenorIdade);
});

</script>

</body>
</html><?php /**PATH /home1/flav6095/painelasppe.com.br/resources/views/publicResume/index.blade.php ENDPATH**/ ?>