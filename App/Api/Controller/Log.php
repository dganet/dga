<?php 
namespace Api\Controller;

class Log {
	
	/**
	 * 
	 * @param Valor que será colocado no arquivo de log $string
	 */
	public static final function Error($string){
		//Cria o arquivo se ele não existir
		//$handle = fopen("backend.log", "a");
		//Escrevo no arquivo aberto
		//$data = date('d/m/Y G:i:s');
		//fwrite($handle, "\n".$data." [ERROR]: ".$string);
		//fecha o arquivo;
		//fclose($handle);
	}
	
	public static final function Message($string){
		//Cria o arquivo se ele não existir
		//$handle = fopen("backend.log", "a");
		//Escrevo no arquivo aberto
		//$data = date('d/m/Y G:i:s');
		//fwrite($handle, "\n".$data." [MESSAGE]:".$string);
		//fecha o arquivo;
		//fclose($handle);
	}
	public static final function Debug($string){
		//Cria o arquivo se ele não existir
		//$handle = fopen("backend.log", "a");
		//Escrevo no arquivo aberto
		//$data = date('d/m/Y G:i:s');
		//fwrite($handle, "\n".$data." [DEBUG]:".$string);
		//fecha o arquivo;
		//fclose($handle);
	}
}