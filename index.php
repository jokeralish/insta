<!DOCTYPE html>
<!--
CREATED BY ALI AHMADI ( ALISH JOKER )
COPYRIGHT &copy; 2018
ALL RIGHT RESERVED


-->
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<!-- Bootstrap Start -->
<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/cerulean/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/cerulean/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> 
<!-- Bootstrap Finish -->

<!-- Meta Start -->
<meta charset="UTF-8">
<meta name="description" content="Download Instagram Picture or Video, Support Instagram Multi Media Post">
<meta name="keywords" content="Instagram Multi Downloader, Instagram Downloader, Instagram, Download, Post Downloader, Video Downloader, Picture Download, Multi Picture Downloader, Multi Instagram, Instagram Multi, Video Multi, Multi Downloader">
<meta name="author" content="Faraaz Ahmad">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Meta Finish -->

<title>اینستاگرام  دانلودر</title>
</head>
<style>
.container {
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
  padding-top: 15px;
  width:65%;
}
</style>
<body>
<div class="container">
<div class="alert alert-success" role="alert">
<center>
Instagram Multi Downloader<br/>Created By <b>ALISH JOKER</b>
</center>
</div>
<!-- Info -->
<div class="panel panel-success">
  <div class="panel-heading"><center><b>اینستاگرام دانلود</b></center></div>
  <div class="panel-body">
    <!-- Form Start -->
<form method="GET" action="./index.php">
  <div class="form-group">
    <label for="email">Instagram Post URL :</label>
    <input type="text" class="form-control" name="post" placeholder="لینک پست ارسال کنید">
  </div>
  <center><button type="submit" class="btn btn-success">Submit</button><br/><br/>Copyright &copy; 2018 - ALI AHMADI </center>
</form>
   <!-- Form end -->
  </div>
</div>
<!-- Info -->
<?php
if($_GET['post']) {
$uri = file_get_contents("http://farzain.xyz/api/ig_post.php?id=".$_GET['post']);
$json = json_decode($uri, TRUE);
?>
<div class="panel panel-success">
  <div class="panel-heading"><center><b>Result</b></center></div>
  <div class="panel-body">
    <!-- Form Start -->
<center>
<?
if($json['pict_url']['0']) {
for($i=0; $i < count($json['pict_url']); $i++) {
$e = $i+1;
if($json['video_url'][$i]) {
$media = $json['video_url'][$i];
$format = "Video";
} elseif(!$json['video_url'][$i]) {
$media = $json['pict_url'][$i];
$format = "Picture";
}
echo '<a href="'.$media.'">';
echo '<button class="btn btn-success">دانلود '.$format.' - '.$e.'</button>';
echo '</a>';
echo "<br/><br/>";
}
} elseif(!$json['pict_url']['0'] && $json['first_video']) {
echo '<a href="'.$json['first_video'].'">';
echo '<button class="btn btn-success">دانلود  فیلم</button>';
echo '</a>';
} elseif(!$json['pict_url']['0'] && !$json['first_video']) {
echo '<a href="'.$json['first_pict'].'">';
echo '<button class="btn btn-success">دانلود  عکس</button>';
echo '</a>';
}
?>
<? } ?>
</center>
  </div>
</div>
<!-- Info End -->
</div>


</body>
</html>