<?php

namespace App;

use App\Http\Requests\PermissionStoreRequest;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    use LogsActivity;

    protected $fillable = ['project_name','status','user_id'];

    protected static $logFillable = true;
    protected static $logName = 'projects';
    protected static $logOnlyDirty = true;


    public function setStatusAttribute($status)
    {
        $this->attributes['status'] = ($status)? 1 : 0;
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    // protected static function booted()
    // {
    //     static::created(function ($project) {
    //         Permission::create(['name' => $project->project_name]);
    //         auth()->user()->syncPermissions();
    //     });

    //     static::deleted(function ($project) {
    //         Permission::whereRaw('SUBSTRING_INDEX(name, \'.\', 1) = \'' . $project->project_name . '\'')->delete();
    //         auth()->user()->syncPermissions();
    //         // DB::delete ('delete from permissions where SUBSTRING_INDEX(name, \'.\', 1) = \'' . $project->project_name . '\'');
    //     });

    //     static::updated(function ($project) {
    //         if ($project->project_name != $project->getRawOriginal('project_name')) {
    //             DB::select('call update_permission(\'' . $project->getRawOriginal('project_name') . '\',\'' . $project->project_name . '\',\'' . '1\')');
    //             auth()->user()->syncPermissions();
    //         }
    //     });
    // }

}
