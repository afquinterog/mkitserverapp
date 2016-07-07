<?php

use yii\db\Schema;
use yii\db\Migration;

class m160701_190131_createMetricMemCache extends Migration
{
    public function up()
    {
        $this->addColumn("metrics", "memory_cache", $this->integer() );
    }

    public function down()
    {
        echo "m160701_190131_createMetricMemCache cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
