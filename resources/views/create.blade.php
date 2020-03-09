<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>
    </head>

    <body bgcolor="#002b36">

    <form action="/paste/public" method="post" id="paste-form" enctype="multipart/form-data">
      <input type="file" name="file" id="file"><br/>
      <textarea form="paste-form" name="content" rows="10" cols="70"></textarea><br/>
      <input type="submit" value="Submit">
    </form>

    </body>

</html>
