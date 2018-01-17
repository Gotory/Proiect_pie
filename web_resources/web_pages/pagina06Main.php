<link rel="stylesheet" type="text/css" href="../web_testing/style.css">
<div class = "chatbox">
    <div class="chatlogs">


        <div class="chat friend">
            <div class="user-photo"></div>
            <p class="chat-msg">hey stef</p>
        </div>

        <div class="chat self">
            <div class="user-photo"></div>
            <p class="chat-msg">(<?php  if(isset($_SESSION['objUSER'])){ $userObj = $_SESSION['objUSER']; echo $userObj->getNume();}?>) hey yo</php></p>
        </div>

    </div>
    <div class="chat-form">
        <textarea id="mesajScris"></textarea>
        <button class="btn" onclick="<?php session_start(); $_SESSION['onClick'] = 1; ?>">Send</button>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function update()
{
    $.post("../web_testing/server.php", { message: $("#mesajScris").val() , nrmesaje: $(".chatlogs").children().length},
        function(data){
            $('.chatlogs').append(data);
        });
    setTimeout('update()', 3000);
}
$(document).ready(function(){
    $(".btn").click(function(){
        update();
        if($.trim($("#mesajScris").val())) {
            $('.chatlogs').append('<div class="chat self"><div class="user-photo"></div>\n' +
                '<p class="chat-msg">'+"(<?php  //print_r($_SESSION['numeUserCurrent']); ?>) "+ $('#mesajScris').val()
                + '</p>'+'</div>');
            golestMesajScris();
        }
    });
});
function golestMesajScris(){
    document.getElementById("mesajScris").value = '';
}
</script>