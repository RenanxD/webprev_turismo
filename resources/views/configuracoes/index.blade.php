@extends('templates.template')
@section('title', 'WebPrev - Configurações')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white min-h-screen overflow-hidden sm:rounded-lg p-6">
                <div class="quadros-container">
                    <x-botao-voltar>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/logo-configuracoes.png') }}" alt="Logo Configuracoes" style="width: 2.5rem; height: 2.5rem">
                            <span class="ml-3">Configurações</span>
                        </div>
                    </x-botao-voltar>
                    <div data-orientation="horizontal" role="none" class="shrink-0 h-[1px] w-full min-w-full" style="background-color: #e5e7eb;"></div>
                    <div class="quadro-item">
                        <a href="{{ route('cobrancas.index') }}" class="quadro">
                            <img src="{{ asset('images/logo-usuarios.png') }}" alt="Logo Usuarios" style="width: 3.5rem; height: 3.5rem">
                            <span class="quadro-titulo">Usuários</span>
                            <span class="quadro-subtitulo">Gerencie as funcionalidades dos usuários</span>
                        </a>
                    </div>
                    <div class="quadro-item">
                        <a href="{{ route('cobrancas.index') }}" class="quadro">
                            <img src="{{ asset('images/logo-pagamentos.png') }}" alt="Logo Pagamentos" style="width: 3.5rem; height: 3.5rem">
                            <span class="quadro-titulo">Valores e Cobranças</span>
                            <span class="quadro-subtitulo">Gerenciamento dos valores e cobranças</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
