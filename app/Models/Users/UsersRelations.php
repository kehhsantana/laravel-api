<?php

namespace App\Models\Users;
Trait UsersRelations 
{
    public function type()
    {
        return $this->belongsTo('App\Models\UserType\UserType', 'user_type_id', 'id');
    }
}