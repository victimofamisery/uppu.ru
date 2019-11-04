<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        

        <!-- Styles -->
        <style>
        </style>
    </head>
    <body>
        <form action="{{ route('image.upload') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="file" name="image">
            </div>
            <button class="btn btn-default" type="submit">Загрузить</button>
        </form>
        @isset($path)        
        <a href="{{ asset('/storage/'.$path)}}">Загруженный файл</a><br>
        @endisset
        <a href="../list">Список файлов</a>

    </body>
</html>
