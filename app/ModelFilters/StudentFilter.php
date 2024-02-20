<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class StudentFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function search($search)
    {
        return $this->when($search, function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->whereRelation('classroom', 'name', 'like', "%$search%");
            })
            ->orWhere(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('nis', 'like', "%$search%")
                    ->orWhere('gender', 'like', "%$search%");
            });
        });
    }
}
