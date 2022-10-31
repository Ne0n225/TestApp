<?php

namespace App\Http\Controllers;

use App\Services\RepoService;
use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    private RepoService $repoService;

    public function __construct(RepoService $repoService)
    {
        $this->repoService = $repoService;
    }

    public function index(Request $request)
    {
        $subject = $request->get('subject');
        $repositories = $this->repoService->getBySubject($subject);

        return view('index', ['repositories' => $repositories]);
    }
}
