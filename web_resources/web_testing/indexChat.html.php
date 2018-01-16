<html>
<head>
    <title>Flat Design ChatBox</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class = "chatbox">
        <div class="chatlogs">


            <div class="chat friend">
                <div class="user-photo"><img src="http://internetsafety.trendmicro.com/wp-content/uploads/2016/11/hackerimage-for-blog.jpg"></div>
                <p class="chat-msg">hey stef</p>
            </div>



            <div class="chat self">
                <div class="user-photo"><img src="http://www.sifanews.com/wp-content/uploads/2017/12/internet-image-by-Mind-sight.jpg"></div>
                <p class="chat-msg">hey yo</p>
            </div>


            <div class="chat friend">
                <div class="user-photo"></div>
                <p class="chat-msg">hey stefhey stefhey stefhey stefhey stefhey stefhey stef
                    hey stefhey stefhey stefhey stefhey stefhey stefhey stefhey stefhey stefhey stefhey stef
                    hey stefhey stefhey stefhey stefhey stefhey stefhey stefhey stefhey stefhey stef
                    hey stefhey stefhey stefhey stefhey stefhey stefhey stefhey stefhey stef
                    hey stefhey stefhey stefhey stefhey stefhey stefhey stefhey stefhey stefhey stefhey stefhey stefhey stefhey stefhey stefhey stefhey stef
                    hey stefhey stefhey stefhey stefhey stefhey stefhey stefhey stefhey stef
                </p>
            </div>

        </div>
        <div class="chat-form">
            <textarea id="message"></textarea>
            <button id="button">Send</button>
        </div>
</div>
<textarea id="screen" cols="40" rows="40"> </textarea> <br>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

    function update()
    {
        $.post("server.php", {}, function(data){ $("#screen").val(data);});

        setTimeout('update()', 1000);
    }

    $(document).ready(

        function()
        {
            update();

            $("#button").click(
                function()
                {
                    $.post("server.php",
                        { message: $("#message").val()},
                        function(data){
                            $("#screen").val(data);
                            $("#message").val("");
                        }
                    );
                }
            );
        });


</script>
</body>
</html>