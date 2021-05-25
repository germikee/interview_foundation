<?php

namespace App\Http\Controllers;

use App\Http\Resources\RepositoryResource;
use App\Repository;
use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class GetStarredRepos extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $authUser = $request->user();

        if ($authUser->repositories->isEmpty()) {
            $token = Crypt::decryptString($authUser->github_token);

            config(['github.connections.main.token' => $token]);

            $user = GitHub::me()->show();

            $username = $user['login'];

            $repositories = GitHub::user()->starred($username);

            collect($repositories)->each(function ($repository) use ($authUser) {
                Repository::create([
                    'user_id' => $authUser->id,
                    'name' => $repository['name'],
                    'url' => $repository['html_url'],
                    'description' => $repository['description'],
                    'owner' => $repository['owner']['login'],
                    'avatar' => $repository['owner']['avatar_url'],
                ]);
            });
        }

        return RepositoryResource::collection($authUser->repositories);
    }
}
