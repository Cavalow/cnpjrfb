<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGen: https://github.com/bjverde/sysgen
 * Download Formdin Framework: https://github.com/bjverde/formDin
 * 
 * SysGen  Version: 1.11.0
 * FormDin Version: 4.11.0
 * 
 * System concursomembroadm created in: 2021-03-10 20:42:27
 */
class SimplesDAO  extends Dao
{
    private static $sqlBasicSelect = 'SELECT cnpj_basico        
                                            ,opcao_pelo_simples
                                            ,data_opcao_simples
                                            ,data_exclusao_simples
                                            ,opcao_mei
                                            ,data_opcao_mei
                                            ,data_exclusao_mei
                                        FROM simples';

    public function __construct($tpdo=null)
    {
        parent::__construct($tpdo);
        $this->setTabelaName('simples');
    }
    //--------------------------------------------------------------------------------
    public function selectCount()
    {
        $sql = 'select count(cnpj_basico) as qtd from '.$this->getTabelaName();
        $result = $this->getTPDOConnection()->executeSql($sql);
        $result = ArrayHelper::getArray($result,0);
        $result = ArrayHelper::get($result,'qtd');
        return $result;
    }    
    //--------------------------------------------------------------------------------
    public function insert( array $linhaArquivoCsv )
    {
        $values = array(  $linhaArquivoCsv[0]
                        , $linhaArquivoCsv[1]
                        , $linhaArquivoCsv[2]
                        , $linhaArquivoCsv[3]
                        , $linhaArquivoCsv[4]
                        , $linhaArquivoCsv[5]
                        , $linhaArquivoCsv[6]
                        );
        $sql = 'INSERT INTO simples
        (cnpj_basico        
        ,opcao_pelo_simples
        ,data_opcao_simples
        ,data_exclusao_simples
        ,opcao_mei
        ,data_opcao_mei
        ,data_exclusao_mei
        )
        VALUES
        (?
        ,?
        ,?
        ,?
        ,?
        ,?
        ,?)';
        $result = $this->executeSql($sql, $values);
        return true;
    }
}
?>