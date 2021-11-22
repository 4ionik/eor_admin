<?php

namespace App\Helpers;

use App\Models\Project;
use App\Models\Post;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TrustedAuthHelper {

    public static function renderView(Project $proj, Post $wb){
        if ($wb->project_id == $proj->id && auth()->user()->can($proj->project_name . '.' . $wb->post_title)){
            $title = "Post Details";
            $post = $wb->with(['project','user']);
            return view('renderView', compact('title', 'post'));
        }
        abort(404);
    }
}
