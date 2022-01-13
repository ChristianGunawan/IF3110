const db= require('./connect');


exports.daftarResep = function (req, res) {
    db.query("SELECT * FROM resep", [], (err, result) => {
        if(err) {console.log(err);}
        console.log("masuk ke daftar RESEP dorayaki !!!");
        res.send({resp: result});
    })
};

// exports.acceptResep = function (req, res){
//     let id_resep = req.body.id_resep;
//     console.log(id_resep)
//     console.log("HAMPIR masuk ke query accept request");

//     db.query("DELETE FROM `request` WHERE id_request=?",
//         [id_request],
//         (err, result) => {
//             if(err) {console.log(err);}
//             console.log("masuk ke query accept request");
//             res.send(result);
//         }
//     )
// };