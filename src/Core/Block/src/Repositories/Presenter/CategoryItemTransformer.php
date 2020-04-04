<?php

namespace Core\Block\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class CategoryItemTransformer extends TransformerAbstract
{
    public function transform(\Core\Block\Models\Category $category)
    {
        return [
            'id'     => $category->getRouteKey(),
            'name'   => $category->name,
            'status' => $category->status,
        ];
    }
}
