/**
 * Created by Lourence on 11/17/2016.
*/
(function($){
    $('input[name="username"]').focus();
    $('.form-signin').on('submit', function(envent){
        var a = $('input[name="username"]').val();
        var b = $('input[name="password"]').val();
        if(a == '' && b == ''){
            $('.hidden').removeClass('hidden').addClass('show');
            $('.form-group').addClass('has-error');
            return false;
        }
        if(a == ''){
            $('.hidden').eq(0).removeClass('hidden').addClass('show');
            $('.form-group').eq(0).addClass('has-error');
            return false;
        }
        if(b == ''){
            $('.hidden').eq(1).removeClass('hidden').addClass('show');
            $('.form-group').eq(1).addClass('has-error');
            return false;
        }
    });
})($);
