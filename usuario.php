<?php
class Usuario extends CActiveRecord
{
	const EDAD_MINIMA = 18;

    public static function model($className=__CLASS__){
        return parent::model($className);
    }
 
    public function tableName() {
        return 'USUARIOS';
    }

    public function primaryKey() {
	    return 'codigousuario';
	}

	public function rules() {
    	return array(
            array('codigousuario, usuario', 'required'),
            array('edad', 'integer'),
            array('edad', 'esAdulto')
            array('favoritos','exist','allowEmpty' => true, 'className' => 'Usuario'),
            array('pagos','exist','allowEmpty' => true, 'className' => 'Pago')
        );
    }

    public function esAdulto($attribute,$params){
    	if ($this->edad <= self::EDAD_MINIMA){
    		$this->addError('edad','Edad invalida');
    	}
    }

    public function relations() {
        return array(
        	// Para favoritos puede ser necesario desambiguar en cual de las dos columnas buscar el id para la consulta
            'favoritos'=>array(self::MANY_MANY, 'Usuario','FAVORITOS(codigousuario, codigousuariofavorito)'),
            'pagos'=>array(self::HAS_MANY, 'Pago','USUARIOSPAGOS(codigopago, codigousuario)')
        );
    }

}