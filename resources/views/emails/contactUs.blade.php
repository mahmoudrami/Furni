<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        <div>
            <h1>welcome Our website</h1>
            <h4>name : {{ $data['first_name'] }} {{ $data['last_name'] }}</h4>
            <h4>email: {{ $data['email'] }}</h4>
            <h4>message: {{ $data['message'] }}</h4>
        </div>
    </body>

</html>
