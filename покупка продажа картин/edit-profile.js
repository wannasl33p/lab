$(document).ready(function(){
    $('.edit-info').click (function(event){
        // подключение БД, заполнение input
        Change();
    });
    $('#comfirm').click (function(event){
        // запрос в бд, условие -
        Change();
    });
    $('#cancel').click (function(event){
        Change();
    });
});

function Change(){
    $form = $('.user-edit');
    $background = $('.blur');
    let parametr = ['none', 0, 0]
     if ($form.css('display') == 'none'){
        parametr = ['flex', 1, 0.3]
     }
    $form.css('display', parametr[0])
        .animate({ opacity: parametr[1] }, 198); 
    $background .css('display', parametr[0])
        .animate({ opacity: parametr[2] }, 198); 
}