<?php

use yii\db\Migration;

class m170608_115704_test_data extends Migration
{
    public function safeUp()
    {
        $this->insert('countries', ['name' => 'Украина']);
        $ukraine_id = \Yii::$app->db->getLastInsertID();
        $this->insert('countries', ['name' => 'Россия']);
        $russia_id = \Yii::$app->db->getLastInsertID();
        $this->insert('cities', ['name' => 'Киев', 'country_id' => $ukraine_id]);
        $this->insert('cities', ['name' => 'Харьков', 'country_id' => $ukraine_id]);
        $this->insert('cities', ['name' => 'Москва', 'country_id' => $russia_id]);
        $this->insert('cities', ['name' => 'Санкт-Петербург', 'country_id' => $russia_id]);
    }

    public function safeDown()
    {
        $this->delete('cities', 'name = "Киев" OR name="Харьков" OR name="Москва" OR name="Санкт-Петербург"');
        $this->delete('countries', 'name = "Украина" OR name="Россия"');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170608_115704_test_data cannot be reverted.\n";

        return false;
    }
    */
}
