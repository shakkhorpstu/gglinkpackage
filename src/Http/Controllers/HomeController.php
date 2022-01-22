<?php

namespace Mahmud\GglinkTest\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * landing page function
     */
    public function index()
    {
        $errors = [];
        return view('pages::index', compact('errors')); // return to the landing page
    }
}
