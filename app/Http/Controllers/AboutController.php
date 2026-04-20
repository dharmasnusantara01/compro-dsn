<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;

class AboutController extends Controller
{
    public function __invoke()
    {
        $team = TeamMember::active()->get();

        return view('pages.about', compact('team'));
    }
}
