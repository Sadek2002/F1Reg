@extends('boostrap.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .background-image {
            background-image: url('images/background-image.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            flex: 1;
        }

        table {
            border-radius: 10px;
            border: 1px solid white;
            background-color: #484444;
            margin: auto;
            width: 50%;
            z-index: 1;
            position: relative;
        }

        table.text-white {
            border-collapse: separate;
            border-spacing: 10px;
        }
    </style>
</head>

<body class="background-image">
    @include('layouts.header');


    <div class="container mt-5">
        <table class="text-white mb-5">
            <tr>
                <th colspan="3">Scoreboard Latest Race</th>
            </tr>
            <tr>
                <td style="width: 10%">#</td>
                <td style="width: 80%">Username</td>
                <td style="width: 10%">Time</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Sadek2002</td>
                <td>12:1002</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Sadek2002</td>
                <td>12:1002</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Sadek2002</td>
                <td>12:1002</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Sadek2002</td>
                <td>12:1002</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Sadek2002</td>
                <td>12:1002</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Sadek2002</td>
                <td>12:1002</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Sadek2002</td>
                <td>12:1002</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Sadek2002</td>
                <td>12:1002</td>
            </tr>
            <tr>
                <td>9</td>
                <td>Sadek2002</td>
                <td>12:1002</td>
            </tr>
            <tr>
                <td>10</td>
                <td>Sadek2002</td>
                <td>12:1002</td>
            </tr>
        </table>
    </div>
    @include('layouts.footer');
</body>

</html>
