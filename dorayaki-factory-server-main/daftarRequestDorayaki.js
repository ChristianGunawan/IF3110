const db= require('./connect');


exports.daftarRequestDorayaki = function (req, res) {
    db.query("SELECT * FROM request", [], (err, result) => {
        if(err) {console.log(err);}
        console.log("masuk ke daftar request dorayaki !!!");
        res.send({resp: result});
    })
};

exports.acceptRequest = function (req, res){
    let id_request = req.body.id_request;
    console.log(id_request);
    console.log("HAMPIR masuk ke query accept request");

    db.query("DELETE FROM `request` WHERE id_request=?",
        [id_request],
        (err, result) => {
            if(err) {console.log(err);}
            console.log("masuk ke query accept request");
            res.send(result);
        }
    )
};