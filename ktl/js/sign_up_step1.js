$('#signup_form').submit(function (e) {
    e.preventDefault();
    let userphone = $("#userphone").val() + $("#userphone2").val() + $("#userphone2").val();
    if (validate()) {
        $.post("php/fnc/save_user_signup.php", {
                username: $("#username").val(),
                userphone: userphone,
                useremail: $("#useremail").val(),
                userpass: $("#userpass").val(),
                acept_rule: sessionStorage.getItem("checked"),
                rand_code: Math.floor(Math.random() * 1000000) + 1
            },
            function (data, status) {
                if (status != "fail") {
                    // alert("채용문의 접수가 완료되었습니다.");
                    // location.reload();
                } else {
                    alert("네트워크 오류");
                    return;
                }
            });
        if ($("input[name=accuracy]:checked", "#signup_form").val() == 1) {
            window.location.href = "../../../ktl_cy/ktl/verify_email.php?email=" + $("#useremail").val();
        } else {
            window.location.href = "../../../ktl_cy/ktl/verify_phone.php?phone=" + userphone.valueOf();
        }
    }
})


function save() {
    $address = $("#field-address").val();
    $file = null;
    if (document.querySelector('#writer').files.length > 0) {
        $file = document.querySelector('#writer').files[0];
    }
    $disabilities = $("input[name=disabilities]:checked", "#form_step_1").val();
    $level_disabilities = $("#level_disabilities option:selected").val();
    $content_disabilities = $("#content_disabilities option:selected").val();
    $duty = $("input[name=duty]:checked", "#form_step_1").val();
    $single_user = $("input[name=single_user]:checked", "#form_step_1").val();
    $meritorious_person = $("input[name=meritorious_person]:checked", "#form_step_1").val();
    $low_benefit = $("input[name=low_benefit]:checked", "#form_step_1").val();
    $korea_migrate = $("input[name=korea_migrate]:checked", "#form_step_1").val();
    // $son_of_korea_migrate = $("input[name=son_of_korea_migrate]:checked", "#form_step_1").val();

    const formData = new FormData();
    formData.append('address', $address);
    formData.append('file', $file);
    formData.append('disabilities', $disabilities);
    formData.append('level_disabilities', $level_disabilities);
    formData.append('content_disabilities', $content_disabilities);
    formData.append('duty', $duty);
    formData.append('single_user', $single_user);
    formData.append('meritorious_person', $meritorious_person);
    formData.append('low_benefit', $low_benefit);
    formData.append('korea_migrate', $korea_migrate);
    // formData.append('son_of_korea_migrate', $son_of_korea_migrate);

    $.ajax({
        url: 'php/fnc/signup_step1.php',
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data, status) {
            if (status != "fail") {
                alert("채용문의 접수가 완료되었습니다.");
                $('.tab-item').eq(0).removeClass('active');
                $('.tab-item').eq(1).addClass('active');
                $('.tab-content').eq(0).addClass('hidden');
                $('.tab-content').eq(1).removeClass('hidden');
                // location.reload();
            } else {
                alert("네트워크 오류");
            }
        },
        error: function (data) {
            alert('네트워크 오류')
        }
    });
}

function validate() {
    if (!sessionStorage.getItem('checked')) {
        document.querySelector('.errorCheck').style.color = 'red';
        document.querySelector('.errorCheck').innerHTML = '필수 항목에 동의해주세요.'
        document.querySelector('.btnFocus').focus();
        return;
    } else {
        document.querySelector('.errorCheck').innerHTML = '확인 완료';
        document.querySelector('.errorCheck').style.color = 'blue';
    }
    if (!document.querySelector('#username').value) {
        document.querySelector('.errorName').innerHTML = '당신의 이름을 입력하세요'
        document.querySelector('#username').focus();
        return;
    } else {
        document.querySelector('.errorName').innerHTML = ''
    }
    // validate phone using regex number phone in korean
    // if (!document.querySelector('#userphone').value.match(/^(01[016789]{1}|02|0[3-9]{1}[0-9]{1})-?([0-9]{3,4})-?([0-9]{4})$/)) {
    //     document.querySelector('.errorPhone').innerHTML = '휴대전화 번호를 입력하세요'
    //     document.querySelector('#userphone').focus();
    //     return;
    // } else {
    //     document.querySelector('.errorPhone').innerHTML = ''
    // }
    if (!document.querySelector('#useremail').value) {
        document.querySelector('.errorEmail').innerHTML = '이메일을 입력하세요'
        document.querySelector('#useremail').focus();
        return;
    } else {
        document.querySelector('.errorEmail').innerHTML = ''
    }
    if (!document.querySelector('#useremail_check').value) {
        document.querySelector('.errorEmail').innerHTML = '이메일을 확인해주세요'
        document.querySelector('#useremail_check').focus();
        return;
    } else {
        document.querySelector('.errorEmail').innerHTML = ''
    }
    if (document.querySelector('#useremail_check').value !== document.querySelector('#useremail').value) {
        document.querySelector('.errorEmail').innerHTML = '확인 이메일을 입력하세요'
        document.querySelector('#useremail_check').focus();
        return;
    } else {
        document.querySelector('.errorEmail').innerHTML = ''
    }
    if (!document.querySelector('#userpass').value.match(/^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{10,}$/)) {
        document.querySelector('.errorPassword').innerHTML = '영문/숫자/특수문자 포함 10자 이상 입력해주세요.'
        document.querySelector('#userpass').focus();
        return;
    } else {
        document.querySelector('.errorPassword').innerHTML = ''
    }
    if (!document.querySelector('#userpass_check').value.match(/^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{10,}$/)) {
        document.querySelector('.errorPassword').innerHTML = '비밀번호를 다시 확인'
        document.querySelector('#userpass_check').focus();
        return;
    } else {
        document.querySelector('.errorPassword').innerHTML = ''
    }
    if (document.querySelector('#userpass_check').value !== document.querySelector('#userpass').value) {
        document.querySelector('.errorPassword').innerHTML = '두 개의 비밀번호가 일치하지 않습니다'
        document.querySelector('#userpass_check').focus();
        return;
    } else {
        document.querySelector('.errorPassword').innerHTML = ''
    }

    return true;
}

// handle form submit

