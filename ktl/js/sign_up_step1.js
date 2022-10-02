
function save(){
   $name = $("#field-name").val();
   $phone = $("#field-phone").val();
   $email = $("#field-email").val();
   $address = $("#field-address").val();
   $disabilities = $("input[name=disabilities]:checked","#form_step_1").val();
   $level_disabilities=$("#level_disabilities option:selected").val();
   $content_disabilities=$("#content_disabilities option:selected").val();
   $duty = $("input[name=duty]:checked","#form_step_1").val();
   $single_user = $("input[name=single_user]:checked","#form_step_1").val();
   $meritorious_person =  $("input[name=meritorious_person]:checked","#form_step_1").val();
   $low_benefit =  $("input[name=low_benefit]:checked","#form_step_1").val();
   $korea_migrate =$("input[name=korea_migrate]:checked","#form_step_1").val();
   $son_of_korea_migrate =$("input[name=son_of_korea_migrate]:checked","#form_step_1").val();

   $.post("php/fnc/signup_step1.php",
       {
          name: $name,
          phone:$phone,
          email:$email,
          address:$address,
          disabilities:$disabilities,
          level_disabilities:$level_disabilities,
          content_disabilities:$content_disabilities,
          duty:$duty,
          single_user:$single_user,
          meritorious_person:$meritorious_person,
          low_benefit:$low_benefit,
          korea_migrate:$korea_migrate,
          son_of_korea_migrate:$son_of_korea_migrate
       },
       function (data, status) {
          if (status != "fail") {
             alert("채용문의 접수가 완료되었습니다.");
             location.reload();
          } else {
             alert("네트워크 오류");
          }
       });







}


