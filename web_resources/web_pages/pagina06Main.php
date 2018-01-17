<link rel="stylesheet" type="text/css" href="../web_testing/style.css">
<div class = "chatbox">
    <div class="chatlogs">


        <div class="chat friend">
            <div class="user-photo"></div>
            <p class="chat-msg">Type: SayHi</p>
        </div>

<!--        <div class="chat self">-->
<!--            <div class="user-photo"></div>-->
<!--            <p class="chat-msg">SayHi</php></p>-->
<!--        </div>-->

    </div>
    <div class="chat-form">
        <textarea id="mesajScris"></textarea>
        <button class="btn" onclick="<?php session_start(); $_SESSION['onClick'] = 1; ?>">Send</button>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function update()
{
    $('.chatlogs').children().last().focus();
    $.post("../web_testing/server.php", { nrmesaje: $(".chatlogs").children().length},
        function(data){
            $('.chatlogs').append(data);
        });
    setTimeout('update()', 1000);
}
$(document).ready(function(){
    $(".btn").click(function(){
        update();
        $.post("../web_testing/server.php",
            { message: $("#mesajScris").val() },
             function(data){
                 $('.chatlogs').append(data);
             });
        if($.trim($("#mesajScris").val())) {
            $('.chatlogs').append('<div class="chat self"><div class="user-photo"></div>\n' +
                '<p class="chat-msg"> '+$('#mesajScris').val()
                + '</p>'+'</div>');
            golestMesajScris();
        }
    });
});
function golestMesajScris(){
    document.getElementById("mesajScris").value = '';
}
</script>