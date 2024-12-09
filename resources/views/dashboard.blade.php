@extends('templates.template')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="quadros-container">
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <img src="{{ asset('images/turista-logo.png') }}" alt="Logo Turista" style="width: 3.5rem; height: 3.5rem">
                            <span class="quadro-titulo">
                                Turistas
                            </span>
                            <span class="quadro-subtitulo">Controle detalhado dos turistas</span>
                        </a>
                    </div>
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <img src="{{ asset('images/logo-prestadores.png') }}" alt="Logo Prestadores" style="width: 3.5rem; height: 3.5rem">
                            <span class="quadro-titulo">Prestadores</span>
                            <span class="quadro-subtitulo">Informações e Configurações</span>
                        </a>
                    </div>
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <img src="{{ asset('images/logo-usuarios.png') }}" alt="Logo Usuarios" style="width: 3.5rem; height: 3.5rem">
                            <span class="quadro-titulo">Usuários</span>
                            <span class="quadro-subtitulo">Gerenciamento dos colaboradores</span>
                        </a>
                    </div>
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <img src="{{ asset('images/logo-isencao.png') }}" alt="Logo Isencao" style="width: 3.5rem; height: 3.5rem">
                            <span class="quadro-titulo">Isenções</span>
                            <span class="quadro-subtitulo">Gerenciamento dos beneficiários</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="quadros-container">
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <img src="{{ asset('images/logo-atividades.png') }}" alt="Logo Atividades" style="width: 3.5rem; height: 3.5rem">
                            <span class="quadro-titulo">Atividades</span>
                            <span class="quadro-subtitulo">Informações sobre as atividades</span>
                        </a>
                    </div>
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <img src="{{ asset('images/logo-comprovantes-emitidos.png') }}" alt="Logo Comprovantes Emitidos" style="width: 3.5rem; height: 3.5rem">
                            <span class="quadro-titulo">Comprovantes Emitidos</span>
                            <span class="quadro-subtitulo">Informações sobre as taxas geradas</span>
                        </a>
                    </div>
                    <div class="quadro-item">
                        <a href="{{ route('configuracoes.index') }}" class="quadro">
                            <img src="{{ asset('images/logo-configuracoes.png') }}" alt="Logo Configuracoes" style="width: 3.5rem; height: 3.5rem">
                            <span class="quadro-titulo">Configurações</span>
                            <span class="quadro-subtitulo">Gerenciamento das funcionalidades</span>
                        </a>
                    </div>
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <img src="{{ asset('images/logo-validacoes.png') }}" alt="Logo Validacoes" style="width: 3.5rem; height: 3.5rem">
                            <span class="quadro-titulo">Validações</span>
                            <span class="quadro-subtitulo">Lista de validações dos prestadores</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="quadros-container">
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <img src="{{ asset('images/logo-pagamentos.png') }}" alt="Logo Pagamentos" style="width: 3.5rem; height: 3.5rem">
                            <span class="quadro-titulo">Pagamentos</span>
                            <span class="quadro-subtitulo">Lista de pagamentos e pedidos de extorno</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
