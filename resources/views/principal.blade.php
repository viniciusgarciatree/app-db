@extends('layouts.layout')

@section('content')




<div class="row">
    <div class="col">
        <button id="addUser" class="btn btn-outline-success btn-sm col-12">Add User</button>        
    </div>
    <div class="col-6">
        <div class="input-group input-group-sm ">
            <input type="text" id="usuarios" name="usuario" value="" class="js-example-responsive form-control form-control-sm" multiple="multiple" placeholder="Usuário:">
        </div>
    </div>
    <div class="col-1">
            <button id="executar" class="btn btn-outline-info btn-sm col-12">Executar</button>
    </div>
    <div class="col-2">
        <a href="#" id="limpar" class="btn btn-outline-danger btn-sm col-12">Clear Query</a>        
    </div>
</div>

<div class="row g-2 pt-2 ps-1 pe-1">
    <div class="form-floating">
    <textarea class="form-control" placeholder="Query" id="query"  rows='12' style="height:100%;"></textarea>
    <label for="query">Query:</label>
    </div>
</div>


<div class="row g-2 pt-2 ps-1 pe-1">
    <div class="form-floating">
    <textarea class="form-control" placeholder="result" id="result" disabled rows='8' style="height:100%;"></textarea>
    <label for="result">Result:</label>
    </div>
</div>


<div class="row g-2 pt-2 ps-1 pe-1">
    <div class="form-floating">
    <textarea class="form-control" placeholder="Log:" id="log" disabled rows='5' style="height:100%;"></textarea>
    <label for="result">Log:</label>
    </div>
</div>


<div class="row g-2 pt-2 ps-1 pe-1">
    <div class="col-md">
            <input type="text" name="conection_name" value="" class="form-control form-control-sm" placeholder="Conection name:">
    </div>

    <div class="col-md">
            <input type="text" name="host_name" value="" class="form-control form-control-sm" placeholder="Host name:">
    </div>

    <div class="col-md">
            <input type="text" name="user_name" value="" class="form-control form-control-sm" placeholder="User name:">
    </div>

    <div class="col-md">
            <input type="text" name="password" value="" class="form-control form-control-sm" placeholder="Password:">
    </div>

    <div class="col-md">
            <input type="text" name="default_schema" value="" class="form-control form-control-sm" placeholder="Default schema:">
    </div>
    <div class="col-1">
            <button id="testConectio" class="btn btn-outline-info btn-sm col-12">Conection</d>
        
    </div>
    <div class="col-1">
        <button type="submit" id="salvar" class="btn btn-outline-success btn-sm col-12">Salvar</button>
    </div>
    <div class="col-1">

            <a href="#" id="cancelar" class="btn btn-outline-danger btn-sm col-12">Cancelar</a>
    
    </div>
</div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#testConectio").click(function(e){
                e.preventDefault();

                var _token = $("input[name='_token']").val();
                var conection_name= $("input[name=conection_name]").val();
                var host_name = $("input[name=host_name]").val();
                var user_name = $("input[name=user_name]").val();
                var password = $("input[name=password]").val();
                var default_schema = $("input[name=default_schema]").val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('test.conection') }}",
                        type:'GET',
                        data: {
                            _token:_token, 
                            conection_name:conection_name,
                            host_name:host_name,
                            user_name:user_name,
                            password:password,
                            default_schema:default_schema
                        },
                        success: function(data) {
                            console.log(data);
                        }
                    });
            });

            $('#usuario').select2({
                theme: 'bootstrap4',
                placeholder: 'Selecione usuário:'
                /*
                ajax: {
    url: 'https://api.github.com/orgs/select2/repos',
    data: function (params) {
      var query = {
        search: params.term,
        type: 'public'
      }

      // Query parameters will be ?search=[term]&type=public
      return query;
    }
  }
                */
            });
        });
        
    </script>
@endpush