<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\RepoFetchService;
use App\Services\RepoService;
use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    private RepoFetchService $repoFetchService;
    private RepoService $repoService;

    public function __construct(RepoFetchService $repoFetchService, RepoService $repoService)
    {
        $this->repoFetchService = $repoFetchService;
        $this->repoService = $repoService;
    }

    public function fetch(Request $request)
    {
        $subject = $request->get('subject');

        if ($subject === null) {
            return response(null, 400);
        }

        $data = $this->repoFetchService->fetch($subject);
        return response(['id' => $data->id], 201);
    }

    public function get()
    {
        $repositories = $this->repoService->findAll();
        $response = [];

        foreach ($repositories as $repository) {
            $repos = [];

            foreach ($repository->getInfo() as $repoDto) {
                $repos[] = [
                    'name' => $repoDto->getName(),
                    'author' => $repoDto->getAuthor(),
                    'stargazers_count' => $repoDto->getStars(),
                    'watchers_count' => $repoDto->getWatchers(),
                    'url' => $repoDto->getUrl(),
                ];
            }

            $response[] = [
                'id' => $repository->id,
                'subject' => $repository->subject,
                'repositories' => $repos,
            ];
        }

        return $response;
    }

    public function delete(int $id)
    {
        $this->repoService->delete($id);
    }
}
