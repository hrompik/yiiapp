<?php

use yii\db\Migration;
use common\models\User;
/**
 * Class m220417_171235_insert_users_to_user_table
 */
class m220417_171235_insert_users_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $roleAdmin = Yii::$app->authManager->getRole('admin');
        $roleUser = Yii::$app->authManager->getRole('user');

        $user = new User();
        $user->username = "admin";
        $user->setPassword($user->username);
        $user->generateAuthKey();
        $user->status = User::STATUS_ACTIVE;
        $user->save();
        Yii::$app->authManager->assign($roleAdmin, $user->getId());


        for ($i = 1; $i < 10; $i++){
            $user = new User();
            $user->username = "user".$i;
            $user->setPassword($user->username);
            $user->generateAuthKey();
            $user->status = User::STATUS_ACTIVE;
            $user->save();
            Yii::$app->authManager->assign($roleUser, $user->getId());
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220416_123952_insert_users_to_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220416_123952_insert_users_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
