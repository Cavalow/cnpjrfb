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
        $result = ArrayHelper::getArray($result,0);
        $result = ArrayHelper::get($result,'qtd');
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function truncate()
    {
        $sql = 'TRUNCATE '.$this->getTabelaName().';';
        $tpdo = $this->tpdo;
        if( $tpdo->getDBMS()==TPDOConnection::DBMS_MYSQL ){
            //https://pt.stackoverflow.com/questions/256158/existe-algum-risco-em-usar-set-foreign-key-checks-0
            $sql = 'SET FOREIGN_KEY_CHECKS=0;'.$sql.';SET FOREIGN_KEY_CHECKS=1;';
        }elseif($tpdo->getDBMS()==TPDOConnection::DBMS_POSTGRES){
            //https://stackoverflow.com/questions/38112379/disable-postgresql-foreign-key-checks-for-migrations
            $sql = "SET session_replication_role = 'replica';".$sql.";SET session_replication_role = 'origin';";
        }
        $result = $this->tpdo->executeSql($sql);
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function executeSql($sql, $values)
    {
        $tpdo = $this->tpdo;
        if( $tpdo->getDBMS()==TPDOConnection::DBMS_MYSQL ){
            //https://pt.stackoverflow.com/questions/256158/existe-algum-risco-em-usar-set-foreign-key-checks-0
            $sql = 'SET FOREIGN_KEY_CHECKS=0;'.$sql.';SET FOREIGN_KEY_CHECKS=1;';
        }elseif($tpdo->getDBMS()==TPDOConnection::DBMS_POSTGRES){
            //https://stackoverflow.com/questions/38112379/disable-postgresql-foreign-key-checks-for-migrations
            $sql = "SET session_replication_role = 'replica';".$sql.";SET session_replication_role = 'origin';";
        }
        $result = $this->tpdo->executeSql($sql,$values);
        return $result;
    }
}
?>