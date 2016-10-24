<?php
/**
 * Table Definition for ml_historia
 */

class DataObject_MlHistoria extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'ml_historia';                     // table name
    public $idHistoria;                      // int(11)  not_null primary_key auto_increment
    public $idUsuario;                       // int(11)  not_null multiple_key
    public $nombreHistoria;                  // string(100)  not_null
    public $historia;                        // string(150)  not_null
    public $aprobado;                        // string(1)  not_null enum
    public $imagen;                          // blob(16777215)  blob
    public $motivo;                          // blob(65535)  blob
    public $fecha;                           // datetime(19)  not_null binary

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_MlHistoria',$k,$v); }

    function table()
    {
         return array(
             'idHistoria' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idUsuario' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'nombreHistoria' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'historia' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'aprobado' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'imagen' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'motivo' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB,
             'fecha' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME + DB_DATAOBJECT_NOTNULL,
         );
    }

    function keys()
    {
         return array('idHistoria');
    }

    function sequenceKey() // keyname, use native, native name
    {
         return array('idCiudad', true, false);
    }

    function defaults() // column default values 
    {
         return array(
             'nombreHistoria' => '',
             'historia' => '',
             'aprobado' => 'E',
             'imagen' => '',
             'motivo' => '',
         );
    }


    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
