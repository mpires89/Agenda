<?php

namespace App\Http\Controllers\Agenda;

use App\Http\Controllers\Controller;
use App\Models\Contato;
use App\Models\Mensagem;
use App\Utils\MensagensUtils;
use Illuminate\Http\Request;

class ContatoController extends Controller
{

    /*
     * Insere novo contato.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function inserirContato(Request $request)
    {
        $this->validarContato($request);

        $contato = new Contato();
        $contato->fill($request->all());
        $contato->save();

        return response()->json([
            'message' => MensagensUtils::MEN004],
            201);

    }

    /*
     * Insere nova mensagem.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function inserirMensagem(Request $request)
    {
        $this->validarMensagem($request);

        $mensagem = new Mensagem();
        $mensagem->fill($request->all());
        $mensagem->save();

        return response()->json([
            'message' => MensagensUtils::MEN004],
            201);
    }

    /*
     * Altera mensagem já existente.
     *
     * @param  \Illuminate\Http\Request  $request, Integer $id
     * @return \Illuminate\Http\Response
     */
    public function alterarMensagem(Request $request, $id)
    {
        $mensagem = Mensagem::find($id);

        $this->validarMensagem($request);

        if(!$mensagem) {
            return response()->json([
                'message'   => MensagensUtils::MEN001,
            ], 404);
        }

        $mensagem->fill($request->all());
        $mensagem->update();

        return response()->json([
            'message' => MensagensUtils::MEN003],
            200);

    }

    /*
     * Exclui mensagem.
     *
     * @param  Integer $id
     * @return \Illuminate\Http\Response
     */
    public function excluirMensagem($id)
    {
        $mensagem = Mensagem::find($id);

        if(!$mensagem) {
            return response()->json([
                'message'   => MensagensUtils::MEN001,
            ], 404);
        }

        $mensagem->delete();
        return response()->json([
            'message'   => MensagensUtils::MEN002,
        ],200);
    }

    /*
    * Altera contato já existente.
    *
    * @param  \Illuminate\Http\Request  $request, Integer $id
    * @return \Illuminate\Http\Response
    */
    public function alterarContato(Request $request, $id)
    {
        $contato = Contato::find($id);

        $this->validarContato($request);

        if(!$contato) {
            return response()->json([
                'message'   => MensagensUtils::MEN001,
            ], 404);
        }

        $contato->fill($request->all());
        $contato->update();

        return response()->json([
            'message' => MensagensUtils::MEN003],
            200);

    }

    /*
     * Exclui contato e mensagens vinculadas.
     *
     * @param  Integer $id
     * @return \Illuminate\Http\Response
     */
    public function excluirContato($id)
    {
        $contato = Contato::find($id);

        if(!$contato) {
            return response()->json([
                'message'   => MensagensUtils::MEN001,
            ], 404);
        }

        $contato->delete();
        return response()->json([
            'message'   => MensagensUtils::MEN002,
        ],200);

    }

    /*
     * Busca todos os contatos.
     *
     * @param  null
     * @return Array<App\Models\Contato>
     */
    public function buscarTodosContatos()
    {
        $contato = Contato::all();
        return response()->json($contato,200);

    }

    /*
     * Busca todas as mensagens.
     *
     * @param  null
     * @return Array<App\Models\Mensagem>
     */
    public function buscarTodasMensagens()
    {
        $mensagem = Mensagem::all();
        return response()->json($mensagem,200);

    }

    /*
     * Busca mensagem através do id do contato.
     *
     * @param  Integer $idContato
     * @return Array<App\Models\Mensagem>
     */
    public function buscarMensagensPorContato($idContato)
    {
        $contato =  Contato::find($idContato);
        if($contato)
        {
            $mensagens = $contato->mensagens;
            return response()->json($mensagens,200);
        }
        return response()->json([
            'message'   => MensagensUtils::MEN001,
        ], 404);


    }

    /*
     * Valida campos do contato no formulário.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function validarContato(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'email' => 'required|email',
            'telefone' => 'required'
        ]);
    }

    /*
     * Valida campos da mensagem no formulário.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function validarMensagem(Request $request)
    {
        $validatedData = $request->validate([
            'contato_id' => 'required',
            'descricao' => 'required',
        ]);
    }

}
