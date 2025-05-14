<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnglishLevel;
use App\Models\ExperienceLevel;
use App\Models\RoleCategory;

class JobPostController
{
    public function myJobPosts()
    {
        return view('pages.Find_Work.my_job_posts');
    }

    public function createJobPost()
    {
        $experienceLevels = ExperienceLevel::all();
        $englishLevels = EnglishLevel::all();

        // Load categories with their roles
        $roleCategories = RoleCategory::with('roles')->get();

        return view('pages.Job_Post.post_job', compact(
            'experienceLevels',
            'englishLevels',
            'roleCategories'
        ));
    }
}
