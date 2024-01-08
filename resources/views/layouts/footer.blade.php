<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
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
    </style>
</head>

<body>
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
