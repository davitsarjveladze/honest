const WebSocket = require('ws');
const webSocketServer = new WebSocket.Server({ port: 8080 });

var mysql = require('mysql');

let con = mysql.createConnection({
    host: "139.59.130.170",
    user: "honest",
    password: "9ebe3yrat",
    database: "zadmin_honest",
    charset: 'utf8mb4'
});
con.connect(function(err) {})
webSocketServer.on('connection', webSocket => {
    webSocket.on('message', message => {
        console.log(message);
        broadcast(message);
        InsertMsg(message)
    });
});

function broadcast(data) {
    webSocketServer.clients.forEach(client => {
        if (client.readyState === WebSocket.OPEN) {
            client.send(data);
        }
    });
}

function InsertMsg(data) {
    let ReciverID,Text,Senderid,date2,Type2;
    let TmpData = JSON.parse(data)
    ReciverID   = TmpData.ReciverID;
    if(!ReciverID) {
        ReciverID = 1;
    }

    Text        = TmpData.Text
    Senderid    = TmpData.Senderid
    date2       = TmpData.date
    Type2       = TmpData.Type
    chatID      = TmpData.chatID

        // /"+ReciverID +','+Type2+','+Text+","+Senderid+','+date2+"
        let sql = "INSERT INTO chat (ReciverID,msg_Type,Text,Senderid,msg_date,chatID) VALUES (?,?,?,?,?,?)";
        con.query(sql,[ReciverID ,Type2,Text,Senderid,date2,chatID] ,function (err, result) {
            if (err) throw err;
        });


}
