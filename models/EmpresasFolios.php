<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresas_folios".
 *
 * @property int $id
 * @property int $id_empresa
 * @property int $id_folio
 */
class EmpresasFolios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresas_folios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_empresa', 'id_folio'], 'required'],
            [['id_empresa', 'id_folio'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_empresa' => 'Id Empresa',
            'id_folio' => 'Id Folio',
        ];
    }

    public function getEmpresa()
    {

        return $this->hasOne(Empresas::className(), ['id' => 'id_empresa']);

    }

    public function getFolio()
    {

        return $this->hasOne(Folios::className(), ['id' => 'id_folio']);

    }
}
