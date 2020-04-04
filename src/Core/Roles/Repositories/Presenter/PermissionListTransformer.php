<?php

namespace Core\Roles\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class PermissionListTransformer extends TransformerAbstract
{
    public function transform(\Core\Roles\Models\Permission $permission)
    {
        return [
            'id'                => $permission->getRouteKey(),
            'name'              => $permission->name,
            'slug'              => $permission->slug,
            'description'       => $permission->description,
            'created_at'        => format_date($permission->created_at),
            'updated_at'        => format_date($permission->updated_at),
        ];
    }
}
