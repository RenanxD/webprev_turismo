<div class="form-step text-center">
    <h4 class="mb-4" style="text-align: left; display: inline-block;">
        <span style="font-weight: 400;">Informe o<br>
            <strong>prazo de permanência</strong>
            <small class="required-message taxa-message show mt-3" id="termosRequiredMessage">
                Taxa mínima de R${{ $cobrancaAtual->cobranca_valor ?? '' }}. Válida por {{ $cobrancaAtual->cobranca_perm_minima ?? '' }} dias.
            </small>
        </span>
    </h4>

    <div class="form-row justify-content-center text-start">
        <div class="form-group col-md-4 position-relative">
            <label for="data_inicial">Data Inicial</label>
            <input type="text"
                   class="form-control"
                   id="data_inicial"
                   name="data_inicial"
                   data-min-days="{{ $cobrancaAtual->cobranca_perm_minima ?? '' }}"
                   placeholder="Data Inicial"
                   onchange="handleDateChange()"
                   required>
        </div>
    </div>

    <div class="form-row justify-content-center text-start">
        <div class="form-group col-md-4 position-relative">
            <label for="data_final">Data Final</label>
            <input type="text"
                   class="form-control"
                   id="data_final"
                   name="data_final"
                   placeholder="Data Final"
                   onchange="calcularDias()"
                   required>
        </div>
    </div>

    <p class="mt-3"><strong>Alto Paraíso De Goiás</strong><br>possui taxa de conservação ambiental</p>

    <div class="mt-3 mb-4" id="diasInfo" style="display: none; font-size: 19px;">
        <span id="dias_selecionados" style="color: #4a90e2; font-weight: bold;"></span>
        <span style="color: #4a90e2; font-weight: bold;">dias</span> de permanência <br>Valor da taxa: <span id="valorTaxa" style="color: #4a90e2; font-weight: bold;">R${{ $cobrancaAtual->cobranca_valor ?? '' }}</span>
        <input type="hidden" name="valor_taxa" value="{{ $cobrancaAtual->cobranca_valor ?? '' }}">
    </div>

    <div class="form-check text-center">
        <input class="form-check-input"
               type="checkbox"
               id="termos">
        <label class="form-check-label" for="termos" style="color: #000000;">
            Aceito todos os <a href="#" class="text-decoration-underline">termos de taxa</a>
        </label>
    </div>

    <div class="d-flex justify-content-between mt-4">
        <button type="button" class="btn btn-outline-secondary flex-fill mr-2"
                onclick="prevStep()">Voltar
        </button>
        <button type="button" class="btn btn-primary flex-fill" onclick="nextStep()">Próximo
        </button>
    </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<script>
    window.onload = function() {
        var today = new Date();
        var day = ("0" + today.getDate()).slice(-2);
        var month = ("0" + (today.getMonth() + 1)).slice(-2);
        var year = today.getFullYear();
        var currentDate = year + "-" + month + "-" + day;

        document.getElementById('data_inicial').setAttribute('min', currentDate);
        document.getElementById('data_final').setAttribute('min', currentDate);

        var datasComprovantes = @json($datasComprovantes);

        var datasBloqueadas = datasComprovantes.map(function(item) {
            return {
                from: item.inicio,
                to: item.fim
            };
        });

        // Inicializa os campos de data com o calendário Bootstrap
        $('#data_inicial').datepicker({
            format: 'yyyy-mm-dd',
            startDate: currentDate,
            beforeShowDay: function(date) {
                var dateString = date.toISOString().split('T')[0]; // Formata a data para o formato YYYY-MM-DD
                for (var i = 0; i < datasBloqueadas.length; i++) {
                    if (dateString >= datasBloqueadas[i].from && dateString <= datasBloqueadas[i].to) {
                        return { classes: 'disabled', tooltip: 'Data bloqueada' };
                    }
                }
                return true;
            },
            onChangeDate: function() {
                handleDateChange();
            }
        });

        $('#data_final').datepicker({
            format: 'yyyy-mm-dd',
            startDate: currentDate,
            beforeShowDay: function(date) {
                var dateString = date.toISOString().split('T')[0]; // Formata a data para o formato YYYY-MM-DD
                for (var i = 0; i < datasBloqueadas.length; i++) {
                    if (dateString >= datasBloqueadas[i].from && dateString <= datasBloqueadas[i].to) {
                        return { classes: 'disabled', tooltip: 'Data bloqueada' };
                    }
                }
                return true;
            },
            onChangeDate: function() {
                calcularDias();
            }
        });

        // Inicializa a data mínima para o campo de data final após a carga da página
        setMinFinalDate();
    }

    function setMinFinalDate() {
        var minDays = document.getElementById('data_inicial').dataset.minDays;
        var dataInicial = document.getElementById('data_inicial').value;

        if (dataInicial) {
            var initialDate = new Date(dataInicial);
            initialDate.setDate(initialDate.getDate() + parseInt(minDays));

            var day = ("0" + initialDate.getDate()).slice(-2);
            var month = ("0" + (initialDate.getMonth() + 1)).slice(-2);
            var year = initialDate.getFullYear();
            var minFinalDate = year + "-" + month + "-" + day;

            $('#data_final').datepicker('setStartDate', minFinalDate);
        }
    }

    function calcularDias() {
        const dataInicial = document.getElementById('data_inicial').value;
        const dataFinal = document.getElementById('data_final').value;

        if (dataInicial && dataFinal) {
            const date1 = new Date(dataInicial);
            const date2 = new Date(dataFinal);
            const diffTime = Math.abs(date2 - date1);
            let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

            diffDays += 1;

            document.getElementById('dias_selecionados').innerText = diffDays;
            document.getElementById('diasInfo').style.display = 'block';
        } else {
            document.getElementById('diasInfo').style.display = 'none';
        }
    }

    function handleDateChange() {
        setMinFinalDate();
        calcularDias();
    }
