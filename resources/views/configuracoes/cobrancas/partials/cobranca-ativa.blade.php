<p class="card-text">
    <strong style="font-size: 14px;">Descrição:</strong><br>
    {{ $cobrancaAtual->cobranca_descricao }}
</p>
<div class="row">
    <div class="col-md-2">
        <p class="card-text">
            <strong style="font-size: 14px;">Data da Ativação:</strong><br>
            {{ \Carbon\Carbon::parse($cobrancaAtual->created_at)->format('d/m/Y') }}
        </p>
    </div>
    <div class="col-md-2">
        <p class="card-text"><strong style="font-size: 14px;">Valor
                Mínimo:</strong><br>R$ {{ number_format($cobrancaAtual->cobranca_valor, 2, ',', '.') }}
        </p>
    </div>
    <div class="col-md-2">
        <p class="card-text"><strong style="font-size: 14px;">Permanência
                Mínima:</strong><br>{{ $cobrancaAtual->cobranca_perm_minima }}</p>
    </div>
    <div class="col-md-2">
        <p class="card-text"><strong style="font-size: 14px;">Valor Diário
                Adicional:</strong><br>R$ {{ number_format($cobrancaAtual->cobranca_vlr_adicional, 2, ',', '.') }}
        </p>
    </div>
</div>
<div class="d-flex justify-content-end">
    <button type="button"
            class="btn-custom"
            data-toggle="modal"
            data-target="#modal-create">
        Nova Cobrança
    </button>
    <button type="button"
            class="btn-custom"
            data-toggle="modal"
            data-target="#modal-add-tipo-cobranca">
        Adicionar Tipo de Cobrança
    </button>
</div>