<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Album".
 *
 * @property integer $id
 * @property string $title
 * @property string $artist
 * @property string $genre
 * @property string $theme
 * @property integer $track
 * @property integer $duration
 * @property string $catalog
 * @property string $barcode
 * @property string $frontcover
 * @property string $backcover
 * @property string $releasedat
 * @property string $createdat
 * @property string $updatedat
 */
class Album extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $frontcoverfile;
    public $backcoverfile;

    public static function tableName()
    {
        return 'Album';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'artist'], 'required'],
            [['frontcoverfile', 'backcoverfile'], 'file'],
            [['track', 'duration'], 'integer'],
            [['releasedat', 'createdat', 'updatedat'], 'safe'],
            [['title', 'artist', 'genre', 'theme', 'catalog', 'barcode', 'frontcover', 'backcover'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'artist' => 'Artist',
            'genre' => 'Genre',
            'theme' => 'Theme',
            'track' => 'Track',
            'duration' => 'Duration',
            'catalog' => 'Catalog',
            'barcode' => 'Barcode',
            'frontcover' => 'Frontcover',
            'backcover' => 'Backcover',
            'frontcoverfile' => 'Frontcover',
            'backcoverfile' => 'Backcover',
            'releasedat' => 'Released at',
            'createdat' => 'Created at',
            'updatedat' => 'Updated at',
        ];
    }
}
