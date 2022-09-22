<!DOCTYPE html>
<?php include 'php/common_header.php' ?>
<link rel="stylesheet" href="css/notice.css">
<body>
  <div class="wrap">
    <?php include 'php/common_header_menu.php' ?>
    <div class="contents_wrap">
      <div class="container-fluid">
        <div class="banner flex">
          <div class="flex-direction">
            <h2>공지사항</h2>
            <span>한국산업기술시험원의 최근 소식을 만나보세요.</span>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="title flex">
          <h2>공지사항</h2>
          <div class="flex">
            <span>Home</span>
            <img src="images/icons/ic_next.png" alt="">
            <span>공지사항</span>
            <img src="images/icons/ic_next.png" alt="">
            <span class="on">공지사항</span>
          </div>
        </div>
        <div class="table notice_table">
          <table>
            <thead>
              <tr>
                <th>번호</th>
                <th>제목</th>
                <th>글쓴이</th>
                <th>등록일</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include "php/mysql.php";
                $nIndex = 1;
                $query="select subject,date,id from recruit_able_notice order by id desc";
                $result = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($result))
                {
                  echo "<tr style='cursor:pointer;' onclick='onNoticeView($row[2])'>
                    <td>$nIndex</td>
                    <td class='notitle'>[공지사항] $row[0]</td>
                    <td>관리자</td>
                    <td>$row[1]</td>
                  </tr>";
                  $nIndex++;
                }
                if($nIndex == 1)
                {
                  echo "<tr><td colspan=5>등록된 공지사항이 존재하지 않습니다.</td></tr>";
                }
                mysqli_close($con);
              ?>
            </tbody>
          </table>
          <!-- <div class="pager flex">
            <div class="btn_prev btn flex"><span class="hide">이전</span><img src="images/btns/btn_pager_prev.png" alt="이전"></div>
            <div class="pagernum flex">
              <span class="on">1</span>
              <span>2</span>
              <span>3</span>
            </div>
            <div class="btn_next btn flex"><span class="hide">다음</span><img src="images/btns/btn_pager_next.png" alt="다음"></div>
          </div> -->
        </div>
        <script>
          function onDetailViewClose()
          {
            $(".notice_detail_view").hide();
            $(".notice_table").fadeIn(400);
          }
          function onNoticeView(Id)
          {
            $.post("php/fnc/notice_detail_view.php",
            {
              Id : Id
            },
             function(data,status){
             if(status != "fail"){
               var arr = data.split("::::");
               $("#notice_title").html(arr[0]);
               $("#notice_date").html(arr[2]);
               $("#notice_detail_contents").html(arr[1]);

               $(".notice_table").hide();
               $(".notice_detail_view").fadeIn(400);

             }
             else
             {
              alert("네트워크 오류");
             }
            });


          }
        </script>
        <div class="table_view notice_detail_view">
          <div class="view_hd flex-direction">
            <h6 id='notice_title'>데이터 읽는중...</h6>
            <span id='notice_date'>데이터 읽는중...</span>
          </div>
          <div class="view_con">
            <div id='notice_detail_contents' style='font-weight:600;overflow:auto;font-size:16px;background-color:transparent;width:100%;height:400px;' readonly>
DB에서 가져오는중...
            </div>
          </div>
          <div class="btn_list_prev flex" onclick='onDetailViewClose()'><span>목록으로 돌아가기</span></div>
        </div>
      </div>
    </div>
    <?php include 'php/common_footer.php' ?>
  </div>
<?php include 'php/common_script.php' ?>
</body>
</html>
