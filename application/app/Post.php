<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Post extends Model
{
    use LogsActivity;
    protected $fillable = [
        'post_title',
        'post_body',
        'featured_image',
        'status',
        'project_id',
        'user_id',
    ];
    protected static $logFillable = true;
    protected static $logName = 'post';
    protected static $logOnlyDirty = true;
    public function setStatusAttribute($status)
    {
        $this->attributes['status'] = ($status)? 1 : 0;
    }
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected static function booted()
    {
        static::created(function ($post) {
            $project = $post->project()->get()[0];
            Permission::create(['name' => $project->project_name . '.' . $post->post_title]);
            auth()->user()->syncPermissions();
        });

        static::deleted(function ($post) {
            $project = $post->project()->get()[0];
            Permission::where('name', $project->project_name . '.' . $post->post_title)->delete();
            auth()->user()->syncPermissions();
        });

        static::updated(function ($post) {
            if ($post->post_title != $post->getRawOriginal('post_title')) {
                DB::select('call update_permission(\'' . $post->getRawOriginal('post_title') . '\',\'' . $post->post_title . '\',\'' . '2\')');
                auth()->user()->syncPermissions();
            }
        });
    }
}
