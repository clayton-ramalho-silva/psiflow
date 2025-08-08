@extends('layouts.app')

@section('content')
<section class="cabecario">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('pacientes.index') }}">Paciente</a></li>
          <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
        </ol>
      </nav>

      {{--Componente Botão voltar --}}
      @php
          // Guarda a rota na variável
          $rota = route('pacientes.index');
      @endphp

      <x-voltar :rota="$rota"/>
      {{--Componente Botão voltar --}}

</section>



@if (session('danger'))
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
        {{ session('danger') }}
        </div>
    </div>
@endif

<section class="sessao">

    <article class="f1 container-form-create">

        <div class="container">

            <h4 class="fw-normal mb-4">Cadastro de Novo Paciente</h4>

            <form class="form-padrao" id="form-companies-create" action="{{ route('pacientes.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-12 py-0 pe-5 form-l">

                        <div class="row">

                            <div class="col-9 form-campo">
                                <div class="mb-3">
                                    <input type="text" placeholder="Nome Completo" class="floatlabel form-control" id="nome" name="nome" value="{{ old('nome')}}">
                                    @error('nome') <div class="alert alert-danger">{{ $message }}</div> @enderror

                                </div>
                            </div>

                             <!-- Data de Nascimento -->
                            <div class="col-3 form-campo">
                                <div class="mb-3">
                                    <div class="floatlabel-wrapper ">
                                        <label for="date" class="label-floatlabel" class="form-label floatlabel-label">Data de Nascimento</label>
                                        <input type="date" class="form-control active-floatlabel" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento')}}" >
                                        @error('data_nascimento') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>  

                            <div class="col-4 form-campo">
                                <div class="mb-3">
                                    <input type="text" placeholder="CPF" class="floatlabel form-control" id="cpf" name="cpf" value="{{ old('cpf')}}" placeholder="CPF">
                                    <div id="cpf-error" class="d-none alert alert-danger"></div>
                                    @error('cpf') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="col-4 form-campo">
                                <div class="mb-3">
                                    <input type="text" placeholder="RG" class="floatlabel form-control" id="rg" name="rg" placeholder="RG" value="{{ old('rg')}}" >
                                    @error('rg') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>                                                       

                             {{-- Gênero  --}}
                            <div class="col-4 form-campo">
                                <div class="mb-3">
                                    <div class="floatlabel-wrapper ">
                                        <label for="genero" class="label-floatlabel" class="form-label floatlabel-label">Gênero</label>
                                        <select name="genero" id="genero" class="form-select active-floatlabel" >
                                            <option></option>
                                            <option value="Feminino" {{ old('genero') == 'Feminino' ? 'selected' : ''}}> Feminino</option>                                            
                                            <option value="Masculino" {{ old('genero') == 'Masculino' ? 'selected' : ''}}> Masculino</option>
                                            <option value="Outro" {{ old('genero') == 'Outro' ? 'selected' : ''}}> Outro</option>
                                        </select>
                                        @error('genero') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>                                                                       

                            <h4 class="fw-normal mb-4 mt-4">Endereço</h4>

                            <div class="col-4 form-campo">
                                <div class="mb-3 position-relative">
                                    <i class="fas fa-spinner"></i>
                                    <input type="text" placeholder="CEP" class="floatlabel form-control" id="cep" name="cep" value="{{ old('cep')}}" >
                                    @error('cep') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="col-8 form-campo">
                                <div class="mb-3">
                                    <input type="text" placeholder="Rua - Nº - Bairro" class="floatlabel form-control" id="endereco" name="endereco" value="{{ old('endereco')}}" >
                                    @error('endereco') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>                                                                                  

                            <div class="col-6 form-campo">
                                <div class="mb-3">
                                    <input type="text" placeholder="Cidade" class="floatlabel form-control" id="cidade" name="cidade" value="{{ old('cidade')}}" >
                                    @error('cidade') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="col-6 mb-3 form-campo">
                                <div class="floatlabel-wrapper ">
                                    <label for="estado" class="label-floatlabel" class="form-label floatlabel-label">UF</label>
                                    <select name="estado" id="estado" class="form-select active-floatlabel" >
                                        <option></option>
                                        @php
                                        echo get_estados(old('estado'));
                                        @endphp
                                    </select>
                                    @error('estado') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                           
                            <h4 class="fw-normal mb-4 mt-4">Informações Contato</h4>

                            <div class="col-4 form-campo">
                                <div class="mb-3">
                                    <input type="email" placeholder="E-mail" class="floatlabel form-control" id="email" name="email" value="{{ old('email')}}" >
                                    @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>                           

                            <div class="col-4 form-campo">
                                <div class="mb-3">
                                    <input type="text" placeholder="Telefone Celular(Whatsapp)" class="floatlabel form-control" id="telefone_celular" value="{{ old('telefone_celular')}}" name="telefone_celular" >
                                    @error('telefone_celular') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="col-4 form-campo">
                                <div class="mb-3">
                                    <input type="text" placeholder="Telefone fixo" class="floatlabel form-control" id="telefone_fixo" value="{{ old('telefone_fixo')}}" name="telefone_fixo" >
                                    @error('telefone_fixo') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                           

                            <h4 class="fw-normal mb-4 mt-4">Histórico Médico</h4>
                            <div class="col-12 form-campo">
                                <div class="mb-3">
                                    <textarea id="historico_medico" name="historico_medico" class="form-control">{{ old('historico_medico')}} </textarea>
                                    @error('historico_medico') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                  
                                </div>
                            </div>

                            <h4 class="fw-normal mb-4 mt-4">Observações</h4>
                             <div class="col-12 form-campo">
                                <div class="mb-3">
                                    <textarea id="observacoes" name="observacoes" class="form-control">{{ old('observacoes') }}</textarea>
                                    @error('observacoes') <div class="alert alert-danger">{{ $message }}</div> @enderror
                                  
                                </div>
                            </div>

                            

                        </div>

                        <div class="col-9 bloco-submit d-flex mt-3">
                            <button type="submit" class="btn-padrao btn-cadastrar">Cadastrar</button>
                            <a href="{{ route('pacientes.index')}}" class="btn-padrao btn-cancelar ms-3">Cancelar</a>
                        </div>

                    </div>                  

                </div>

            </form>
        </div>

    </article>

