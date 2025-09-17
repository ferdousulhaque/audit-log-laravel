<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Feature Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
<body class="bg-light py-5">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Feature Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light py-5">
<div class="container">

    <h1 class="mb-4">Feature Settings Input</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('featuresettings.store') }}">
        @csrf

        <div class="mb-3">
            <label for="category_name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="category_name" name="category_name" maxlength="100" value="{{ $category_name }}" required>
        </div>

        <div class="mb-3">
            <label for="settings" class="form-label">Settings (JSON)</label>
            <textarea class="form-control" id="settings" name="settings" rows="4" required>{{ json_encode($settings) }}</textarea>
            <div class="form-text">Provide valid JSON, e.g. {"key": "value"}</div>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="enable" name="enable" value="1" {{ $enable ? 'checked' : '' }}>
            <label class="form-check-label" for="enable">Enable</label>
        </div>

        <div class="mb-3">
            <label for="details" class="form-label">Details</label>
            <textarea class="form-control" id="details" name="details" rows="3" maxlength="500">{{ $details }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>