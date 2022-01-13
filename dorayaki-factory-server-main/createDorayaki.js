const db = require('./connect');


exports.createDorayaki = function(req, res){
    const dorayaki = req.body.dorayaki;
    const idBahan1 = req.body.idBahan1;
    const idBahan2 = req.body.idBahan2;
    const idBahan3 = req.body.idBahan3;
    const jumlahBahan1 = req.body.jumlahBahan1;
    const jumlahBahan2 = req.body.jumlahBahan2;
    const jumlahBahan3 = req.body.jumlahBahan3;

    db.query("INSERT INTO resep(nama_resep, id_bahan_baku1, id_bahan_baku2, id_bahan_baku3, jumlah_bahan1, jumlah_bahan2, jumlah_bahan3) VALUES (?,?,?,?,?,?,?)",
        [dorayaki, idBahan1, idBahan2, idBahan3, jumlahBahan1, jumlahBahan2, jumlahBahan3],
        (err, result) => {
            if(err) {console.log(err);}
            res.send(result);
        }
    );
};