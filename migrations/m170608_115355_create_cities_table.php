<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cities`.
 * Has foreign keys to the tables:
 *
 * - `countries`
 */
class m170608_115355_create_cities_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('cities', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'country_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `country_id`
        $this->createIndex(
            'idx-cities-country_id',
            'cities',
            'country_id'
        );

        // add foreign key for table `countries`
        $this->addForeignKey(
            'fk-cities-country_id',
            'cities',
            'country_id',
            'countries',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `countries`
        $this->dropForeignKey(
            'fk-cities-country_id',
            'cities'
        );

        // drops index for column `country_id`
        $this->dropIndex(
            'idx-cities-country_id',
            'cities'
        );

        $this->dropTable('cities');
    }
}
