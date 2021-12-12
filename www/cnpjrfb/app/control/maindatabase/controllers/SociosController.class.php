<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGenAd: https://github.com/bjverde/sysgenad
 * Download Formdin5 Framework: https://github.com/bjverde/formDin5
 * 
 * SysGen  Version: 0.6.0
 * FormDin Version: 5.0.0
 * 
 * System cnpjrfb created in: 2021-11-19 22:41:14
 */
class SociosController
{


    private $dao = null;

    public function __construct($tpdo = null)
    {
        $this->dao = new SociosDAO($tpdo);
    }
    public function getDao()
    {
        return $this->dao;
    }
    public function setDao($dao)
    {
        $this->dao = $dao;
    }
    //--------------------------------------------------------------------------------
    public function selectById( $id )
    {
        $result = $this->dao->selectById( $id );
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function selectCount( $where=null )
    {
        $result = $this->dao->selectCount( $where );
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function selectAllPagination( $orderBy=null, $where=null, $page=null,  $rowsPerPage= null)
    {
        $result = $this->dao->selectAllPagination( $orderBy, $where, $page,  $rowsPerPage );
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function selectAll( $orderBy=null, $where=null )
    {
        $result = $this->dao->selectAll( $orderBy, $where );
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function selectBySocio( $cnpj_basico, $nome_socio_razao_social )
    {
        $where['CNPJ_BASICO']=$cnpj_basico;
        $where['NOME_SOCIO_RAZAO_SOCIAL']=$nome_socio_razao_social;
        $result = $this->dao->selectAll( 'NOME_SOCIO_RAZAO_SOCIAL', $where );
        $socio = ArrayHelper::getArray($result,0);
        return $socio;
    }
    public function selectBySocioAdianti($cnpj_basico, $nome_socio_razao_social)
    {
        try {
            TTransaction::open('maindatabase'); // abre uma transação
            $criteria = new TCriteria;
            if( !empty($cnpj_basico) ){
                $criteria->add(new TFilter('cnpj_basico', '=', $cnpj_basico));
            }
            if( !empty($nome_socio_razao_social) ){
                $criteria->add(new TFilter('nome_socio_razao_social', '=', $nome_socio_razao_social));
            }

            $repository = new TRepository('Socio');
            $socio = $repository->load($criteria);

            TTransaction::close(); // fecha a transação.
            return  $socio;
        }
        catch (Exception $e) {
            new TMessage('error', $e->getMessage());
        }
    }    
    //--------------------------------------------------------------------------------
    /**
     * Faz um Select usando o TCriteria
     * @param TCriteria $criteria    - 01: Obj TCriteria
     * @param string $repositoryName - 02: nome de classe
     * @return array Adianti
     */
    public function selectByTCriteria( TCriteria $criteria=null)
    {
        $result = $this->dao->selectByTCriteria($criteria);
        return $result;
    }
    //--------------------------------------------------------------------------------
    /**
     * Faz um Select Count usando o TCriteria
     * @param TCriteria $criteria    - 01: Obj TCriteria
     * @param string $repositoryName - 02: nome de classe
     * @return array Adianti
     */
    public function selectByTCriteriaCount( TCriteria $criteria=null)
    {
        $result = $this->dao->selectByTCriteriaCount($criteria);
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function save( SociosVO $objVo )
    {
        $result = null;
        if( $objVo->getCnpj_basico() ) {
            $result = $this->dao->update( $objVo );
        } else {
            $result = $this->dao->insert( $objVo );
        }
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function delete( $id )
    {
        $result = $this->dao->delete( $id );
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function getVoById( $id )
    {
        $result = $this->dao->getVoById( $id );
        return $result;
    }

}
?>