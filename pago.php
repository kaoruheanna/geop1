<?php
class Pago extends CActiveRecord
{
	const IMPORTE_MINIMO = 0;

    public static function model($className=__CLASS__){
        return parent::model($className);
    }
 
    public function tableName() {
        return 'PAGOS';
    }

    public function primaryKey() {
	    return 'codigopago';
	}

	public function rules() {
    	return array(
            array('codigopago, importe, fecha', 'required'),
            array('importe', 'float'),
            array('importe', 'esPositivo'),
            array('fecha', 'date', 'format' => 'yyyy-M-d'),
            array('fecha', 'esActual'),
            array('usuario','exist','allowEmpty' => true, 'className' => 'Usuario')
        );
    }

    public function esPositivo($attribute,$params){
    	if ($this->importe <= self::IMPORTE_MINIMO){
    		$this->addError('importe','Importe invalido');
    	}
    }

    public function esActual($attribute,$params){
        if ($this->fecha <= date("Y-m-d");  ){
            $this->addError('fecha','Fecha invalida');
        }
    }

    public function relations() {
        return array(
        	'usuario'=>array(self::BELONGS_TO, 'Usuario','USUARIOSPAGOS(codigopago, codigousuario)')
        );
    }

}