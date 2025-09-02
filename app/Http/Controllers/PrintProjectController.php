<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Symfony\Component\HttpFoundation\Response;

class PrintProjectController extends Controller
{
    public function __invoke(Project $project): Response
    {
        $project->load('resources.codes');

        return response()->view('print-project', compact('project'));
    }
}
