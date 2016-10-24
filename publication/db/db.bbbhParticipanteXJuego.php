<?php
/**
 * Table Definition for bbbh_participante_x_juego
 */

class DataObject_BbbhParticipanteXJuego extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'bbbh_participante_x_juego';       // table name
    public $id;                              // int(11)  not_null
    public $apodo;                           // string(108)  not_null
    public $puntaje;                         // real(33)  

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObject_BbbhParticipanteXJuego',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'apodo' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_NOTNULL,
             'puntaje' =>  DB_DATAOBJECT_INT,
         );
    }

    function keys()
    {
         return array();
    }

    function sequenceKey() // keyname, use native, native name
    {
         return array('id', true, false);
    }

    function defaults() // column default values 
    {
         return array(
             'id' => 0,
             'apodo' => '',
         );
    }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
