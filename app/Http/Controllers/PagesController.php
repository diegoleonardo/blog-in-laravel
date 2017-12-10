<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = "Welcome To Laravel - Comming from server.";
        return view('pages.index', compact('title'));
    }

    public function about(){
        $title = "Welcome To About Page";
        return view('pages.about')->with('title', $title);
    }

    public function service(){
        $data = array(
            'title' => 'Welcome To Service Page.',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.service')->with($data);
    }
}
