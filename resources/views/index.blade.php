<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
</head>

<body>

    <div class="container mt-3">

        <form>
            <div class="row">
                <div class="col-md-3">
                    <x-select2-dropdown name="estado" label="Estado" behaviour="select2" url="/api/estados"
                         updates="cidade" placeholder="Selecione uma opção" />
                </div>
                <div class="col-md-3">
                    <x-select2-dropdown name="cidade" label="Cidade" behaviour="select2" url="/api/cidades"
                         updates="bairro" auxIdSelector="#estado" placeholder="Selecione uma opção" />
                </div>
                <div class="col-md-3">
                    <x-select2-dropdown name="bairro" label="Bairro" behaviour="select2" url="/api/bairros"
                        auxIdSelector="#cidade" placeholder="Selecione uma opção" />
                </div>
            </div>
        </form>

    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>

    @stack('scripts')

    <script>
        $(document).ready(function() {

            $("form").validate({
                rules: {
                    estado: "required",
                    cidade: {
                        required: function(element) {
                            return $("select[name='estado']").val() != "";
                        }
                    },
                    bairro: {
                        required: function(element) {
                            return $("select[name='cidade']").val() != "";
                        }
                    }
                },
                messages: {
                    estado: "Por favor, selecione um estado",
                    cidade: "Por favor, selecione uma cidade",
                    bairro: "Por favor, selecione um bairro"
                }
            });

            $("select[name='cidade'], select[name='bairro']").prop("disabled", true);

            $("select[name='estado']").change(function() {
                $("select[name='cidade']").prop("disabled", !$(this).val());
            });

            $("select[name='cidade']").change(function() {
                $("select[name='bairro']").prop("disabled", !$(this).val());
            });



            if ($("select[name='estado']").val()) {
                $("select[name='cidade']").prop("disabled", false);
            }
        });
    </script>


</body>

</html>
