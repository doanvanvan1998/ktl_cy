<?php
  session_start();

  $_SESSION["m_user_id"] = "";
  session_unset(); // 세션제거
  session_destroy(); // 세션삭제
?>
