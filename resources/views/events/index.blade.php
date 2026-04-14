<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programme du Théâtre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-center mb-5">🎭 Programme du Théâtre Universitaire</h1>

    <div class="row">
        @foreach($events as $event)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $event->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            📅 {{ \Carbon\Carbon::parse($event->event_date)->format('d/m/Y à H:i') }}
                        </h6>
                        <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                    </div>
                    <div class="card-footer bg-white border-top-0">
                        <span class="badge bg-success">{{ $event->capacity }} places dispo</span>
                        <button class="btn btn-sm btn-outline-primary float-end">Réserver</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>