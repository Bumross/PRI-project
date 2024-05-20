<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="./assets/ajax.js"></script>
    <title>
        <?= TITLE ?>
    </title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 0;
        }

        main {
            width: 80%;
            max-width: 1200px;
            margin: 20px 0;
        }

        nav ul {
            width: 100%; /* Ensure the navigation list stretches to fill the entire width */
        }
    </style>
</head>

<body>
