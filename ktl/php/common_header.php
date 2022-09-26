<?php
  session_cache_expire(360);
  session_start();

  $today = date("Y-m-d H:i:s");
  $todate = date("Y-m-d");
?>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="#">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/slide.min.css">
  <link rel="stylesheet" href="css/common.css?v=<?=$today?>">
  <script src="js/jquery.js" charset="utf-8"></script>
  <script src="js/swiper.min.js" charset="utf-8"></script>



  <title>한국산업기술시험원</title>

</head>
