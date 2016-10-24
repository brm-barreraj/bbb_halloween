<?php
/**
 * Table Definition for ml_session
 */

class DataObject_MlSession extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'ml_session';                      // table name
    public $id;                              // int(11)  not_null primary_key auto_increment
    public $fechaNacimiento;                 // date(10)  not_null binary
    public $recordar;                        // string(1)  not_null enum
    public $ip;                              // string(45)  not_null
    public $fecha;                           // datetime(19)  not_null binary

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_MlSession',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'fechaNacimiento' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_NOTNULL,
             'recordar' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'ip' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'fecha' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME + DB_DATAOBJECT_NOTNULL,
         );
    }

    function keys()
    {
         return array('id');
    }

    function sequenceKey() // keyname, use native, native name
    {
         return array('idCiudad', true, false);
    }

    function defaults() // column default values 
    {
         return array(
             'recordar' => '',
             'ip' => '',
         );
    }


    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
