
<?php if(!isset($User)) : ?>
    <div class="alert alert-primary " style="margin-bottom: 400px;" role="alert">
        იმისთვის რომ გამოიყენოთ ჩატი გთხოვთ გაიარეთ ავტორიზაცია, ხოლო თუ პირველად ხართ საიტზე გაიარეთ რეგისტრაცია
        <div class=" ml-3 row">
            <div class="rd-navbar-btn-wrap"><a class="button button-smaller button-primary-outline" href="/registration">რეგისტრაცია</a></div>
            <div class="rd-navbar-btn-wrap"><a class="button button-smaller button-primary-outline" href="/login">შესვლა</a></div>
        </div>
    </div>

<?php else: ?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="container">
    <div class="messaging col-lg-12">
        <div class="inbox_msg">
            <div class="mesgs">
                <div id="msg_history" class="msg_history">
<!--                    <div class="incoming_msg">-->
<!--                        <div class="received_msg">-->
<!--                            <div class="received_withd_msg">-->
<!--                                <p>Test which is a new approach to have all-->
<!--                                    solutions</p>-->
<!--                                <span class="time_date"> 11:01 AM    |    June 9</span></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="outgoing_msg">-->
<!--                        <div class="sent_msg">-->
<!--                            <p>Test which is a new approach to have all-->
<!--                                solutions</p>-->
<!--                            <span class="time_date"> 11:01 AM    |    June 9</span> </div>-->
<!--                    </div>-->
                </div>
                <div class="type_msg">
                    <div class="input_msg_write p-1">
                        <input type="text" id="message" class="write_msg" placeholder="Type a message" />
                        <button class="msg_send_btn mr-3"  id='BtnSendMessage' onclick="sendMassage()" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    let messageArray = JSON.parse('<?php echo $messages;?>');
    for (let i in messageArray) {
        messageArray[i]['Type'] = messageArray[i]['msg_Type']
        messageArray[i]['date'] = messageArray[i]['msg_date']
    }
    console.log(messageArray);
    if (messageArray)

    for (let i in messageArray){
        let div = document.createElement('div')
        if (messageArray[i]['Type'] == 2) {
            div.innerHTML = '<div class="outgoing_msg">\n' +
                '                        <div class="sent_msg">\n' +
                '                            <p>'+messageArray[i].Text +'</p>\n' +
                '                            <span class="time_date"> '+messageArray[i].date+'</span> </div>\n' +
                '                    </div>'
            document.querySelector('#msg_history').append(div);
        }
        if (messageArray[i]['Type'] == 1) {
            div.innerHTML = '<div class="received_msg">\n' +
                '                            <div class="received_withd_msg">\n' +
                '                                <p>'+messageArray[i].Text +'</p>\n' +
                '                                <span class="time_date"> '+messageArray[i].date+'</span></div>\n' +
                '                        </div>'
            document.querySelector('#msg_history').append(div);
        }
    }
    let block = document.getElementById("msg_history");
    block.scrollTop = block.scrollHeight;
    let message  = {
        Senderid    : parseInt(<?php echo $User['id']  ;?>),
        Type        : 2,
        Text        : '',
        date        : '',
    };

    UserID = parseInt(<?php echo $User['id'] ; ?>);
    const connection = new WebSocket('ws://www.honest.ge:8080');

    connection.onopen = () => {
    };

    connection.onclose = () => {
    };

    connection.onerror = error => {
    };

    connection.onmessage = event => {
        // $.post( "test.php", message)
        //     .done(function( data ) {
        //         message.Text = ''
        //     });
        let Data = JSON.parse(event.data)
        if (Data.chatID == UserID) {
            let div = document.createElement('div');

            if (Data.Type === 2) {
                div.innerHTML = '<div class="outgoing_msg">\n' +
                    '                        <div class="sent_msg">\n' +
                    '                            <p>' + Data.Text + '</p>\n' +
                    '                            <span class="time_date"> ' + this.formatDate(new Date()) + '</span> </div>\n' +
                    '                    </div>'
                document.querySelector('#msg_history').append(div);
            }
            if (Data.Type === 1) {
                if (Data.ReciverID === UserID)
                    div.innerHTML = '<div class="received_msg">\n' +
                        '                            <div class="received_withd_msg">\n' +
                        '                                <p>' + Data.Text + '</p>\n' +
                        '                                <span class="time_date"> ' + Data.date + '</span></div>\n' +
                        '                        </div>'
                document.querySelector('#msg_history').append(div);
            }
            let block = document.getElementById("msg_history");
            block.scrollTop = block.scrollHeight;
        }
    };

    function sendMassage () {
        message.Text        = document.querySelector('#message').value;
        if (message.Text.length === 0) return
        message.date = this.formatDate(new Date())
        message['chatID'] = UserID;
        connection.send(JSON.stringify(message));
        document.querySelector('#message').value = '';
    }
    function formatDate(date) {

        let dd = date.getDate();
        if (dd < 10) dd = '0' + dd;

        let mm = date.getMonth() + 1;
        if (mm < 10) mm = '0' + mm;

        let yy = date.getFullYear();
        if (yy < 10) yy = '0' + yy;

        let hh = date.getHours()
        let min = date.getMinutes()
        return dd + '.' + mm + '.' + yy + ' | ' + (hh.length === 1? '0' + hh : hh) + ':'  +( min.length === 1? '0' +  min :  min);
    }
    // Get the input field
    let input = document.getElementById("message");

    // Execute a function when the user releases a key on the keyboard
    input.addEventListener("keyup", function(event) {
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("BtnSendMessage").click();
        }
    });
