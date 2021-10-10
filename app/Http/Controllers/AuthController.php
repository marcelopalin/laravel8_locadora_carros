<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {

        $credenciais = $request->all(['email', 'password']); //[]

        //autenticação (email e senha)
        $token = auth('api')->attempt($credenciais);
        // dd($token);

        if($token) { //usuário autenticado com sucesso

            // Para o curso
            return response()->json(['token' => $token]);

            // Segundo a Documentação ele retorna este Token
            // Porém não funcionou,
            // return $this->respondWithToken($token);

        } else { //erro de usuário ou senha
            return response()->json(['erro' => 'Usuário ou senha inválido!'], 403);

            //401 = Unauthorized -> não autorizado
            //403 = forbidden -> proibido (login inválido)
        }
    }

    public function logout() {
        return 'logout';
    }

    public function refresh() {
        return 'refresh';
    }

    public function me() {
        return 'me';
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
