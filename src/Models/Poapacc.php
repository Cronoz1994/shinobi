<?php

namespace Caffeinated\Shinobi\Models;

use Illuminate\Database\Eloquent\Model;

class Poapacc extends Model
{   
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'POAPACC';

    /**
     * The custom id table.
     *
     * @var string
     */
    protected $primaryKey = 'id_acc';


    /**
     * The attributes that are fillable via mass assignment.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description'];

    /**
     * Permissions can belong to many roles.
     *
     * @return Model
     */
    public function roles()
    {
        return $this->belongsToMany('\Caffeinated\Shinobi\Models\Poaprol', 'POAPROLA', 'id_acc', 'id_rol')->withTimestamps();
    }

    /**
     * Assigns the given role to the permission.
     *
     * @param int $roleId
     *
     * @return bool
     */
    public function assignRole($roleId = null)
    {
        $roles = $this->roles;

        if (!$roles->contains($roleId)) {
            return $this->roles()->attach($roleId);
        }

        return false;
    }

    /**
     * Revokes the given role from the permission.
     *
     * @param int $roleId
     *
     * @return bool
     */
    public function revokeRole($roleId = '')
    {
        return $this->roles()->detach($roleId);
    }

    /**
     * Syncs the given role(s) with the permission.
     *
     * @param array $roleIds
     *
     * @return bool
     */
    public function syncRoles(array $roleIds = [])
    {
        return $this->roles()->sync($roleIds);
    }

    /**
     * Revokes all roles from the permission.
     *
     * @return bool
     */
    public function revokeAllRoles()
    {
        return $this->roles()->detach();
    }
}
