<?php
/**
 * Table Definition for bbbh_participante
 */

class DataObject_BbbhParticipante extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'bbbh_participante';               // table name
    public $id;                              // int(11)  not_null primary_key auto_increment
    public $nombre;                          // string(75)  
    public $apellido;                        // string(75)  
    public $correo;                          // string(75)  
    public $apodo;                           // string(36)  not_null unique_key
    public $contrasenia;                     // string(36)  not_null
    public $telefono;                        // string(12)  
    public $fecha;                           // datetime(19)  binary

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_BbbhParticipante',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'nombre' =>  DB_DATAOBJECT_STR,
             'apellido' =>  DB_DATAOBJECT_STR,
             'correo' =>  DB_DATAOBJECT_STR,
             'apodo' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'contrasenia' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'telefono' =>  DB_DATAOBJECT_STR,
             'fecha' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_TIME,
         );
    }

    function keys()
    {
         return array('id');
    }

    function sequenceKey() // keyname, use native, native name
    {
         return array('id', true, false);
    }

    function defaults() // column default values 
    {
         return array(
             'nombre' => '',
             'apellido' => '',
             'correo' => '',
             'apodo' => '',
             'contrasenia' => '',
             'telefono' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
