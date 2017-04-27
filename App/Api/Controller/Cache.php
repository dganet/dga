<?php
namespace Api\Controller;

class Cache{
    
    private static $time = '60 minutes';
    /**
     * Verifica se é possivel acessar e escrever na pasta informada
     * 
     * @param [type] $folder
     * @return mixed
     */
    protected function setFolder($folder = null){
        if (!is_null($folder) && is_dir($folder) && is_writable($folder)){
            $this->folder = $folder;
        }else{
            return [
                'message' => "Ocorreu um problema ao tentar acessar a pasta de cache, possivel erro de escrita",
                'flag'    => false
            ];
        }
    }
    /**
     * Retorna o local do arquivo cache desejado
     * 
     * @param Hash MD5 $token
     * @return String
     */
    public function createFileLocation($token){
        return dirname(dirname(__DIR__)).'/tmp/'.$token.'.tmp';
    }
    /**
     * Gera e armazena as informações no arquivo de cache
     * 
     * @param Stirng $token
     * @param Mixed $content
     * @return void
     */
   protected function createCacheFile($token, $content){
        $filename = $this->createFileLocation($token);
        //Cria e abre o arquivo somente para escrita
        $handle = fopen($filename, 'x');
        fwrite($handle, $content);
        fclose($handle);
        return $filename;
   }
   /**
    * Guarda as informações em cache
    * 
    * @param Hash MD5 $token
    * @param Mixed $content
    * @return Boolean
    */
   public function save($token, $content){
        $time = strtotime(self::$time);
        $content = serialize(array(
            'expire' => $time,
            'conteudo' => $content
        ));
        return $this->createCacheFile($token, $content);
   }
   /**
    * Lê as informações em cache
    * 
    * @param String $token
    * @return Mixed
    */
   public function read($token){
    $filename = $this->createFileLocation($token);
    if (is_file($filename) && is_readable($filename)){
        $handle = fopen($filename, 'r');
        $content = fgets($handle);
        fclose($handle);
        return unserialize($content);
    }
   }
}