<?php

use yii\db\Migration;
use \yii;

class m150820_102509_data extends Migration
{

    public function up()
    {
        $db = Yii::$app->db;

        $db->createCommand()->insert('authors', [
            'id' => 1,
            'firstname' => 'Виктор',
            'lastname' => 'Олифер'
        ])->execute();

        $db->createCommand()->insert('authors', [
            'id' => 2,
            'firstname' => 'Крикет',
            'lastname' => 'Ли'
        ])->execute();

        $db->createCommand()->insert('authors', [
            'id' => 3,
            'firstname' => 'Мартин',
            'lastname' => 'Грабер'
        ])->execute();

        $db->createCommand()->insert('authors', [
            'id' => 4,
            'firstname' => 'Дженнифер',
            'lastname' => 'Уидом'
        ])->execute();

        $db->createCommand()->insert('authors', [
            'id' => 5,
            'firstname' => 'Беэр',
            'lastname' => 'Бибо'
        ])->execute();


        $db->createCommand()->insert('books', [
            'author_id' => 1,
            'preview' => 'uploads/bc93f8b9cc914092ba286af5c6d1acb3.jpg',
            'name' => 'Компьютерные сети',
            'date_create' => date('Y-m-d H:i:s'),
            'date' => $this->randDate()
        ])->execute();

        $db->createCommand()->insert('books', [
            'author_id' => 2,
            'preview' => 'uploads/d2bf490ab37e4f7383c88c95ed94696b.png',
            'name' => 'DNS and BIND',
            'date_create' => date('Y-m-d H:i:s'),
            'date' => $this->randDate()
        ])->execute();

        $db->createCommand()->insert('books', [
            'author_id' => 3,
            'preview' => 'uploads/37f481461ca14a17bf3e0f9d05254d3f.jpg',
            'name' => 'SQL для простых смертных',
            'date_create' => date('Y-m-d H:i:s'),
            'date' => $this->randDate()
        ])->execute();

        $db->createCommand()->insert('books', [
            'author_id' => 4,
            'preview' => 'uploads/a5f17e1f4f90469aa91d8ce7b340a46d.jpg',
            'name' => 'Основы реляционных баз данных',
            'date_create' => date('Y-m-d H:i:s'),
            'date' => $this->randDate()
        ])->execute();

        $db->createCommand()->insert('books', [
            'author_id' => 5,
            'preview' => 'uploads/d5604cb62ad14de9839ec5381e6c097e.jpg',
            'name' => 'jQuery. Подробное руководство по продвинутому JavaScript',
            'date_create' => date('Y-m-d H:i:s'),
            'date' => $this->randDate()
        ])->execute();
    }

    public function down()
    {
        Yii::$app->db->createCommand('SET FOREIGN_KEY_CHECKS=0;')->execute();
        Yii::$app->db->createCommand('TRUNCATE books;')->execute();
        Yii::$app->db->createCommand('TRUNCATE authors;')->execute();
    }

    public function randDate()
    {
        $y = rand(1980, 2015);

        $m = rand(0, 12);
        $m = $m < 10 ? '0' . $m : $m;

        $d = rand(0, 31);
        $d = $d < 10 ? '0' . $d : $d;

        return implode('-', [$y, $m, $d]);
    }
}
