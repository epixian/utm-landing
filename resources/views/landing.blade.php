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
    <div id="root" class="container my-10 mx-auto">
        <a href="/visits">Visits</a>
        <h1 class="text-default">Hi, {{ $userdata->first_name }}</h1>
        <main>
            @isset($userdata->approved)
            You have been pre-approved for a mortgage up to {{ $userdata->approved }}!
            @else
            You could be pre-approved!
            @endisset
            <form action="/click" method="POST">
                @csrf
                <input type="hidden" name="visit_id" value="{{ $visit_id }}">
                <input type="hidden" name="utm_term" value="{{ base64_encode(json_encode($userdata)) }}">
                <button type="submit" class="button rounded bg-blue mt-4 px-4 py-2 text-white">Get started</button>
            </form>
            
        </main>
    </div>
</body>
</html>