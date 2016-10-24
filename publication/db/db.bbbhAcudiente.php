<?php
/**
 * Table Definition for bbbh_acudiente
 */

class DataObject_BbbhAcudiente extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'bbbh_acudiente';                  // table name
    public $id;                              // int(11)  not_null primary_key auto_increment
    public $idCiudad;                        // int(11)  not_null multiple_key
    public $idParticipante;                  // int(11)  not_null multiple_key
    public $nombre;                          // string(75)  
    public $apellido;                        // string(75)  
    public $tipoDocumento;                   // string(1)  enum
    public $documento;                       // string(15)  
    public $correo;                          // string(75)  
    public $telefono;                        // string(12)  
    public $direccion;                       // string(150)  
    public $fecha;                           // datetime(19)  binary

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_BbbhAcudiente',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idCiudad' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idParticipante' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'nombre' =>  DB_DATAOBJECT_STR,
             'apellido' =>  DB_DATAOBJECT_STR,
             'tipoDocumento' =>  DB_DATAOBJECT_STR,
             'documento' =>  DB_DATAOBJECT_STR,
             'correo' =>  DB_DATAOBJECT_STR,
             'telefono' =>  DB_DATAOBJECT_STR,
             'direccion' =>  DB_DATAOBJECT_STR,
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
             'tipoDocumento' => '',
             'documento' => '',
             'correo' => '',
             'telefono' => '',
             'direccion' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
