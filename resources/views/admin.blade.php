@extends('bootstrap.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .buttonContainer {
            width: 20%;
            margin: 0 40% 0 40%;
        }

        .button {
            padding: 10px;
            margin: 5px 0 5px 0;
        }
    </style>
</head>

<body class="bg-dark">
    <h1 class="text-white text-center">Welcome to the admin page!</h1>
    <div class="buttonContainer">
        <a href="users"><button class="bg-black w-100 button text-white">Users</button></a>
        <a href="results"><button class="bg-black w-100 button text-white">Results</button></a>
    </div>
</body>

</html>
