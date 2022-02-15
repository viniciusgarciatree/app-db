@extends('layouts.layout')

@push('css')
<style>
 scroll-data-base {
  background-color: lightblue;
  width: 110px;
  height: 110px;
  overflow: scroll;
}
</style>
@endpush

@section('content')

<div class="row">
    <p class="text-secondary m-1 ms-2 col-12"> Tools > Compare data bases </p>
</div>

<div class="row m-1">
    <div class="col-3">
        <div class="row">
            <select class="form-select" id="basePrincipal" aria-label="Selecione a base principal de comparação:">
                <option value="-1" selected>Selecione uma base de dados com principio de compração:</option>
                @foreach ($objDataBases as $dataBase)
                    <option value="{{ $dataBase->id }}">{{ $dataBase->descricao }}: {{ $dataBase->base }}</option>    
                @endforeach
            </select>
        </div>
        <div class="row">
            <h5>Selecione as bases que devem ser compradas com principal:</h5>
            <ul class="list-group scroll-data-base m-0">
                    <li class="list-group-item d-flex m-0 p-0 p-2">
                        <div class="form-check m-0 ms-1">
                            <input class="form-check-input" id="todasBases" name="nomeDataBase" type="checkbox" value="-1">
                            <label class="form-check-label" for="nomeDataBase">
                                Todas as bases
                            </label>
                        </div>
                    </li>
                @foreach ($objDataBases as $dataBase)
                    <li class="list-group-item d-flex m-0 p-0 p-2">
                        <div class="form-check m-0 ms-1">
                            <input class="form-check-input databases" id="dbCompare-{{ $dataBase->id }}" type="checkbox" value="{{ $dataBase->id }}">
                            <label class="form-check-label" for="nomeDataBase">
                            {{ $dataBase->descricao }}: {{ $dataBase->base }}
                            </label>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-9">
        <button type="submit" class="btn btn-outline-success btn-sm" id="comparar"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Comparar"
                    > Comparar</button>
        <div class="m-2">
            <label class="ms-1">Log:</label>  
            <textarea class="form-control" placeholder="Log" style="height: 300px" readonly></textarea>
            
        </div>
    </div>
</div>



@endsection

@push('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {

            var basePrincipalSelect;

            /**
            * Ativa a base na seleção de compração quando não mais selecionada como principal
            */
            function enableOldBasePrincipalInArrCompare(id){
                $('#dbCompare-' + id + '').parent().parent().removeClass('text-secondary');
                $('#dbCompare-' + id + '').attr("disabled", false);
            }

            /**
             * Desativa a base na seleção de compração quando selecionada como principal.
             */
            function disabledPrincipalInArrCompare(id){
                $('#dbCompare-' + id + '').parent().parent().addClass('text-secondary');
                $('#dbCompare-' + id + '').attr("disabled", true);
                $('#dbCompare-' + id + '').prop( "checked", false ); // Uncheck
            }

            /** 
            * Dispara ação para exibir ou esconder base selecionada como principio de comparação,
            * na listagem de base de comparação
            */
            $("#basePrincipal").change(function(e){
                enableOldBasePrincipalInArrCompare(basePrincipalSelect);
                disabledPrincipalInArrCompare($(this).val());
                basePrincipalSelect = $(this).val();
            });

            /**
            * Marca todas as base de dados
            */
            $("#todasBases").change( function(e){
                if($(this).is(':checked')){
                    $('.databases').prop( "checked", true ); // checked
                }else{
                    $('.databases').prop( "checked", false ); // Uncheck
                }
                $('#dbCompare-' + $("#basePrincipal").val() + '').prop( "checked", false );
            });

            /**
             * Envia dados para inicar a comparar base de dados.
             */
            $("#comparar").on('click', function(e){
                var basePrincipalSelecionada = parseInt($("#basePrincipal").val()) > 0;
                var baseDeComparacaoSelecionadas = $('.databases').is(':checked');
                
                if(!(basePrincipalSelecionada && baseDeComparacaoSelecionadas)){
                    if(!basePrincipalSelecionada){
                        alert("Seleciona uma base como principal!");
                    }

                    if(!baseDeComparacaoSelecionadas){
                        alert("Seleciona ao menos uma base para comprar!");
                    }
                }

                var idBasePrincipal = $("#basePrincipal").val();
                var idBasesSelecionadas = [];
                $.each($('.databases:checkbox:checked'), function(index, value) {
                    idBasesSelecionadas.push($(value).val());
                });
                
                console.log("Ids capiturados agora fazer o envia via para o servidor inciar a comparação.")
            });
        });
    </script>
@endpush