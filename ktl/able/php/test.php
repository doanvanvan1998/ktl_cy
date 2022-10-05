<?php
                      include ("able/php/mysql.php");
                      include("php/crypt.php");

                      $nIndex = 1;
                      $query="select id,username,phone,email,apply_num,result_check_num,result_check from recruit_able_user where apply_step=5  order by id desc";
                      $Uresult = mysqli_query($con,$query);
                      while($Urow = mysqli_fetch_array($Uresult))
                      {
                        $query="select user_address,user_detailAddress,sel_tab_num,step0_view_sel,step0_view_sel2,sel2_tab_num,sel3_tab_num,sel4_tab_num,data1,data2,data3,data4,data5,data6,data7,data8,check_phone,data12,data13 from apply_step_1 where userid='$Urow[0]'";
                        $ApplyResult1 = mysqli_query($con,$query);
                        $ApplyRow1 = mysqli_fetch_array($ApplyResult1);

                        $Urow[2] = Decrypt($Urow[2],$secret_key,$secret_iv);
                        $Urow[3] = Decrypt($Urow[3],$secret_key,$secret_iv);

                        echo "<tr><td>$nIndex</td><td>$Urow[4]</td><td>$Urow[1]</td><td>$Urow[2]</td><td>$Urow[3]</td><td>";
                        $strPdf = "../ktl/portfolio/".$Urow[0].".pdf";
                        if(file_exists("../ktl/portfolio/".$Urow[0].".pdf")) {
                            echo "<a href='$strPdf' target='_blank' class='btn btn-info'>새창으로 보기</a>";
                        }else{
                            echo "없음";
                        }
                        echo "</td><td><button class='btn btn-primary' onclick='onApplyView($Urow[0])'>지원페이지로 이동</button></td>";

                        if($Urow['result_check_num'] == 1) { echo "<td>최종제출</td>"; }
                        else if($Urow['result_check_num'] == 2) {
                          if($Urow['result_check'] == 1) echo "<td>서류통과</td>";
                          else echo "<td>서류 불합격</td>";
                        }
                        else if($Urow['result_check_num'] == 3) {
                          if($Urow['result_check'] == 1) echo "<td>면접통과</td>";
                          else echo "<td>면접 불합격</td>";
                        }
                        else if($Urow['result_check_num'] == 4) {
                          echo "<td>최종합격자</td>";
                        }

                        echo "</tr>";

                        $nIndex++;
                      }
                      mysqli_close($con);
                    ?>