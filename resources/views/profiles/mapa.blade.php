@extends('layouts.app')
@section('content')
<head>
  <title>mapa</title>
  <link rel="stylesheet" href="{{ URL::asset('css/general.css') }}" type="text/css">
</head>
<body>
    <div id="mapa"></div>
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyA6QQ9aMWWum0lq1jtSIhi7Tc5Jsn9xsZc"></script> 
    <script>
      google.maps.event.addDomListener(window,"load",function(){
        var mapElement = document.getElementById('mapa')
        var map = new google.maps.Map(mapElement,{
          center:{
            lat: 20.7049947,
            lng: -103.32817690000002
          },
          zoom:15
        })
      })
    </script>
</body>
@endsection