<?php
/**
 * Table Definition for ml_log_voto
 */

class DataObject_MlLogVoto extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'ml_log_voto';                     // table name
    public $idVoto;                          // int(11)  not_null primary_key auto_increment
    public $idUsuario;                       // int(11)  not_null multiple_key
    public $idHistoria;                      // int(11)  not_null multiple_key
    public $fecha;                           // datetime(19)  not_null binary

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_MlLogVoto',$k,$v); }

    function table()
    {
         return array(
             'idVoto' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idUsuario' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idHistoria' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'fecha' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME + DB_DATAOBJECT_NOTNULL,
         );
    }

    function keys()
    {
         return array('idVoto');
    }

    function sequenceKey() // keyname, use native, native name
    {
         return array('idCiudad', true, false);
    }


    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
