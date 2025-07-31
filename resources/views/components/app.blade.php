@props(['title' => 'La Mia Applicazione', 'head_extra' => '', 'scripts_extra' => ''])

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Libreria - {{ $title }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            padding-top: 6rem;
        }

        main {
            flex-grow: 1;
        }

        .book-image {
            width: 100px;
            height: 150px;
            object-fit: cover;
            border-radius: 0.5rem;
            margin-right: 1.5rem;
            flex-shrink: 0;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, .075);
        }
    </style>

    {{ $head_extra }}
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <header>
        <x-nav />
    </header>

    <main class="container flex-grow-1">
        {{ $slot }}
    </main>

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    {{ $scripts_extra }}
</body>

</html>
