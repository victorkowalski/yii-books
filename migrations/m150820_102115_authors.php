<?php

use yii\db\Migration;
use yii\db\Schema;

class m150820_102115_authors extends Migration
{
    public function up()
    {
        $this->createTable('authors', [
            'id' => 'pk',
            'firstname' => Schema::TYPE_STRING . ' NOT NULL',
            'lastname' => Schema::TYPE_STRING . ' NOT NULL'

        ]);
    }

    public function down()
    {
        $this->dropTable('authors');
    }
}
