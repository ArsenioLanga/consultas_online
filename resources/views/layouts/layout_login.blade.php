<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Privete Area</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/bootstrap.min.css')}}">
    <script scr="{{asset('assets/jquery.min.js')}}"></script>
    <style>

        body {
            background-color: green;
            color: #fff;
            }

        #form input:focus, #form textarea:focus{
            box-shadow: none;
            border: 1px solid #00ffe0;
            transition: 1.5s ease-in;
            font-size: 16px;
            color: black;
        }


        #regForm {
            background-color: rgb(21, 133, 54);
            margin: 10px auto;
            font-family: Raleway;
            padding: 30px;
            width: 80%;
            height: 70vh;
            min-width: 300px;
            color: #fff;
            border-radius: 1px solid #000;
            box-shadow: 4px 4px 4px 4px #000; 
            }

            div a{
            padding-right: 15px;
            text-decoration: none;
            text-transform: none;
            color: hsl(155, 79%, 49%);
            }

            div a:hover{
                text-decoration: none; 
                color: hsl(156, 94%, 13%);
            }

       
    </style>

</head>
<body>
    
    @yield('content')

   
    <script src="{{asset('assets/bootstrap/bootstrap.bundle.min.js ')}}"></script>
</body>
</html>