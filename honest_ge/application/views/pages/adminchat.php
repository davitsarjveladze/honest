
<p>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        ხალხინი
    </button>
</p>
<div class="collapse" id="collapseExample">
    <div id="Users">
    </div>
</div>

<div class="container">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <div class="messaging">
        <div class="inbox_msg">
<!--            <div id="inpe"  class="inbox_people">-->
<!--                <div class="headind_srch">-->
<!--                    <div class="recent_heading">-->
<!--                        <h4>Recent</h4>-->
<!--                    </div>-->
<!--                </div>-->
<!--                             active_chat-->
<!--                <div id="Users"   class=" inbox_chat">-->
<!--                </div>-->
<!--            </div>-->
            <div class="mesgs">
                <div id="msg_history" class="msg_history">
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
<div class="snackbars" id="form-output-global"></div>
<script src="<?php echo base_url("assets/js/core.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/script.js"); ?>"></script>

<script >

    let messageArray = JSON.parse('<?php echo $messages;?>');
    console.log(messageArray)
    let massage
    let SelectedID = 2
    const connection = new WebSocket('ws://www.honest.ge:8080');
    let Obj = {}
    let Users = JSON.parse('<?php echo $AllUsers;?>');


    let InboxChatHtml = document.getElementById('Users');
    let Mhtml = ''
    console.log(InboxChatHtml)
    console.log(Users)
    for (let i in Users) {
        Mhtml = Mhtml + '<button type="button"  onclick="GetMessages('+Users[i]['id']+')"><span ><span ><h5>'+Users[i]['login']+'</h5></span></span></button>'
    }
    InboxChatHtml.innerHTML = Mhtml


    connection.onopen = () => {
    };
    let message  = {
        Senderid    : 1,
        ReciverID   : SelectedID,
        Type        : 1,
        Text        : '',
        date        : '',
    };
    function sendMassage() {
        message.Text        = document.querySelector('#message').value;
        if (message.Text.length === 0) return
        message.date = this.formatDate(new Date())
        message['chatID'] = SelectedID;
        message['ReciverID'] = SelectedID;
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
    function GetMessages (id) {
        console.log(messageArray)
        SelectedID = id;
        message.ReciverID = parseInt(id);
        document.querySelector('#msg_history').innerHTML = ''
        console.log(messageArray[SelectedID])
        if (SelectedID && messageArray[SelectedID]) {
            for (let i in messageArray[SelectedID]) {
                let div = document.createElement('div')
                if (messageArray[SelectedID][i]['Type'] == 1) {
                    div.innerHTML = '<div class="outgoing_msg">\n' +
                        '                        <div class="sent_msg">\n' +
                        '                            <p>' + messageArray[SelectedID][i].Text + '</p>\n' +
                        '                            <span class="time_date"> ' + messageArray[SelectedID][i].date + '</span> </div>\n' +
                        '                    </div>'
                    document.querySelector('#msg_history').append(div);
                }
                if (messageArray[SelectedID][i]['Type'] == 2) {
                    div.innerHTML = '<div class="received_msg">\n' +
                        '                            <div class="received_withd_msg">\n' +
                        '                                <p>' + messageArray[SelectedID][i].Text + '</p>\n' +
                        '                                <span class="time_date"> ' + messageArray[SelectedID][i].date + '</span></div>\n' +
                        '                        </div>'
                    document.querySelector('#msg_history').append(div);
                }
            }
        } else {
        }
    }

    // fetch('Db.php', {
    //     method: 'POST',
    //     body: {'id' : 1}
    // }).then(function(response){
    //
    //     this.GetGet(response)
    //
    // }).catch(function(error){
    //     console.log(error);
    // });
    // async function GetGet (data) {
    //     let text = await data.json();
    //     console.log(text)
    // }
    connection.onclose = () => {
        console.error('disconnected');
    };

    connection.onerror = error => {
        console.error('failed to connect', error);
    };

    connection.onmessage = event => {
        console.log('received', event.data);
        let Data = JSON.parse(event.data)

        let div = document.createElement('div');
        if (Data.Type === 1) {
            if (messageArray[Data.ReciverID]) {
                messageArray[Data.ReciverID].push({
                    Type        : 2,
                    Text        : Data.Text,
                    date        : Data.date,
                })
            } else {
                messageArray[Data.ReciverID] = [{
                    Type        : 2,
                    Text        : Data.Text,
                    date        : Data.date,
                }];

            }            div.innerHTML = '<div class="outgoing_msg">\n' +
                '                        <div class="sent_msg">\n' +
                '                            <p>'+Data.Text +'</p>\n' +
                '                            <span class="time_date"> '+this.formatDate(new Date())+'</span> </div>\n' +
                '                    </div>'
            document.querySelector('#msg_history').append(div);
        }
        if (Data.Type === 2) {
            if (messageArray[Data.Senderid]) {
                messageArray[Data.Senderid].push({
                    Type        : 1,
                    Text        : Data.Text,
                    date        : Data.date,
                })
            } else {
                messageArray[Data.Senderid] = [{
                    Type        : 1,
                    Text        : Data.Text,
                    date        : Data.date,
                }];

            }
            if (Data.Senderid === SelectedID)
                div.innerHTML = '<div class="received_msg">\n' +
                    '                            <div class="received_withd_msg">\n' +
                    '                                <p>'+Data.Text +'</p>\n' +
                    '                                <span class="time_date"> '+Data.date+'</span></div>\n' +
                    '                        </div>'
            document.querySelector('#msg_history').append(div);
        }
        let block = document.getElementById("msg_history");
        block.scrollTop = block.scrollHeight;
    };
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


    .recent_heading {float: left; width:80%;}
    .srch_bar {
        display: inline-block;
        text-align: right;
        width: 60%;
    }
    .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

    .recent_heading h4 {
        color: #05728f;
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
    .received_withd_msg { width: 57%;}
    .mesgs {
        float: left;
        padding: 30px 15px 0 25px;
        width: 100%;
    }

    .sent_msg p {
        background: #05728f none repeat scroll 0 0;
        border-radius: 3px;
        font-size: 14px;
        margin: 0; color:#fff;
        padding: 5px 10px 5px 12px;
        width:100%;
    }
    .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
    .sent_msg {
        float: right;
        width: 86%;
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
        background: #05728f none repeat scroll 0 0;
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
