<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Тестовое задание</title>
</head>
<body>
    <div class="container">
        <form action="{{ route('index') }}" method="GET">
            <input type="text" class="form-control" placeholder="Поиск" aria-label="Поиск" name="subject">
            <button class="btn btn-primary" type="submit">Найти</button>
        </form>

        <div class="row">
            @foreach($repositories as $repository)
                <div class="col-sm">
                    <div class="card" style="width: 18rem; margin-bottom: 10px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $repository->getName() }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $repository->getAuthor() }}</h6>
                            <p class="card-text">
                                Watchers: {{ $repository->getWatchers() }}
                            </p>
                            <p class="card-text">
                                Stargazers: {{ $repository->getStars() }}
                            </p>
                            <a href="{{ $repository->getUrl() }}" class="card-link">Ссылка на репо</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
