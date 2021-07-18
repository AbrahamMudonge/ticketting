<?php

namespace app\commands;

use app\models\AuthAssignment;
use app\models\User;
use Yii;
use yii\console\Controller;
use app\helpers\RolesList;
use app\helpers\RolesPermissionsList;
use ReflectionClass;
use app\models\AuthItemChild;
use app\helpers\PermissionsList;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();
        $this->createAdminRole();
        $this->createRoles();
        $this->createPermissions();
        $this->createRolesPermissions();
        $this->assignUsersRoles();

    }

    public function createPermissions()
    {
        $auth = Yii::$app->authManager;

        $adminRole = $auth->getRole(RolesList::ADMIN_USER);

        foreach ($this->getPermissions() as $PERMISSION => $DESCRIPTION) {
            try {
                $viewUsers = $auth->createPermission($PERMISSION);
                $viewUsers->description = $DESCRIPTION;
                $auth->add($viewUsers);

                $auth->addChild($adminRole, $viewUsers);

                echo "PERMISSION: {$PERMISSION} CREATED SUCCESSFULLY" . PHP_EOL;
            } catch (\Exception $e) {
                echo "PERMISSION: {$PERMISSION} EXISTS" . PHP_EOL;
            }
        }
    }

    private function createAdminRole()
    {
        $auth = Yii::$app->authManager;

        try {
            $viewUsers = $auth->createRole(RolesList::ADMIN_USER);
            $viewUsers->description = RolesList::DESC_ADMIN_USER;
            $created = false;
            try {
                $auth->add($viewUsers);
                $created = true;
            } catch (\Exception $e) {
            }

            $perms = $auth->getPermissions();
            foreach ($perms as $perm) {
                try {
                    $auth->addChild($viewUsers, $perm);
                } catch (\Exception $e) {
                }
            }

            if ($created) {
                echo PHP_EOL . "************************ Creating ADMIN role *************************" . PHP_EOL;
                echo "ROLE: admin CREATED SUCCESSFULLY" . PHP_EOL;
                echo "************************ Done Creating ADMIN role *************************" . PHP_EOL . PHP_EOL;
            }
        } catch (\Exception $e) {
        }
    }

    public function getRoles()
    {
        $roles = [];
        try {
            $reflection = new ReflectionClass(new RolesList());

            foreach ($reflection->getConstants() as $label => $value) {
                if (substr($label, 0, 5) === "DESC_") {
                    continue;
                }
                $roles[constant("app\helpers\RolesList::$label")] =
                    constant("app\helpers\RolesList::DESC_$label");
            }
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }

        return $roles;
    }

    public function getPermissions()
    {
        $permissions = [];
        try {
            $reflection = new ReflectionClass(new PermissionsList());

            foreach ($reflection->getConstants() as $label => $value) {
                if (substr($label, 0, 5) === "DESC_") {
                    continue;
                }
                $permissions[constant("app\helpers\PermissionsList::$label")] =
                    constant("app\helpers\PermissionsList::DESC_$label");
            }
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }

        return $permissions;
    }

    public function createRoles()
    {
//        $this->createAdminRole();
        $auth = Yii::$app->authManager;

        foreach ($this->getRoles() as $ROLE => $DESCRIPTION) {
            try {
                $viewUsers = $auth->createRole($ROLE);
                $viewUsers->description = $DESCRIPTION;
                $auth->add($viewUsers);

                echo "ROLE: {$ROLE} CREATED SUCCESSFULLY" . PHP_EOL;
            } catch (\Exception $e) {
                echo "ROLE: {$ROLE} EXISTS" . PHP_EOL;
            }
        }
    }

    public function createRolesPermissions()
    {
        foreach (RolesPermissionsList::RolesChildren as $role => $children) {
            foreach ($children as $permission) {
                try {
                    $model = new AuthItemChild();
                    $model->parent = $role;
                    $model->child = $permission;
                    $model->save(false);

                    echo "{$role} permission {$permission} assigned." . PHP_EOL;
                } catch (\Exception $e) {
                    echo $e->getMessage();
                    echo "{$role} already has the permission {$permission}." . PHP_EOL;
                }
            }
        }
    }

    public function assignUsersRoles()
    {
        $users = User::find()->all();
        foreach ($users as $user) {
            $permissions = new AuthAssignment();
            $permissions->user_id = $user->id;
            $permissions->item_name = $user->role->role;
            $permissions->save(false);
        }
    }
}