<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\VacancyLevel;

class LessonController extends Controller
{
    public function show(Lesson $lesson)
    {
        return view('lesson.show', compact('lesson'));
    }
}
