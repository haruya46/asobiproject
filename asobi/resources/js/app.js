import './bootstrap';
import $ from 'jquery';
window.$ = $;
window.jQuery = $;

$(document).on('click','.ajaxbtn', function(){
    let a=$(this);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "get",
        url: a.attr('title'),
    })
    //通信が成功したとき
    .done((res)=>{
    $('#modal .modal-content').html(res);
    $('#modal').show();
    })
    //通信が失敗したとき
    .fail((error)=>{
        console.log('通信失敗');
    })
});