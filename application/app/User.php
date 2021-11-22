<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;
use phpDocumentor\Reflection\Types\Boolean;
use App\Helpers\MenuGenerationHelper;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles, LogsActivity, ThrottlesLogins, HasApiTokens;
    protected static $ignoreChangedAttributes = ['password'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_number', 'profile_photo', 'status'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected static $logFillable = true;
    protected static $logName = 'user';
    protected static $logOnlyDirty = true;
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setStatusAttribute($status)
    {
        $this->attributes['status'] = ($status)? 1 : 0;
    }
    public function setPasswordAttribute($password)
    {
        if(Hash::needsRehash($password)){
            $password = Hash::make($password);
            $this->attributes['password'] = $password;
        }
    }
    public function projects()
    {
        return $this->hasMany('App\Project');
    }
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function pagevisitlogs(){
        return $this->hasMany(PageVisitLog::class);
    }

    public function authLogs(){
        return $this->hasMany(AuthLog::class);
    }

    // public function getPermittedHierarchy(){
    //     $projs = Project::with('posts')->get();
    //     $perms = $this->getAllPermissions();
    //     $arr = [];

    //     foreach ($projs as $i => $proj){
    //         if($this->can($proj->project_name) || MenuGenerationHelper::projChecker($perms, $proj->project_name)){
    //             array_push($arr, $proj);
    //             foreach ($proj->posts as $j=> $post){
    //                 if (!$this->can($proj->project_name . '.' . $post->post_title) && !MenuGenerationHelper::wbChecker($perms, $post->post_title)){
    //                     unset($arr[$i]->posts[$j]);
    //                 }
    //             }
    //         }    
    //     }
    //     return $arr;
    // }

    // public function getPermittedProject(){
    //     $projs = $this->getPermittedHierarchy();
    //     $proj_ids = [];

    //     foreach ($projs as $proj) {
    //         array_push($proj_ids, $proj->id);
    //     }

    //     return $proj_ids;
    // }

    // public function getPermittedViews(){
    //     $projs = $this->getPermittedHierarchy();
    //     $view_ids = [];

    //     foreach ($projs as $proj) {
    //         foreach ($proj->posts as $wb){
    //             array_push($view_ids, $wb->id);
    //         }
    //     }

    //     return $view_ids;
    // }

}
