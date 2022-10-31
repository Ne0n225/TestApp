<?php

namespace App\Services;

use App\Models\RepositoryData\RepositoryData;
use App\Repositories\RepositoryDataRepository;
use GuzzleHttp\Client;

class RepoFetchService
{
    private RepositoryDataRepository $repositoryDataRepository;

    public function __construct(RepositoryDataRepository $repositoryDataRepository)
    {
        $this->repositoryDataRepository = $repositoryDataRepository;
    }

    public function fetch(string $subject): RepositoryData
    {
        $url = 'https://api.github.com/search/repositories?q=';
        $client = new Client();

        $response = $client->request('GET', $url . $subject);
        $bodyContents = $response->getBody()->getContents();

        return $this->repositoryDataRepository->create($subject, $bodyContents);
    }
}