</section>
@endsection

@push('scripts-custom')
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/jquery.mask.js') }}"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->

 
<script>
  tinymce.init({
    selector: '#historico_medico, #observacoes',
    plugins: [
      // Core editing features
      'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
      // Your account includes a free trial of TinyMCE premium features
      // Try the most popular premium features until Aug 19, 2025:
      'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'advtemplate', 'ai', 'uploadcare', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown','importword', 'exportword', 'exportpdf'
    ],
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography uploadcare | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
    uploadcare_public_key: '10e8044b08f0e6ccb529',
  });
</script>








<script>
    var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00000';
},
spOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
};



$('#uf').select2({
    placeholder: "Selecione",
});

$('#genero').select2({
    placeholder: "Selecione",
});


$('#rg').mask('00.000.000-0');
$('#cep').mask('00000-000');
$('#telefone_celular').mask('(00) 00000-0000');
$('#telefone_fixo').mask(SPMaskBehavior, spOptions);

$('#cep').on('input', function(){

    var cep     = $(this).val(),
        digitos = cep.length;

    if(digitos === 9){

        $('.fa-spinner').show();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            url : "{{ url('getCep') }}",
            data : {'cep': cep},
            type : 'POST',
            dataType : 'json',
            success : function(result){

                $('.fa-spinner').hide();

                if(result.msg === '1'){

                    $('#cidade').val(result.cidade);
                    $('#bairro').val(result.bairro);
                    $('#uf').val(result.uf).select2();
                    $('#logradouro').val(result.rua);

                    setTimeout(function(){
                        $('.floatlabel').trigger('change');
                    }, 150)

                } else if(result.msg === '3'){

                    $.message('CEP enválido, por favor verifique o número informado', 2);

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
        //nome:"required",
        //cpf:"required",
        //cnh:"required",
        //data_nascimento:"required",
        // nacionalidade:"required",
        // estado_civil:"required",
        // reservista:"required",
        // possui_filhos:"required",
        // sexo:"required",
        // pcd:"required",
        // cep:"required",
        // logradouro:"required",
        // numero:"required",
        // escolaridade:"required",
        // complemento:"required",
        // bairro:"required",
        // cidade:"required",
        // uf:"required",
        // email:"required",
        // telefone_celular:"required",
        // telefone_residencial:"required",
        // nome_contato:"required",
        // foi_jovem_aprendiz:"required",
        //informatica:"required",
        //ingles:"required",
        //cras:"required",
        //fonte:"required"        
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



</script>
@endpush


@push('css-custom')
<style>



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

    </style>
@endpush