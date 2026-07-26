<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List App</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 0 20px; color: #222; }
        h1 { color: #2c3e50; }
        a { color: #2563eb; text-decoration: none; }
        a:hover { text-decoration: underline; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #f4f4f4; }
        .btn { display: inline-block; padding: 8px 14px; background: #2563eb; color: #fff; border-radius: 4px; border: none; cursor: pointer; }
        .btn-danger { background: #dc2626; }
        .alert { background: #dcfce7; color: #166534; padding: 12px; border-radius: 4px; margin: 16px 0; }
        .error { color: #dc2626; font-size: 0.9em; }
        form.inline { display: inline; }
        input { padding: 8px; width: 100%; box-sizing: border-box; margin-bottom: 4px; }
        label { font-weight: bold; display: block; margin-top: 12px; }
    </style>
</head>
<body>
    <h1>📇 Contact List</h1>

    @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    @yield('content')
</body>
</html>
