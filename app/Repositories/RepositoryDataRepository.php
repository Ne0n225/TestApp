<?php

namespace App\Repositories;

use App\Models\RepositoryData\RepositoryData;
use Illuminate\Support\Collection;

class RepositoryDataRepository
{
    public function create(string $subject, string $data): RepositoryData
    {
        $repoData = new RepositoryData();

        $repoData->subject = $subject;
        $repoData->data = $data;
        $repoData->saveOrFail();

        return $repoData;
    }

    public function findBySubject(string $subject): ?RepositoryData
    {
        return RepositoryData::query()
            ->where('subject', '=', $subject)
            ->first();
    }

    public function findAll(): Collection
    {
        return RepositoryData::query()->get();
    }

    public function delete(int $id): void
    {
        $repoData = RepositoryData::query()->findOrFail($id);
        $repoData->delete();
    }
}
