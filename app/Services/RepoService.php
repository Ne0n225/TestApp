<?php

namespace App\Services;

use App\Models\RepositoryData\RepositoryData;
use App\Models\RepositoryData\RepositoryInfoDto;
use App\Repositories\RepositoryDataRepository;
use Illuminate\Support\Collection;

class RepoService
{
    private RepositoryDataRepository $repositoryDataRepository;
    private RepoFetchService $repoFetchService;

    public function __construct(RepositoryDataRepository $repositoryDataRepository, RepoFetchService $repoFetchService)
    {
        $this->repositoryDataRepository = $repositoryDataRepository;
        $this->repoFetchService = $repoFetchService;
    }

    /**
     * @return RepositoryInfoDto[]
     */
    public function getBySubject(?string $subject): array
    {
        if ($subject === null) {
            return [];
        }

        $repositories = $this->repositoryDataRepository->findBySubject($subject);

        if ($repositories === null) {
            return $this->repoFetchService->fetch($subject)->getInfo();
        }

        return $repositories->getInfo();
    }

    public function findAll(): Collection
    {
        return $this->repositoryDataRepository->findAll();
    }

    public function delete(int $id): void
    {
        $this->repositoryDataRepository->delete($id);
    }
}
