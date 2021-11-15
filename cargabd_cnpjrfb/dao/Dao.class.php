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
class Dao 
{
    private $tpdo = null;
    public  $tabableName = null;

    public function __construct($tpdo=null)
    {
        $this->setTPDOConnection($tpdo);
    }
    public function getTPDOConnection()
    {
        return $this->tpdo;
    }
    public function setTPDOConnection($tpdo)
    {
        $this->tpdo = $tpdo;
    }
    public function getTabelaName()
    {
        return $this->tabableName;
    }
    public function setTabelaName($tabableName)
    {
        $this->tabableName = $tabableName;
    }    
    //--------------------------------------------------------------------------------
    public function selectCount()
    {
        $sql = 'select count(codigo) as qtd from '.$this->getTabelaName();
        $result = $this->tpdo->executeSql($sql);
        return $result['QTD'][0];
    }
    //--------------------------------------------------------------------------------
    public function truncate()
    {
        $sql = 'TRUNCATE '.$this->getTabelaName();
        $result = $this->tpdo->executeSql($sql);
        return $result['QTD'][0];
    }
}
?>