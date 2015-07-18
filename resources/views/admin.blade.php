<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta id="jwt" content="{{ $token }}">
    <title>Radium</title>
    <link rel="stylesheet" href="/css/admin.css">
</head>

<body class="container">

    <div id="app">
        <component is="@{{ currentView }}" params="@{{params}}"></component>
    </div>

    <script src="/js/admin.js"></script>
</body>
</html>