<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>test</title>
	<link rel="stylesheet" href="https://cdn.plyr.io/3.6.9/plyr.css" />
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!-- <style>

.video-container {
position: relative;
padding-bottom: 56.25%;
padding-top: 0px;
height: 0;
overflow: hidden;
}

.video-container iframe {
position: absolute;
top:0;
left: 0;
width: 100%;
height: 100%;
}
</style>

<div class="video-container">

<iframe frameborder="0" width="640" height="480" src="https://scontent.cdninstagram.com/v/t66.36240-6/10000000_427302142171321_8047968040118729808_n.mp4?_nc_cat=104&ccb=1-5&_nc_sid=985c63&efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJvZXBfaGQifQ%3D%3D&_nc_ohc=cEHlyqkBMvUAX9x7F7Y&_nc_oc=AQkySqB8NuZfqPMBXFfmM-uHkmVBLkk5ugffP28DI5PSw6yOEiI1LASjRYD2nUYm5Oc&rl=1500&vabr=960&_nc_ht=scontent-ams4-1.xx&oh=8fbd2023de2b6c1dbf6316a9a4d95240&oe=61B43E5E" ; allowfullscreen="true" allow="autoplay"></iframe> -->

<!-- player -->
<div class="row p-5">
	<div style="width: 500px;">
		<video controls crossorigin playsinline poster="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg" id="player" style="--plyr-color-main: -webkit-linear-gradient(90deg, #ff55a5 0%, #ff5860 100%)">
			<!-- Video files -->
			<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" type="video/mp4" size="576">
			<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4" type="video/mp4" size="720">
			<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type="video/mp4" size="1080">
			<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1440p.mp4" type="video/mp4" size="1440">

			<!-- Caption files -->
			<track kind="captions" label="English" srclang="en" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt"
			    default>
			<track kind="captions" label="Français" srclang="fr" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt">

			<!-- Fallback for browsers that don't support the <video> element -->
			<a href="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" download>Download</a>
		</video>
	</div>
</div>

<!-- end player -->
	<!-- button load more -->
	<br />
  <div class="container box">
   <h3 align="center">Load More Data in Laravel using Ajax</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Post Data</h3>
    </div>
    <div class="panel-body">
     {{ csrf_field() }}
     <div id="post_data"></div>
    </div>
   </div>
   <br />
   <br />
  </div>
	<!-- end load more -->

<script src="https://cdn.plyr.io/3.6.9/plyr.polyfilled.js"></script>
<script>
  const player = new Plyr('#player');
</script>

<script>
$(document).ready(function(){
 
 var _token = $('input[name="_token"]').val();

 load_season('', _token);

 function load_season(id="", _token)
 {
  $.ajax({
   url:"{{ route('loadmore.load_season') }}",
   method:"POST",
   data:{id:id, _token:_token},
   success:function(data)
   {
    $('#load_more_button').remove();
    $('#post_data').append(data);
   }
  })
 }

 $(document).on('click', '#load_more_button', function(){
  var id = $(this).data('id');
  $('#load_more_button').html('<b>Loading...</b>');
  load_data(id, _token);
 });

});
</script>
</body>
</html>