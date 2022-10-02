
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



}


