<?php

namespace App\Http\Controllers\Turista;

use App\Models\Cidade;
use App\Models\Comprovante\ComprovanteTaxa;
use App\Models\Turista\Turista;
use Illuminate\Support\Facades\Session;

class AcessarComprovante
{
    public function acessarComprovante($slug)
    {
        $email = session('email');
        $comprovantes = collect();
        $turista = Turista::where('turista_email', $email)->first();
        $cidade = Cidade::where('slug', $slug)->first();
        $token = Session::get('auth_token');

        if ($turista) {
            $comprovantes = ComprovanteTaxa::where('id_turista', $turista->id_turista)
                ->orderBy('comprovante_data_emissao', 'desc')
                ->paginate(4);
        }

        return view('turista.acessar-comprovante', compact('email', 'cidade', 'comprovantes', 'token'));
    }
}