</script>
<style>
    .datepicker.datepicker-dropdown.dropdown-menu.datepicker-orient-left.datepicker-orient-bottom {
        top: 361px !important;
    }

    .datepicker.datepicker-dropdown.dropdown-menu.datepicker-orient-left.datepicker-orient-top {
        top: 98px !important;
    }

    /* Estilo geral para o calendário */
    .datepicker {
        background-color: #f8f9fa; /* Cor de fundo */
        border: 1px solid #ccc; /* Borda */
        border-radius: 5px; /* Bordas arredondadas */
    }

    /* Estilo para o dropdown do calendário */
    .datepicker-dropdown {
        border: 1px solid #007bff; /* Borda do dropdown */
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.2); /* Sombra do dropdown */
    }

    /* Estilo para o painel de dias */
    .datepicker-days {
        background-color: #ffffff; /* Cor de fundo dos dias */
        padding: 10px;
    }

    /* Estilo para as células de dias */
    .datepicker-days td {
        font-size: 14px; /* Tamanho da fonte */
        padding: 8px; /* Padding das células */
        cursor: pointer;
    }

    /* Estilo para as células de datas desabilitadas */
    .datepicker-days .disabled {
        background-color: #f1f1f1; /* Cor de fundo para datas desabilitadas */
        color: #ccc; /* Cor do texto */
        pointer-events: none; /* Impede interação */
    }

    /* Estilo para a célula de data ativa */
    .datepicker-days .active {
        background-color: #007bff; /* Cor de fundo para a data ativa */
        color: white; /* Cor do texto para a data ativa */
        border-radius: 50%; /* Bordas arredondadas */
    }

    /* Estilo para os dias da semana (ex.: dom, seg, ter, etc.) */
    .datepicker-days th {
        font-weight: bold;
        color: #007bff;
    }

    /* Estilo para o cabeçalho do calendário (mês, ano) */
    .datepicker-header {
        background-color: #007bff;
        color: white;
        text-align: center;
        padding: 5px 0;
    }

    /* Estilo para o botão de navegação do mês (próximo e anterior) */
    .datepicker .prev, .datepicker .next {
        background-color: #007bff;
        color: white;
        border: none;
        font-size: 16px;
        cursor: pointer;
    }

    /* Estilo para os dias do mês (domingo, segunda-feira, etc.) */
    .datepicker-days th {
        text-align: center;
        font-weight: bold;
        color: #007bff;
    }

    #data_inicial {
        text-align: center;  /* Centraliza o conteúdo do input */
    }

    #data_final {
        text-align: center;  /* Centraliza o conteúdo do input */
    }
</style>
