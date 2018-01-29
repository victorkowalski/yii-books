<?php

use yii\db\Migration;
use yii\db\Schema;

class m150820_102121_books extends Migration
{
    public function up()
    {
        $this->createTable('books', [
            'id' => 'pk',
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'date_create' => Schema::TYPE_DATETIME . ' NOT NULL',
            'date_update' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'preview' => Schema::TYPE_STRING . ' NOT NULL',
            'date' => Schema::TYPE_DATE . ' NOT NULL',
            'author_id' => Schema::TYPE_INTEGER . ' NOT NULL'
        ]);

        $this->addForeignKey( 'book_author', 'books', 'author_id', 'authors', 'id' );
    }

    public function down()
    {
        $this->dropTable('books');
    }
}
