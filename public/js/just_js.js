$(function () {
    $("form[name='login_user']").validate({
        rules: {
            username: {required: true, email: true},
            password: {required: true}
        },
        messages: {
            username: 'Enter a valid Email', password: 'Password is required'
        },
        submitHandler: function (form) {

            $('#loginBtn').attr('disabled', true);
            $('#response').html('Please wait...').show();

            $.ajax({
                type: 'post',
                url: 'iconbar/users/user_validate.php',
                data: $("form").serialize(),
                dataType: 'json',
                success: function (data) {
                    $('#response').html(data.msg).fadeOut(7000);
                    $('#loginBtn').attr('disabled', false);
                    if (data.status === 200) {
                        //Redirect
                        $(location).attr('href', '../' + data.url);
                    } else {
                        return false;
                    }
                }
            });
        }
    });
});