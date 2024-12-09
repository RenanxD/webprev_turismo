<div class="modal" id="modalDependente" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar Dependente</h5>
                <button type="button" class="close" onclick="fecharModalDependente()" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="dependente_estrangeiro">Dependentes <strong>Estrangeiros?</strong></label><br>
                    <input type="radio" id="dependente_estrangeiro_nao" name="dependente_estrangeiro" value="nao"
                           checked>
                    <label for="dependente_estrangeiro_nao">Não</label>
                    <input type="radio" id="dependente_estrangeiro_sim" name="dependente_estrangeiro" value="sim">
                    <label for="dependente_estrangeiro_sim">Sim</label>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="dependente_cpf" name="dependente_cpf"
                               placeholder="CPF">
                    </div>
                    <div class="form-group col-md-6">
                        <select class="form-control" id="dependente_tipo" name="dependente_tipo">
                            <option value="">Tipo de dependentes</option>
                            <option value="Filhos">Filhos</option>
                            <option value="Enteado">Enteado</option>
                            <option value="Irmãos, Netos ou Bisnetos">Irmãos, Netos ou Bisnetos</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="dependente_nome" name="dependente_nome"
                           placeholder="Nome Completo">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" id="dependente_celular" name="dependente_celular"
                               placeholder="Celular">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="date" class="form-control" id="dependente_data_nascimento"
                               name="dependente_data_nascimento" placeholder="Data de Aniversário">
                    </div>
                    <div class="form-group col-md-4">
                        <select class="form-control" id="dependente_sexo" name="dependente_sexo">
                            <option value="">Sexo</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <select class="form-control" id="dependente_tipo_sangue" name="dependente_tipo_sangue">
                            <option value="">Tipo Sanguíneo</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                </div>
                <div class="form-group mb-1">
                    <label for="dependente_necessidade_esp_opcao">Possui alguma <strong>necessidade especial?</strong></label><br/>
                    <input type="radio" id="dependente_necessidade_esp_nao" name="dependente_necessidade_esp_opcao" value="nao" checked/>
                    <label for="dependente_necessidade_esp_nao">Não</label>
                    <input type="radio" id="dependente_necessidade_esp_sim" name="dependente_necessidade_esp_opcao" value="sim"/>
                    <label for="dependente_necessidade_esp_sim">Sim</label>
                </div>
                <div class="form-group col-md-4" id="dependente-necessidade-especial-options" style="display: none; padding-left: 0;">
                    <select class="form-control" id="dependente_necessidade_esp" name="dependente_necessidade_esp">
                        <option value="">Selecionar</option>
                        <option value="Visual">Visual</option>
                        <option value="Motora">Motora</option>
                        <option value="Mental">Mental</option>
                        <option value="Auditiva">Auditiva</option>
                        <option value="Outra(s)">Outra(s)</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="fecharModalDependente()">Fechar</button>
                <button type="button" class="btn btn-primary" id="salvarEdicaoDependenteEdit" onclick="salvarDependente()">Salvar Dependente</button>
            </div>
        </div>
    </div>
</div>
<script>
    const dependenteEstrangeiroSim = document.getElementById('dependente_estrangeiro_sim');
    const dependenteEstrangeiroNao = document.getElementById('dependente_estrangeiro_nao');
    const dependenteInput = document.getElementById('dependente_cpf');

    function toggleDependenteInput() {
        if (dependenteEstrangeiroSim.checked) {
            dependenteInput.placeholder = 'Passaporte';
            dependenteInput.name = 'dependente_passaporte';
            dependenteInput.id = 'dependente_passaporte';
            dependenteInput.required = false;
        } else {
            dependenteInput.placeholder = 'CPF';
            dependenteInput.name = 'dependente_cpf';
            dependenteInput.id = 'dependente_cpf';
            dependenteInput.required = false;
        }
    }

    dependenteEstrangeiroSim.addEventListener('change', toggleDependenteInput);
    dependenteEstrangeiroNao.addEventListener('change', toggleDependenteInput);

    toggleDependenteInput();
