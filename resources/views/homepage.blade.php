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

        .nav-item {
            margin-right: 20px;
        }

        .navbar-brand img {
            padding: 20px;
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

        footer {
            background-color: black;
            color: white;
            padding: 20px 0;
            flex-shrink: 0;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            /* Center the links horizontally */
            padding: 10px 0;
            /* Add padding for better appearance */
        }

        .footer-link {
            text-decoration: none;
            color: white;
            margin: 0 10px;
            /* Adjust the space between the links */
        }

        .footer-link:hover {
            text-decoration: underline;
        }

        ul {
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }
    </style>
</head>

<body class="background-image">
    <header class="w-100">
        <nav class="navbar navbar-expand-lg">

            <a class="navbar-brand" href="#">
                <img class="align-middle" src="{{ asset('images/F1Reg_logo.png') }}" alt="" width="auto"
                    height="90">
            </a>
            <div class="col-1"></div>

            <ul class="navbar-nav bg-white w-100 d-flex">
                <li class="nav-item" style="margin-left: 10px;"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Scoreboard</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Upcoming races</a></li>
                <li class="nav-item"><a href="#"><img class="my-2"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAdpJREFUaEPtmOtNxDAQhOc64SoBOuEqASqBTjgqASoBjRRL0eHY6511cobsn4t0djLfvvw4YHA7DK4fO8DWEewRgRsADwBuAdwB+ARwBvA1/fI5zCIBkvDHirpnAE9RBFEA9PRbgyhG5X6KTsO030OjAD4AMAItRohjy4Tc2AgAep4R8NgrgJNnYpqjArSmTk4rU8ld2CoAi7FWtDUHS0WtArxMLbMmsvQ/vc8ouEwF8BTvpVCpmK8BgEBuHe6JkxuVDpQiIXUiFWD4Ih6+jTINlE4kpY9UPLNWwi0Ea2HYrQRZWiHYOrmFcK/AUVuJeU+3bqfltJl/VO1CudWTICzudKDhGHr8HQDF8znMegCEibO8aAeweKnnmH8fgfkNBJ8ta0Eq4lTYbKXuduqNALsMV2CLYEsGEYYHG3apJmsFoGAK956Ba+KabytaACI2bjWAtGaYo2EFWEt8AjRvNSwATBseHdc2UzpZACJOXV746nm5BsBLWhbtlla8N6oBRNw6qPDFKJQA1i7cEuhiFEoAEQd21ftp/uLtXQlgy+K9BF+8vSsBXEP+z9eF7FV8CeA7Kv4B71ks5FEA6IOs1j8NEBD5/q+oLWT9FYhf2AFEB8rT9wjILhRf8AOPWlAxCRufwQAAAABJRU5ErkJggg=="
                            height="24"></a>
                </li>
            </ul>
        </nav>
    </header>


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

    <footer class="w-100">
        <h3 class="text-center" style="padding-top: 20px">F1Registration</h3>
        <div class="footer-links text-center">
            <a href="/contact" class="footer-link">Contact</a> |
            <a href="/faq" class="footer-link">FAQ</a> |
            <a href="/about" class="footer-link">About us</a>
        </div>
        <p class="text-center"><b>Copyright @ 2022 MRS</b></p>
    </footer>
</body>


</html>
