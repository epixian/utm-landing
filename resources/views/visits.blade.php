<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name', 'UTM Landing') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="font-sans">
    <div class="container mx-auto my-10">
        <a href="/create">Create a new visit</a>
        <a href="/visits/json">View as JSON</a>
        <a href="/visits/csv">Download CSV</a>
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Source</td>
                    <td>Medium</td>
                    <td>Campaign</td>
                    <td>Term</td>
                    <td>Content</td>
                    <td>First</td>
                    <td>Last</td>
                    <td>Approved</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($visits as $visit)
                <tr>
                    <td>{{ $visit->id }}</td>
                    <td>{{ $visit->utm_source }}</td>
                    <td>{{ $visit->utm_medium }}</td>
                    <td>{{ $visit->utm_campaign }}</td>
                    <td>{{ $visit->utm_term }}</td>
                    <td>{{ $visit->utm_content }}</td>
                    <td>{{ json_decode(base64_decode($visit->utm_term))->first_name }}</td>
                    <td>{{ json_decode(base64_decode($visit->utm_term))->last_name }}</td>
                    <td>{{ json_decode(base64_decode($visit->utm_term))->approved }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>