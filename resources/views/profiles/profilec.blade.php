<html>
  <head>
    <title>perfil de usuario</title>
  </head>
  <body>
    @foreach($tasks as task)
    {{ $task->name }}
    @endforeach
  </body>
</html>