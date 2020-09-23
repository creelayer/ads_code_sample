<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ads}}`.
 */
class m200921_160004_create_ads_table extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $this->createTable('{{%ads}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(200)->notNull(),
            'description' => $this->string(1000)->notNull(),
            'price' => $this->bigInteger()->notNull(),
            'photos' => \yii\db\pgsql\Schema::TYPE_TEXT."[]",
            'created_at' => $this->timestamp()->notNull()->defaultValue('now()'),
            'updated_at' => $this->dateTime()->notNull()->defaultValue('now()')
        ]);

        $this->createIndex('ads_price_idx','{{%ads}}', 'price');
        $this->createIndex('ads_created_idx','{{%ads}}', 'created_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
