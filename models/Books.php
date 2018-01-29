<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $name
 * @property string $date_create
 * @property string $date_update
 * @property string $preview
 * @property string $date
 * @property integer $author_id
 *
 * @property Authors $author
 */
class Books extends \yii\db\ActiveRecord
{
    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->date_create = date('Y-m-d H:i:s');
            }

            return true;
        }
    }

    public function getHumanDate($attribute = 'date')
    {
        $time = strtotime($this->{$attribute});
        $day = date('d', $time);

        if (date('d') == $day) {
            return Yii::t('app', 'Today at ') . date('H:i', $time);
        } elseif (date('d', strtotime('-1 days')) == $day) {
            return Yii::t('app', 'Yesterday at ') . date('H:i', $time);
        }

        return Yii::t('app', '{0, date, dd MMMM, YYYY}', [$time]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => !$this->isNewRecord, 'extensions' => 'png, jpg, gif, jpeg'],
            [['name', 'date', 'author_id'], 'required'],
            [['date_create', 'date_update', 'date'], 'safe'],
            [['author_id'], 'integer'],
            [['name', 'preview'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Authors::className(), 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    public function uploadAndSave()
    {
        if ($this->validate()) {
            if ($this->imageFile) {
                $path = 'uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;

                $this->imageFile->saveAs($path);
                $this->preview = $path;
            }

            if ($this->save(false)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'date_from' => Yii::t('app', 'Date from'),
            'date_create' => Yii::t('app', 'Date Create'),
            'date_update' => Yii::t('app', 'Date Update'),
            'preview' => Yii::t('app', 'Preview'),
            'imageFile' => Yii::t('app', 'Image File'),
            'date' => Yii::t('app', 'Date'),
            'author_id' => Yii::t('app', 'Author ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Authors::className(), ['id' => 'author_id']);
    }
}
