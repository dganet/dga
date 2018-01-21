<?php
namespace Api\Controller;
use PDO, Exception;
use \Api\Model\Entity\Usuario,
\Api\Model\Entity\CarteiraImovel,
\Api\Model\Entity\CarteiraCliente;

class UsuarioController {
    /**
     * Lista todos os Usuarios
     * 
     * @param Request $request
     * @param Response $response
     * @param Array $args
     * @return mixedJson
     */
    public function list($request,$response,$args){
        $usuario = new Usuario();
        $collection = $usuario->makeSelect()->execute();
        if ($collection != null){
			if($collection->length() > 0){
				return $response->WithJson($collection->getAll());
			}
		}
    }
    /**
     * Lista usuarios por id
     * 
     * @param Request $request
     * @param Response $response
     * @param Array $args
     * @return mixedJson
     */
    public function listById($request,$response,$args){
        $usuario = Usuario::getInstance();
        $usuario->setPrimaryKey('idUsuario');
        $usuario->find($args['id']);
        return $response->withJson($usuario);
    }
    /**
     * Salva um Usuario e cria sua agenda de telefones
     * 
     * @param Request $request
     * @param Response $response
     * @param Array $args
     * @return mixedJson
     */
    public function save($request, $response, $args){
        $post = json_decode($request->getBody(), true);
        $usuario = Usuario::getInstance();
        //Pequena correção de nomeclatura
        $post['senhaUsuario'] = $post['senha'];
        unset($post['termoUsuario']);
        unset($post['senha']);
        //-------
        $usuario->load($post);
        $usuario->statusUsuario = 'AGUARDANDOCONFIRMACAOEMAIL';
        $usuario->senhaUsuario = md5($usuario->senhaUsuario);
        $usuario->save();
        try{
            $mail = new MailController();
            $body ="
            Olá Sr ".$user."<br>
            O seu cadastro está quase completo, para confirmar o seu email precisamos que clique no link abaixo<br> 
                <a href='http://localhost/App/usuario/confirm/".$usuario->creci."'> CLIQUE AQUI PARA CONFIRMAR SEU EMAIL!</a>
            ";
            $mail->makeEmail($usuario->emailUsuario, $usuario->nomeUsuario.' '.$usuario->sobrenomeUsuario, 'Cadastro Imobiliar', $body);
            $mail->send();
            
        }catch(Exception $e){
            switch ($e->getCode()) {
                case 23000:
                    return $response->WithJson(['message' => 'Este e-mail ou Creci já está cadastrado', 'flag' => false]);
                    break;
                default:
                    return $response->WithJson(['message' => 'Ocorreu algum problema ao salvar a informação, tente novamente mais tarde', 'flag' => false]);
                    break;
            }
        }
    }
    /**
     * Atualiza as informações de um usuário já existente
     * 
     * @param Request $request
     * @param Response $response
     * @param Array $args
     * @return mixedJson
     */
    public function update($request, $response, $args){
        $user = Auth::_getTokenInfo($args['token']);
        $post = json_decode($request->getbody());
        $usuario = Usuario::getInstance();
        $usuario->load($post);
        $usuario->idUsuario = $user['conteudo']['idUsuario'];
        $usuario->setPrimaryKey('idUsuario');
        if ($usuario->update()){
            return $response->withJson(['message' => 'Usuario atualizado com sucesso!', flag => true]);
        }else{
            return $response->withJson(['message' => 'Ocorreu um problema na atualização do usuario', flag => false]);
        }
    }
    /**
     * Inativa um usuario
     * 
     * @param Request $request
     * @param Response $response
     * @param Array $args
     * @return mixedJson
     */
    public function delete($request, $response, $args){
        $id = $args['id'];
        $usuario = Usuario::getInstance();
        $usuario->idUsuario = $id;
        $usuario->status = 'INATIVO';
        if($usuario->update()){
            return $response->withJson(['message' => 'Usuario removido com sucesso!', flag => true]);
        }else{
            return $response->withJson(['message' => 'Ocorreu um problema na remoção do usuario', flag => false]);
        }   
    }
    /**
     * Metodo para verificação de email apos o cadastro
     * 
     * @param Request $request
     * @param Response $response
     * @param Array $args
     * @return mixedJson
     */
    public function confirm($request, $response, $args){
      $usuario = Usuario::getInstance();
      $usuario = $usuario->makeSelect()->where('creciUsuario='.$args['creci'])->execute()->get(0);
      $usuario->statusUsuario = 'ATIVO';
      if ($usuario->update()){
          return $response->withJson([
            'message' => 'Usuario Confirmado com sucesso!',
            'flag'  => true
          ]);
      }else{
          return $response->withJson([
              'message' => 'Não foi possivel confirmar seu email, procure um administrador para ajudar com o problema',
              'flag' => false
          ]);
      }
    }
    /**
     * Checa se existe algum usuario com o email informado
     * 
     * @param String $email
     * @return Object
     */
    public static function forgot($email){
        $usuario = Usuario::getInstance();
        $usuario->makeSelect()->where("emailUsuario = '".$email."'");
        $collection = $usuario->execute()->get(0);
        return $collection;
    }
    /**
     * Verifica se o usuairo possui no conta vinculada com facebook
     * 
     * @param [type] $post
     * @return void
     */
    public static function checkFaceLogin($post){
        $usuario = Usuario::getInstance();
        $cache = new Cache();
       
        $usuario->makeSelect()->where("idFacebook='".$post['userID']."'");
        try{    
        $usuario = $usuario->execute()->get(0);
        }catch(\GORM\Collection\ECollectionKeyInvalid $e){
            return 
            [
                'flag' => false,
                'message' => 'Usuario não possui cadastro vinculado ao facebook ou não possui nenhum cadastro no sistema',
                'test' => $usuario->emailUsuario
            ];
        }

        if (is_null($usuario->emailUsuario)){
            //então o cara não tem cadastro vinculado com facebook.
            return 
            [
                'flag' => false,
                'message' => 'Usuario não possui cadastro vinculado ao facebook ou não possui nenhum cadastro no sistema',
                'test' => $usuario->emailUsuario
            ];
        }else{
            if(is_null($usuario->idFacebook)){
                // Caso o usuario não possua o facebook ID e tenha o email do facebook igual
                // ao email cadastrado no imobiliar, então, ele vincula as duas informações de forma automatica
                $usuario->idFacebook = $post['userID'];
                $usuario->update();
                return 
                [
                    'flag' => true,
                    'message ' => 'Email do usuario já cadastrado no Imobiliar, anexando facebook a sua conta cadastrada',
                ];
            }else{
                $arr = $usuario->toArray();
                $cache->save($post['accessToken'], $arr);
                return $arr;    
            }
        }
    }
    /**
     * Metodo para vincular as informações do usuario com as informações do facebook do mesmo.
     * 
     * @param Request $request
     * @param Response $response
     * @param Array $args
     * @return mixedJson
     */
    public function migrate($request, $response, $args){
        $post = json_decode($request->getBody(), true);
        $usuario = Usuario::getInstance();
        $usuario->_setDebug(false);
        $usuario->makeSelect("where emailUsuario='".$post['emailUsuario']."' AND senhaUsuario='".md5($post['senhaUsuario'])."'");
        if (is_null($usuario->emailUsuario)){
            return $response->withJson(
            [
                'flag' => false,
                'message' => 'Email e senha não correspondem com nenhuma informação do banco de dados'
                
            ]);
        }else{
            $usuario->idFacebook = $post['idFacebook'];
            $usuario->update();
            return $response->withJson(
            [
                'flag' => true,
                'message' => 'Email vinculado a sua conta do facebook',
            ]);
        }
    }
    
}