<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aluno".
 *
 * @property integer $id
 * @property integer $matricula
 * @property string $nome
 * @property string $sexo
 * @property integer $id_curso
 * @property integer $ano_ingresso
 *
 * @property Curso $idCurso
 */
class Aluno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aluno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['matricula', 'id_curso', 'ano_ingresso'], 'integer'],
            [['nome'], 'string', 'max' => 200],
            [['sexo'], 'string', 'max' => 1],
			[['matricula', 'id_curso', 'ano_ingresso',
		'nome', 'sexo'],'required','message'=>'Este campo é obrigatório'],
			
        ];
		
		
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'matricula' => 'Matricula',
            'nome' => 'Nome Completo',
            'sexo' => 'Sexo',
            'id_curso' => 'Curso de Graduacao',
            'ano_ingresso' => 'Ano Ingresso',
        ];
    }
	
	public function afterFind(){
		$this->nome = mb_strtolower($this->nome, 'UTF-8');		
	}
	
	public function beforeSave(){
		$this->nome = strtoupper($this->nome);
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCurso()
    {
        return $this->hasOne(Curso::className(), ['id' => 'id_curso']);
    }
}
