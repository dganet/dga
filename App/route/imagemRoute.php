<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// $app->post('/save', function(Request $request, Response $response, $args){
// 		$img = new \Api\Controller\ImageController;
// 		$post = json_decode($request->getBody(),true);
// 		if (!isset($post['banner3']) && !isset($post['banner2']) && !isset($post['banner1'])){
// 			$flag = $img->listaPorTipo($post['tipo']);
// 			$imagem = new \Api\Model\Entity\Imagem($flag[0]);
// 			$imagem->link = $post['link'];
// 			$imagem->update();
// 		}
// 		if (isset($post['banner1'])){
// 			$flag = $img->listaPorTipo('banner1');
// 			if (isset($flag[0]['id'])){
// 				$post['banner1']['id'] = $flag[0]['id'];
// 				$post['banner1']['tipo'] = 'banner1';
// 				$link = $post['link'];
//             	unset($post['link']);
//             	foreach ($post as $key => $value) {
//                 	$post = $value;
//             	}
//             	$post['link'] = $link;
// 				$img = $img->cadastrar($post, true);
// 			}else{
// 				$post['banner1']['tipo'] = 'banner1';
// 				$link = $post['link'];
//             	unset($post['link']);
//             	foreach ($post as $key => $value) {
//                 	$post = $value;
//             	}
//             	$post['link'] = $link;
// 				$img = $img->cadastrar($post);
// 			}
// 		}
// 		if (isset($post['banner2'])){
// 			$flag = $img->listaPorTipo('banner2');
// 			if (isset($flag[0]['id'])){
				
// 				$post['banner2']['id'] = $flag[0]['id'];
// 				$post['banner2']['tipo'] = 'banner2';
// 				$link = $post['link'];
//             	unset($post['link']);
//             	foreach ($post as $key => $value) {
//                 	$post = $value;
//             	}
//             	$post['link'] = $link;
// 				$img = $img->cadastrar($post, true);
// 			}else{
// 				$post['banner2']['tipo'] = 'banner2';
// 				$link = $post['link'];
//             	unset($post['link']);
//             	foreach ($post as $key => $value) {
//                 	$post = $value;
//             	}
//             	$post['link'] = $link;
// 				$img = $img->cadastrar($post);
// 			}
// 		}
// 		if (isset($post['banner3'])){
// 			$flag = $img->listaPorTipo('banner3');
// 			if (isset($flag[0]['id'])){
// 				$post['banner3']['id'] = $flag[0]['id'];
// 				$post['banner3']['tipo'] = 'banner3';
// 				$link = $post['link'];
//             	unset($post['link']);
//             	foreach ($post as $key => $value) {
//                 	$post = $value;
//             	}
//             	$post['link'] = $link;
// 				$img = $img->cadastrar($post, true);
// 			}else{
// 				$post['banner3']['tipo'] = 'banner3';
// 				$link = $post['link'];
//             	unset($post['link']);
//             	foreach ($post as $key => $value) {
//                 	$post = $value;
//             	}
//             	$post['link'] = $link;
// 				$img = $img->cadastrar($post);
// 			}
// 		}
		

// 	});
// 	//lista todos os img
// 	$app->get('/list', function(Request $request, Response $response){
// 		$img = new \Api\Controller\ImageController();
// 		$img = $img->listaTudo();
// 		$response = $response->withHeader('Content-type', 'application/json');
// 		$response = $response->withJson($img);
// 		return $response;
// 	});
// 	$app->get('/listtipo/{tipo}', function(Request $request, Response $response){
// 		$img = new \Api\Controller\ImageController();
// 		$img = $img->listaPorTipo($args['tipo']);
// 		$response = $response->withHeader('Content-type', 'application/json');
// 		$response = $response->withJson($img);
// 		return $response;
// 	});
// 	//Lista img por Id
// 	$app->get('/list/{id}', function(Request $request, Response $response, $args){
// 		$img = new \Api\Controller\ImageController();
// 		$img = $img->listaPorId($args['id']);
// 		$response = $response->withHeader('Content-type', 'application/json');
// 		$response = $response->withJson($img);
// 		return $response;
// 	});
// 	//Atualiza cadastro
// 	$app->put('/update/{id}', function(Request $request, Response $response, $args){
// 		$post = json_decode($request->getBody(), true);
// 		$img = new \Api\Controller\ImageController();
// 		if ($img->atulizaCadastro($post)){
// 			$response = $response->withHeader('Content-type', 'application/json');
// 			$response = $response->withJson([true]);
// 		}else{
// 			$response = $response->withHeader('Content-type', 'application/json');
// 			$response = $response->withJson([false]);
// 		}
// 		return $response;
// 	});
// 	//Inativa um img
// 	$app->delete('/delete/{id}', function (Request $request, Response $response, $args){
// 		$img = new \Api\Controller\ImageController();
// 		$img =  $img->inativar($args['id']);
// 		$response = $response->withHeader('Content-type', 'application/json');
// 		$response = $response->withJson($img);
// 		return $response;
// 	});
