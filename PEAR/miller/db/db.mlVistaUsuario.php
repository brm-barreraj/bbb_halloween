<?php
/**
 * Table Definition for ml_vista_usuario
 */

class DataObject_MlVistaUsuario extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'ml_vista_usuario';                // table name
    public $id;                              // int(11)  not_null
    public $nombre;                          // string(250)  not_null
    public $apellido;                        // string(250)  not_null
    public $fechaNacimiento;                 // date(10)  not_null binary
    public $cedula;                          // string(45)  not_null
    public $email;                           // string(200)  not_null
    public $celular;                         // string(15)  not_null
    public $sexo;                            // string(1)  not_null enum
    public $fotoPerfil;                      // blob(16777215)  not_null blob
    public $fbId;                            // string(45)  
    public $twId;                            // string(45)  
    public $Pais;                            // string(45)  not_null
    public $Departamento;                    // string(45)  not_null
    public $Ciudad;                          // string(45)  not_null
    public $Votos;                           // int(21)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_MlVistaUsuario',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'nombre' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'apellido' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'fechaNacimiento' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_NOTNULL,
             'cedula' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'email' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'celular' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'sexo' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'fotoPerfil' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_BLOB + DB_DATAOBJECT_NOTNULL,
             'fbId' =>  DB_DATAOBJECT_STR,
             'twId' =>  DB_DATAOBJECT_STR,
             'Pais' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'Departamento' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'Ciudad' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'Votos' =>  DB_DATAOBJECT_INT,
         );
    }

    function keys()
    {
         return array();
    }

    function sequenceKey() // keyname, use native, native name
    {
         return array('idCiudad', true, false);
    }

    function defaults() // column default values 
    {
         return array(
             'id' => 0,
             'nombre' => '',
             'apellido' => '',
             'cedula' => '',
             'email' => '',
             'celular' => '',
             'sexo' => '',
             'fotoPerfil' => '',
             'fbId' => '',
             'twId' => '',
             'Pais' => '',
             'Departamento' => '',
             'Ciudad' => '',
         );
    }


    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
