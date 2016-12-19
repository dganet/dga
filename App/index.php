<?php
use \GORM\Model;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require_once "vendor/autoload.php";

class Usuario extends  Model {
	private $id;
	private $nome;

	/**
	*	@param $data array com as informações para criaçao do usuario
	*/
	public function __construct($data = []){
		isset($data['id'])		? $this->id = $data['id']		:	$this->id;
		isset($data['nome'])	? $this->nome = $data['nome']	:	$this->nome;
		$this->class = $this;
	}

	public function __get($attr){
		switch ($attr) {
			case 'id':
				return $this->id;
				break;
			
			case 'nome':
				return $this->nome;
				break;
			
			default:
				
				break;
		}
	}
	public function __set($attr, $value){
		switch ($attr) {
			case 'id':
				return $this->id = $value;
				break;
			
			case 'nome':
				return $this->nome = $value;
				break;
			
			default:
				
				break;
		}
	}
	
	public function toArray(){
		return array(
			'id'	=>	$this->id,
			'nome'	=>	$this->nome
			);
	}

}


$app = new Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

$app->get('/', function(Request $request, Response $response){
	
	$usuario = new Usuario();
$usuario->select(array(
		'inner' => array( 'nome_da_tabela_do_Inner' => array('campo_do_usuario' => 'campo_da_tabela_do_inner') )
			)
		);
});

$app->run();
