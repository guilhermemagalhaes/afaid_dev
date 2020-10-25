<!-- classe responsavel por conectar com o bando de dados e gravar erros em arquivo txt -->
<?php
class DB{
	private static $conn;
	static function getConn(){
		if(is_null(self::$conn)){
			self::$conn = new PDO('mysql:host=localhost;dbname=afaid','root','');
			self::$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
		return self::$conn;
	}
}
function logErros($errno){		
	if(error_reporting()==0) return;		
	$exec = func_get_arg(0);		
	$errno = $exec->getCode();
	$errstr = $exec->getMessage();
	$errfile = $exec->getFile();
	$errline = $exec->getLine();
	$err = 'CAUGHT EXCEPTION';		
	if(ini_get('log_errrors')) error_log(sprintf("PHP %s: %s in %s on line %d",$err,$errstr,$errfile,$errline));		
	$strErro = 'erro: '.$err.' no arquivo: '.$errfile.' ( linha '.$errline.' ) :: IP('.$_SERVER['REMOTE_ADDR'].') data:'.date('d/m/y H:i:s')."\n";	
	$arquivo = fopen('logerro.txt','a');
	fwrite($arquivo,$strErro);
	fclose($arquivo);	
	set_error_handler('logErros');	
}



session_start();

require_once'facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '959243830854531',
  'app_secret' => 'b54e9d951a35463cf545425bddcd0139',
  'default_graph_version' => 'v2.9',
]);




