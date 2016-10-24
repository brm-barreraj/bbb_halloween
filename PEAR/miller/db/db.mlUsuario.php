<?php
/**
 * Table Definition for ml_usuario
 */

class DataObject_MlUsuario extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'ml_usuario';                      // table name
    public $id;                              // int(11)  not_null primary_key auto_increment
    public $idSession;                       // int(11)  not_null multiple_key
    public $idPais;                          // int(11)  not_null multiple_key
    public $idDepto;                         // int(11)  not_null multiple_key
    public $idCiudad;                        // int(11)  not_null multiple_key
    public $nombre;                          // string(250)  not_null multiple_key
    public $apellido;                        // string(250)  not_null multiple_key
    public $fechaNacimiento;                 // date(10)  not_null binary
    public $cedula;                          // string(45)  not_null multiple_key
    public $email;                           // string(200)  not_null
    public $celular;                         // string(15)  not_null
    public $sexo;                            // string(1)  not_null enum
    public $terminos;                        // string(1)  not_null enum
    public $politica;                        // string(1)  not_null enum
    public $newsletter;                      // string(1)  not_null enum
    public $fotoPerfil;                      // blob(16777215)  not_null blob
    public $fbId;                            // string(45)  
    public $twId;                            // string(45)  
    public $fecha;                           // datetime(19)  not_null binary

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_MlUsuario',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idSession' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idPais' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idDepto' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'idCiudad' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'nombre' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'apellido' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'fechaNacimiento' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_NOTNULL,
             'cedula' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'email' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'celular' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'sexo' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'terminos' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'politica' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'newsletter' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'fotoPerfil' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB + DB_DATAOBJECT_NOTNULL,
             'fbId' =>  DB_DATAOBJECT_STR,
             'twId' =>  DB_DATAOBJECT_STR,
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
             'nombre' => '',
             'apellido' => '',
             'cedula' => '',
             'email' => '',
             'celular' => '',
             'sexo' => '',
             'terminos' => 'N',
             'politica' => 'N',
             'newsletter' => 'N',
             'fotoPerfil' => '',
             'fbId' => '',
             'twId' => '',
         );
    }


    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
