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
class EmpresaDAO  extends Dao
{
    private static $sqlBasicSelect = 'SELECT cnpj_basico
                                            ,razao_social
                                            ,natureza_juridica
                                            ,qualificacao_responsavel
                                            ,capital_social
                                            ,porte_empresa
                                            ,ente_federativo_responsavel
                                        FROM empresa';

    public function __construct($tpdo=null)
    {
        parent::__construct($tpdo);
        $this->setTabelaName('empresa');
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
                        , $linhaArquivoCsv[7]
                        , $linhaArquivoCsv[8]
                        , $linhaArquivoCsv[9]
                        , $linhaArquivoCsv[10]
                        );
        $sql = 'INSERT INTO empresa
        (cnpj_basico        
        ,razao_social
        ,natureza_juridica
        ,qualificacao_responsavel
        ,capital_social
        ,porte_empresa
        ,ente_federativo_responsavel
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