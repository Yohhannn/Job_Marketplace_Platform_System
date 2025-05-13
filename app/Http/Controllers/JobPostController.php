<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class JobPostController
{
    public function myJobPosts()
    {
        return view('pages.Find_Work.my_job_posts');
    }

    public function createJobPost(){
        return view('pages.Job_Post.post_job');
    }
}