</script>
<script>
    function salvarDependente() {
        const necessidadeEspecialSim = document.getElementById('dependente_necessidade_esp_sim');
        const necessidadeEspecialValor = document.getElementById('dependente_necessidade_esp').value;

        const dependente = {
            dependente_estrangeiro: dependenteEstrangeiroSim.checked ? 'sim' : 'nao',
            dependente_cpf: document.getElementById('dependente_cpf').value || null,
            dependente_passaporte: dependenteEstrangeiroSim.checked ? (document.getElementById('dependente_passaporte').value || null) : null,
            dependente_tipo: document.getElementById('dependente_tipo').value,
            dependente_nome: document.getElementById('dependente_nome').value,
            dependente_celular: document.getElementById('dependente_celular').value,
            dependente_data_nascimento: document.getElementById('dependente_data_nascimento').value,
            dependente_sexo: document.getElementById('dependente_sexo').value,
            dependente_tipo_sangue: document.getElementById('dependente_tipo_sangue').value,
            necessidadeEspecial: necessidadeEspecialSim.checked ? necessidadeEspecialValor : false
        };

        const dependentes = JSON.parse(localStorage.getItem('dependentes')) || [];
        dependentes.push(dependente);

        localStorage.setItem('dependentes', JSON.stringify(dependentes));

        fecharModalDependente();
        limparCampos();
        renderizarDependentes();
        renderDependentes();
    }

    function fecharModalDependente() {
        document.getElementById('modalDependente').style.display = 'none';
    }

    function limparCampos() {
        const fieldIds = [
            'dependente_cpf',
            'dependente_passaporte',
            'dependente_nome',
            'dependente_celular',
            'dependente_data_nascimento',
            'dependente_sexo',
            'dependente_tipo',
            'dependente_tipo_sangue'
        ];

        fieldIds.forEach(id => {
            const field = document.getElementById(id);
            if (field) {
                field.value = '';
            }
        });
    }

    function editarDependente(index) {
        const dependentes = JSON.parse(localStorage.getItem('dependentes'));
        const dependente = dependentes[index];

        const fieldMappings = {
            'dependente_nome': dependente.dependente_nome,
            'dependente_cpf': dependente.dependente_cpf,
            'dependente_passaporte': dependente.dependente_passaporte,
            'dependente_tipo': dependente.dependente_tipo,
            'dependente_celular': dependente.dependente_celular,
            'dependente_data_nascimento': dependente.dependente_data_nascimento,
            'dependente_sexo': dependente.dependente_sexo,
            'dependente_tipo_sangue': dependente.dependente_tipo_sangue
        };

        Object.keys(fieldMappings).forEach(id => {
            const field = document.getElementById(id);
            if (field) {
                field.value = fieldMappings[id] || '';
            }
        });

        const dependenteEstrangeiroSim = document.getElementById('dependenteEstrangeiroSim');
        const dependenteEstrangeiroNao = document.getElementById('dependenteEstrangeiroNao');

        if (dependenteEstrangeiroSim && dependenteEstrangeiroNao) {
            dependenteEstrangeiroSim.checked = dependente.dependente_estrangeiro === 'sim';
            dependenteEstrangeiroNao.checked = dependente.dependente_estrangeiro === 'nao';
        }

        toggleDependenteInput();

        const modalDependente = document.getElementById('modalDependente');
        if (modalDependente) {
            modalDependente.style.display = 'block';
        }

        const salvarButton = document.getElementById('salvarEdicaoDependenteEdit');
        if (salvarButton) {
            salvarButton.onclick = function() {
                salvarEdicaoDependente(index);
            };
        }
    }

    function salvarEdicaoDependente(index) {
        const dependentes = JSON.parse(localStorage.getItem('dependentes'));

        dependentes[index] = {
            dependente_estrangeiro: document.getElementById('dependenteEstrangeiroSim')?.checked ? 'sim' : 'nao',
            dependente_cpf: document.getElementById('dependente_cpf')?.value || null,
            dependente_passaporte: document.getElementById('dependente_passaporte')?.value || null,
            dependente_tipo: document.getElementById('dependente_tipo')?.value || '',
            dependente_nome: document.getElementById('dependente_nome')?.value || '',
            dependente_celular: document.getElementById('dependente_celular')?.value || '',
            dependente_data_nascimento: document.getElementById('dependente_data_nascimento')?.value || '',
            dependente_sexo: document.getElementById('dependente_sexo')?.value || '',
            dependente_tipo_sangue: document.getElementById('dependente_tipo_sangue')?.value || ''
        };

        localStorage.setItem('dependentes', JSON.stringify(dependentes));

        fecharModalDependente();
        limparCampos();
        renderizarDependentes();
        renderDependentes();
    }

    function excluirDependente(index) {
        const dependentes = JSON.parse(localStorage.getItem('dependentes'));
        dependentes.splice(index, 1);
        localStorage.setItem('dependentes', JSON.stringify(dependentes));

        renderizarDependentes();
        renderDependentes();
    }

    function renderizarDependentes() {
        const dependentes = JSON.parse(localStorage.getItem('dependentes')) || [];
        const listaElement = document.getElementById('listaDependentes');
        listaElement.innerHTML = '';

        dependentes.forEach((dependente, index) => {
            const dependenteElement = document.createElement('div');
            dependenteElement.style.display = 'flex';
            dependenteElement.style.justifyContent = 'space-between';
            dependenteElement.style.alignItems = 'center';
            dependenteElement.style.marginBottom = '10px';

            dependenteElement.innerHTML = `
            <div>
                <p><strong>${dependente.dependente_tipo}:</strong> ${dependente.dependente_nome}</p>
            </div>
            <div>
                <a class="btn btn-primary" style="color:white;" onclick="editarDependente(${index})">Editar</a>
                <a class="btn btn-danger" style="color:white;" onclick="excluirDependente(${index})">Excluir</a>
            </div>
        `;

            listaElement.appendChild(dependenteElement);
            const separador = document.createElement('hr');
            listaElement.appendChild(separador);
        });
    }

    document.addEventListener('DOMContentLoaded', renderizarDependentes);
</script>
<script>
    $(document).ready(function () {
        $('input[name="dependente_necessidade_esp_opcao"]').change(function () {
            if ($('#dependente_necessidade_esp_sim').is(':checked')) {
                $('#dependente-necessidade-especial-options').show();
            } else {
                $('#dependente-necessidade-especial-options').hide();
            }
        });
    });
</script>
<script src="{{ asset('js/turista/mascara-campos.js') }}"></script>
