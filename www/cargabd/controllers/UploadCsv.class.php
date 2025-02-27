<?php

class UploadCsv {

    private $dao    = null;
    private $arquivoCsv    = null;

    public function __construct(Dao $classDao, string $arquivoCsv)
    {
       $this->dao = $classDao;
       $this->arquivoCsv = $arquivoCsv;
    }

	public function executar(){
        $numRegistros = 0;
        $separador = ';';
        $file = fopen($this->arquivoCsv, 'r');
        while ( ($line = fgets ($file)) !== false ){
        //for ($i = 1; $i <= 1000; $i++) {
        //$line = fgets ($file);
            //Limpando a linha
            $line = StringHelper::str2utf8($line);
            $line = preg_replace('/["]/', '', $line);
            $line = strtr($line, chr(13), chr(32));// For CR
            $line = strtr($line, chr(10), chr(32));// For LF
            if( !empty($line) ){
                $line = explode($separador, $line);
                $this->dao->insert( $line );
            }
            $numRegistros = $numRegistros+1;;
        }
        fclose($file);
		return $numRegistros;
	}
}