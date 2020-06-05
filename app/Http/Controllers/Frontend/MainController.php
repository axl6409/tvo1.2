<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view('frontend.pages.home');
    }

    public function clan()
    {
        return view('frontend.pages.clan');
    }

    public function guides()
    {
        $categories = Category::all();
        return view('frontend.pages.guides.index', compact('categories'));
    }

    public function getGuzzleRequest()
    {
        $client = new Client();
        $request = $client->request('GET','https://www.bungie.net/en/OAuth/Authorize', [
            'key' => 'd1cf7e1500084cfb8c11b7432556859f',
        ]);
        $response = $request->getBody();
        dd($response);
    }
}
