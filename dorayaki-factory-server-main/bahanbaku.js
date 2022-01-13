const db = require('./connect');


exports.createBahanBaku = function(req, res){
    const nama_bahan = req.body.nama_bahan;
    const stok_bahan = req.body.stok_bahan;

    db.query("INSERT INTO bahan_baku(nama_bahan, stok_bahan) VALUES (?,?)",
        [nama_bahan, stok_bahan],
        (err, result) => {
            if(err) {console.log(err);}
            res.send(result);
        }
    );
};

exports.daftarBahanBaku = function (req, res) {
    db.query("SELECT * FROM bahan_baku", [], (err, result) => {
        if(err) {console.log(err);}
        console.log("masuk ke daftar bahan baku !!!");
        res.send({resp: result});
    })
};