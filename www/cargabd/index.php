<?php
if (version_compare(PHP_VERSION, '7.4.0') == -1) {
    die ('ERRO: The minimum version required for PHP is 7.4.0');
}

define( 'DS', DIRECTORY_SEPARATOR );
define('ROOT_PATH'     , __DIR__);           // Caminho completo no SO
define('ROOT_FOLDER'   , basename(__DIR__)); //Folder root name

require_once 'helpers/autoload_formdin_helper.php';
require_once 'controllers/autoload_cargabd_cnpjrfb.php';
require_once 'dao/autoload_cargabd_cnpjrfb_dao.php';

ValidarHelper::InformacoesIniciais();

$carga = new Cargabanco();
$carga->executar();