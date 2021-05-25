<?php

namespace App\Http\Controllers;

use App\Http\Resources\RepositoryResource;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $data = [
            'token' => $user->github_token
        ];

        if ($repositories = $user->repositories) {
            $data['repositories'] = RepositoryResource::collection($repositories);
        }

        return view('home')->with($data);
    }
}
