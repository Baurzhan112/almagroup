<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cities`.
 */
class m180210_060633_create_cities_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('cities', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'region_id' => $this->integer()->notNull(),
            'country_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('cities');
    }
}
