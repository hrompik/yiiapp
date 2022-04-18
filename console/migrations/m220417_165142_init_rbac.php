<?php

use yii\db\Migration;

/**
 * Class m220417_165142_init_rbac
 */
class m220417_165142_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        // add "createPepyaka" permission
        $createPepyaka = $auth->createPermission('createPepyaka');
        $createPepyaka->description = 'create Pepyaka';
        $auth->add($createPepyaka);

        // add "updatePepyaka" permission
        $updatePepyaka = $auth->createPermission('updatePepyaka');
        $updatePepyaka->description = 'update Pepyaka';
        $auth->add($updatePepyaka);

        // add "deletePepyaka" permission
        $deletePepyaka = $auth->createPermission('deletePepyaka');
        $deletePepyaka->description = 'delete Pepyaka';
        $auth->add($deletePepyaka);

        // add view Pepyaka UserId permission
        $viewPepyakaUserId = $auth->createPermission('viewPepyakaUserId');
        $viewPepyakaUserId->description = 'view Pepyaka UserId';
        $auth->add($viewPepyakaUserId);

        // add view all Pepyakas
        $viewAllPepyakas = $auth->createPermission('viewAllPepyakas');
        $viewAllPepyakas->description = 'view All Pepyakas';
        $auth->add($viewAllPepyakas);


        // add "user" role
        $user = $auth->createRole('user');
        $auth->add($user);
        $auth->addChild($user, $createPepyaka);
        $auth->addChild($user, $updatePepyaka);
        $auth->addChild($user, $deletePepyaka);

        // add "admin" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $user);
        $auth->addChild($admin, $viewPepyakaUserId);
        $auth->addChild($admin, $viewAllPepyakas);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220417_165142_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
