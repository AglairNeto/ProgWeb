<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id
 * @property string $login
 * @property string $senha
 * @property string $nome
 * @property string $email
 * @property string $pagina
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['login'], 'string', 'max' => 20],
            [['senha'], 'string', 'max' => 128],
            [['nome', 'pagina'], 'string', 'max' => 200],
            [['email'], 'string', 'max' => 100],
			
			[['id', 'login', 'senha',
		'nome', 'email'],'required','message'=>'Este campo é obrigatório'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'senha' => 'Senha',
            'nome' => 'Nome Completo',
            'email' => 'Email',
            'pagina' => 'Pagina',
        ];
    }
	
	public function afterFind(){
		$this->email=strtolower($this->email);		
	}
	
	public function beforeSave(){
		$this->email = strtolower($this->email);
	}
	
	
}
