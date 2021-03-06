<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCareerRoleMilestone extends Model
{
     protected $table = 'users_career_roles_milestones';

     protected $fillable=[
         'milestone_id',
         'description',
         'user_id',
         'assigned_id',
         'task',
         'reminder',
         'completed',
         'user_career_role_id',
     ];
    protected $casts = [
        'completed' => 'integer',
    ];

     public function user(){
         return $this->hasOne(User::class);
     }
     public function careerRoleMilestone(){
         return $this->hasOne(CareerRoleMilestone::class);
     }

    public function assignee() {
         return $this->belongsTo(User::class, 'assigned_id');
    }

}
