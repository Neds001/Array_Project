<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Movies</title>
</head>
<body>
<h1>NEXFLEX</h1>

<?php
$dir = 'movies';
$files =scandir($dir);

//pre_r($files);

function pre_r($array){
echo '<pre>';
print_r($array);
echo '</pre>';
}
$files = array_diff($files, array('..', '.'));

//pre_r($files);

$files = array_values($files);

//pre_r($files);

$movies = array();

for  ($i = 0; $i <count($files); $i++){

preg_match("!(.*?)\((.*?)\)!",$files[$i],$results);
$movie_name = str_replace('_', ' ', $results[1]);
$movie_name =  ucwords($movie_name);

$movies[$movie_name]['image'] = $files[$i];
$movies[$movie_name]['year'] = $results[2];


}

echo "<table id = 'movies' cellpadding = 50>";
echo "<tr class = 'odd'>";

foreach ($movies as $movie_name => $info) {
// code...
$content = "<td><span class = 'name'> $movie_name</span><br />"
. "<img src = 'movies/$info[image]'><br />"
. "<span class = 'year'>( $info[year] ) </span></td>";

echo $content;
}

echo "</tr></table>";

?>

<style>
#movies{
background-color: #000;
color: #fff;
font: 11pt Calibri;
}
h1{
	color: #fff;
	text-align: center;
}
tr.header{
background-color: #111f4e;
color: #fff;
font: bold 11pt Calibri;
}
tr.odd{
background-color: #18182b;

}
tr.even{
background-color: #141423;

}
img {
  padding: 10px;
  transition: transform .3s; /* Animation */
  width: 220px;
  height: 326px;
  margin: 0 auto;
}
img:hover{
	transform: scale(1.1);
	background-color: #bfbfbf;
}


 
td{
text-align: center;
}
span.year{
color: #ccc;
font-size: 18px;
}
span.name{
font-size: 18px;
font-weight: bold;
}
body{
margin: 0;
padding: 0;
background-color: #141423;
}
</style>


</body>
</html>