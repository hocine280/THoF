<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @yield('fichierMeta')
    <title>THoF</title>

    <!-- Favicons -->
    <link href="{{ asset('img/logo.png') }}" rel="icon">

    <!-- Fichier CSS-->
        <link rel="stylesheet" href="{{ asset('vendor/aos/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">        
        @yield('fichierCSS')
    <!-- Fin Fichier CSS -->
    
</head>
<body>

    <!-- Contenu de la Page -->
        @yield('content')
    <!-- Fin Contenu de la Page -->

    <!-- Fichier JS -->
        <script src="{{ asset('vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        @yield('fichierJS') 
    <!-- Fin Fichier JS -->

</body>
</html>