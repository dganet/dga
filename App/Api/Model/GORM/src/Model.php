<?php
/**
*	Classe desenvolvida com intuito de aprendizado, tentativa de gerar e entender o funcionamento de um ORM
*	@author Guilherme Brito
* 	@version 1.0
*/
namespace GORM;
require_once(dirname(__DIR__).'/gorm.php');
use PDO;
class Model{
	use Builder, Persistent, Finder;
	/**
	*	Variavel recebe uma instancia das classes filhas
	*   @access protected
	*	@name $class
	*/
	protected  		$class;
	/**
	* 	Variavel recebe o caminho completo da classe filha que há está chamando
	* 	@access protected
	*	@name $instance
	*/
	protected		$instance;
	/**
	* 	Variavel que recebe um array com as informações de conexão
	* 	@access public
	* 	@name $db
	*/
	public 		$db = array(
		"driver" 	=> "mysql",
		"host"		=> "br654.hostgator.com.br",		//31.220.104.130 mysql.hostinger.com.br br654.hostgator.com.br
		"dbname"	=> "smout364_dga", 		//u172775243_imobi
		"user"		=> "smout364_dga", 		//u172775243_imobi
		"pass"		=> "159951"			//im98yp121556
	);
	/**
    * Recebe o nome da tabela da função Model::loadTable()
    * @access public
    * @name $table
    */
	public static $table;
	/**
	 * Informa qual é a primary key do objeto
	 * 
	 * @var String
	 */
	private static $primaryKey = null;
	/**
	 * Variavel que habilita o DEBUG quando setada como true
	 * 
	 * @var boolean
	 */
	private $debug = false;
	/**
     * Retorna uma instância única de uma classe.
     *
     * @staticvar Singleton $instance A instância única dessa classe.
     *
     * @return Singleton A Instância única.
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }
	/**
     * Construtor do tipo protegido previne que uma nova instância da
     * Classe seja criada através do operador `new` de fora dessa classe.
     */
    protected function __construct()
    {
		return $this->getInstance();
    }

    /**
     * Método clone do tipo privado previne a clonagem dessa instância
     * da classe
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Método unserialize do tipo privado para prevenir a desserialização
     * da instância dessa classe.
     *
     * @return void
     */
    private function __wakeup()
    {
    }
	/**
	 * Set a value for debug
	 * 
	 * @param [type] $value
	 * @return void
	 */
	public function _setDebug($value = false){
		$this->debug = $value;
	}
	/**
	 * Get the value for the variable debug
	 * 
	 * @return Bool
	 */
	public function _getDebug(){
		return $this->debug;
	}
	/**
	 * Get PrimaryKey
	 * 
	 * @return String
	 */
	public function _getPrimaryKey(): String {
		return $this->primaryKey;
	}
	/**
	 * Set PrimaryKey
	 * 
	 * @param String $value
	 * @return void
	 */
	public function _setPrimaryKey(String $value){
		$this->primaryKey = $value;
	}
	/**
	 * Retorna um Objeto da classe que está chamando
	 * 
	 * @param Array $array
	 * @return Object
	 */
	//public function load(Array $array = []){
	//	$cls = get_called_class();
	//	return  $cls($array);
	//}	
	/**
	*	Carrega a Tabela na variavel dentro da trait Builder::$table
	*	@return void
	*/
	public function loadTable(){
		$this->instance = get_called_class();
		$this->table = str_replace("\\", "/", strtolower($this->instance));
		$this->table = explode('/', $this->table);
		$this->table = $this->table[count($this->table) -1];
	
	}
	/**
	* 	Retorna um ou mais objetos de seus respectivos tipos
	* 	@param Array $return
	* 	@return Array $array
	*/
	public function loadObject($return){
		foreach ($return as $key => $value) {
				$obj = new $this->instance($value);
				$array[$key] =$obj->toArray();
			}
		return $array;
	}
	//Load object information by array
	public function load($array = []){
        foreach ($array as $key => $value) {
            $this->$key = $value;
        }
    }
}
