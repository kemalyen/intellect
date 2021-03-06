<?php
 

 namespace Corvus\Core\Models\Traits;

trait UserAttribute
{
    public function getUserRoleAttribute()
    {
        $role = [];
        $role = $this->roles ? $this->roles->first() : 'No role';
        return $role['display_name']; 
    }

    public function getIsActiveAttribute()
    {
        if ($this->active){
            return 'True';
        }
        return 'False';
    }   

    public function getIsConfirmedAttribute()
    {
        if ($this->confirmed){
            return 'True';
        }
        return 'False';
    }    

    public function getAccountNumberAttribute()
    {
        if ($this->profile){
            return $this->profile->account_number;
        }
        return '---';
    }

    public function getAccountGroupAttribute()
    {
        if ($this->profile){
            return $this->profile->account_group;
        }
        return '---';
    }    
}
