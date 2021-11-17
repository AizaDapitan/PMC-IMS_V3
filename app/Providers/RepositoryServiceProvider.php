<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    private $group = array(
        // Role
        array(
            'interface' => 'App\Repositories\Interfaces\RoleRepositoryInterface',
            'repository' => 'App\Repositories\RoleRepository',
            'service' => 'App\Services\RoleService',
            'model' => [
                'App\Role',
            ],
        ),

        // Permission
        array(
            'interface' => 'App\Repositories\Interfaces\PermissionRepositoryInterface',
            'repository' => 'App\Repositories\PermissionRepository',
            'service' => 'App\Services\PermissionService',
            'model' => [
                'App\Permission',
            ],
        ),
        
        // Role Access Rights
        array(
            'interface' => 'App\Repositories\Interfaces\RoleRightRepositoryInterface',
            'repository' => 'App\Repositories\RoleRightRepository',
            'service' => 'App\Services\RoleRightService',
            'model' => [
                'App\RolesPermissions',
            ],
        ),
        // User Access Rights
        array(
            'interface' => 'App\Repositories\Interfaces\UserRightRepositoryInterface',
            'repository' => 'App\Repositories\UserRightRepository',
            'service' => 'App\Services\UserRightService',
            'model' => [
                'App\UsersPermissions',
            ],
        ),    

        // Users
        array(
            'interface' => 'App\Repositories\Interfaces\UserRepositoryInterface',
            'repository' => 'App\Repositories\UserRepository',
            'service' => 'App\Services\UserService',
            'model' => [
                'App\User'
            ],
        ),        
 
    );
    public function register()
    {
        foreach ($this->group as $key => $item) {
            $this->app->bind($item['interface'], function ($app) use ($item) {
                if (is_array($item['model'])) {
                    $models = [];
                    foreach ($item['model'] as $model) {
                        $models[] = new $model();
                    }
                    return new $item['repository'](...$models);
                } else {
                    return new $item['repository'](new $item['model']());
                }
            });
            $this->app->bind($item['service'], function ($app) use ($item) {
                return new $item['service'](
                    $app->make($item['interface'])
                );
            });
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