</script>
<style>
    .container{max-width:1170px; margin:auto;}
    img{ max-width:100%;}
    .inbox_people {
        background: #f8f8f8 none repeat scroll 0 0;
        float: left;
        overflow: hidden;
        width: 40%; border-right:1px solid #c4c4c4;
    }
    .inbox_msg {
        border: 1px solid #c4c4c4;
        clear: both;
        overflow: hidden;
    }
    .top_spac{ margin: 20px 0 0;}


    .recent_heading {float: left; width:40%;}
    .srch_bar {
        display: inline-block;
        text-align: right;
        width: 60%;
    }
    .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

    .recent_heading h4 {
        color: #6495ED;
        font-size: 21px;
        margin: auto;
    }
    .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
    .srch_bar .input-group-addon button {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        padding: 0;
        color: #707070;
        font-size: 18px;
    }
    .srch_bar .input-group-addon { margin: 0 0 0 -27px;}

    .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
    .chat_ib h5 span{ font-size:13px; float:right;}
    .chat_ib p{ font-size:14px; color:#989898; margin:auto}
    .chat_img {
        float: left;
        width: 11%;
    }
    .chat_ib {
        float: left;
        padding: 0 0 0 15px;
        width: 88%;
    }

    .chat_people{ overflow:hidden; clear:both;}
    .chat_list {
        border-bottom: 1px solid #c4c4c4;
        margin: 0;
        padding: 18px 16px 10px;
    }
    .inbox_chat { height: 550px; overflow-y: scroll;}

    .active_chat{ background:#ebebeb;}

    .incoming_msg_img {
        display: inline-block;
        width: 6%;
    }
    .received_msg {
        display: inline-block;
        padding: 0 0 0 10px;
        vertical-align: top;
        width: 92%;
    }
    .received_withd_msg p {
        background: #ebebeb none repeat scroll 0 0;
        border-radius: 3px;
        color: #646464;
        font-size: 14px;
        margin: 0;
        padding: 5px 10px 5px 12px;
        width: 100%;
    }
    .time_date {
        color: #747474;
        display: block;
        font-size: 12px;
        margin: 8px 0 0;
    }
    .received_withd_msg { width: 80%;}
    .mesgs {
        padding: 30px 15px 0 25px;
    }

    .sent_msg p {
        background: #6495ED none repeat scroll 0 0;
        border-radius: 3px;
        font-size: 14px;
        margin: 0; color:#fff;
        padding: 5px 10px 5px 12px;
        width:100%;
    }
    .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
    .sent_msg {
        float: right;
        width: 80%;
    }
    .input_msg_write input {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        color: #4c4c4c;
        font-size: 15px;
        min-height: 48px;
        width: 100%;
    }

    .type_msg {border-top: 1px solid #c4c4c4;position: relative;}
    .msg_send_btn {
        background: #6495ED none repeat scroll 0 0;
        border: medium none;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        font-size: 17px;
        height: 33px;
        position: absolute;
        right: 0;
        top: 11px;
        width: 33px;
    }
    .messaging { padding: 0 0 50px 0;}
    .msg_history {
        height: 516px;
        overflow-y: auto;
    }
</style>
<?php endif;?>
