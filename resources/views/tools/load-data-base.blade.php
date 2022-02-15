@extends('layouts.layout')

@section('content')

<div class="row">
<p class="text-secondary m-1 ms-2 col-12"> Tools > Load data bases </p>
</div>

<div class="row g-2 pt-2 ps-1 pe-1">
    <div class="col-3">
        <input type="text" name="host" value="" class="form-control form-control-sm" placeholder="Host Name:">
    </div>
    <div class="col-1">
        <input type="text" name="port" value="3306" class="form-control form-control-sm" placeholder="Porta:">
    </div>
    <div class="col-3">
            <input type="text" name="nome" value="" class="form-control form-control-sm" placeholder="Nome:">
        </div>
    <div class="col-3">
        <input type="text" name="senha" value="" class="form-control form-control-sm" placeholder="Senha:">
    </div>
    <div class="col-1">
        <div  class="btn btn-outline-success btn-sm" id="loadDataBases"
            data-bs-toggle="tooltip" data-bs-placement="top" 
            title="Load"> <i class="bi bi-arrow-clockwise"></i> Load bases</div>
    </div>
    <div class="col-1">
        <div  class="btn btn-outline-primary btn-sm" id="salvarBases"
            data-bs-toggle="tooltip" data-bs-placement="top" 
            title="Salvar"> <i class="bi bi-save"></i> Salvar</div>
    </div>
</div>

<div class="table-responsive-sm me-1 mt-2" data-bs-offset="1" tabindex="0">
<table class="table table-sm table-hover ms-1 mt-0 pt-0" id="contaTable">
    <thead>
    <tr>
        <th scope="col-1">#</th>
        <th scope="col-1">Salar</th>
        <th scope="col-5">Descrição</th>
        <th scope="col-5">Data Base</th>
    </tr>
    </thead>
    <tbody id="dataBaseTBory">    
  </tbody>
  </table>
</div>

<div class="modal fade modal-lg" aria-hidden="true" id="modalDescricao">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alterar descrição da base de dados</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <div class="modal-body">
            <form>
                <div class="row g-2 pt-2 ps-1 pe-1">
                    <div class="mb">
                        <label for="id-key" class="col-form-label">Base de dados:</label>
                        <input type="text" class="form-control" disabled id="modal-base-de-dados">
                    </div>
                </div>
                <div class="row g-2 pt-2 ps-1 pe-1">
                    <div class="mb">
                        <label for="id-key" class="col-form-label">Descrição:</label>
                        <input type="text" class="form-control" id="modal-descricao">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="salvar">Salvar</button>
        </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var idTable = "", base = "", descricao = "";
            var host = $("[name='host']");
            var port = $("[name='port']");
            var nome = $("[name='nome']");
            var senha = $("[name='senha']");

            $("#loadDataBases").click(function(e){
                $.ajax({
                    url: "{{ route('tools.load-data-base-load') }}",
                    data: { 
                        host: host.val(),
                        port: port.val(),
                        nome: nome.val(),
                        senha: senha.val(),
                    },
                    cache: false,
                    type: "POST",
                    success: function (data) {
                        var toBody = "";
                        $.each(data, function(index, value){
                            var key = index + 1;
                            toBody += '<tr>\
                                <td class="col-1">'+ key +'</td>\
                                <td class="col-1">\
                                    <div class="form-check">\
                                        <input class="form-check-input seleciona" name="id-' + key + '" checked type="checkbox" value="'+ key + '">\
                                        <label class="form-check-label" for="id-' + key + '">\
                                            Slavar\
                                        </label>\
                                    </div>\
                                </td>\
                                <td class="col-4 alterarDescricao" data-id="' + key + '" >' + value['base'] + '</td>\
                                <td class="col-4 base">' + value['base'] + '</td>\
                            </tr>';
                            
                        });
                        $("#dataBaseTBory").append(toBody);
                    },
                });
            });

            $("#contaTable > tbody").on('click', 'tr > .alterarDescricao', function(e){
                idTable = $(this).data('id');
                descricao = $(this).text();
                base = $(this).parent().find('.base').text();
                $("#modalDescricao").modal('show');
            });

            var exampleModal = document.getElementById('modalDescricao');
            exampleModal.addEventListener('show.bs.modal', function (event) {
                var modalBodyDescricao = exampleModal.querySelector('#modal-descricao');
                var modalBodyBase = exampleModal.querySelector('#modal-base-de-dados');

                modalBodyDescricao.value = descricao;
                modalBodyBase.value = base;
            });

            $("#salvar").click(function(e){
                $("#contaTable > tbody > tr > .alterarDescricao").each(function(index, value){
                    if($(value).data('id')== idTable){
                        $(value).text($('#modal-descricao').val());
                        $("#modalDescricao").modal('hide');
                    }
                });
            });

            $("#salvarBases").click(function(e){
                var bases = [];
                $("#contaTable > tbody > tr").each(function(index, value){
                    if($(value).find('input').is(':checked')){
                        item = {
                            'descricao': $(value).find('.alterarDescricao').text(),
                            'base': $(value).find('.base').text(),
                        };
                        bases.push(item);
                    }
                });
                
                $.ajax({
                    url: "{{ route('tools.load-data-base-save') }}",
                    data: { 
                        bases: bases,
                        host: host.val(),
                        port: port.val(),
                        nome: nome.val(),
                        senha: senha.val(),
                    },
                    cache: false,
                    type: "POST",
                    success: function (data) {
                        // execução em caso de sucesso
                    },
                });
            });
        });
    </script>
@endpush