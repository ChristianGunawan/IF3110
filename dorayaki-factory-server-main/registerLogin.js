
const db = require('./connect');
const mysql = require('mysql');
var jwt = require('jsonwebtoken');
var config = require('./secret');
var ip = require('ip');

const bcrypt = require('bcrypt');
const saltRounds = 10;


exports.register = function (req, res) {
    const username = req.body.username;
    const email = req.body.email;
    const password = req.body.password;

    db.query("SELECT * FROM user WHERE username=?",
        [username],
        (err, result) => {
            if (err) { console.log(err); }
            if (result.length == 0) {
                bcrypt.hash(password, saltRounds, (err, hash) => {
                    if (err) { console.log(err); }

                    db.query("INSERT INTO user (username, email, password) VALUES (?,?,?)",
                        [username, email, hash],
                        (err, result) => {
                            if (err) { console.log(err); }
                        }
                    );
                })
            } else {
                res.send({ message: "Username not available !" });
            }
        })
};

exports.login = function (req, res) {
    const username = req.body.username;
    const password = req.body.password;

    console.log(username);
    console.log(password);

    db.query("SELECT * FROM user WHERE username=?",
        [username],
        (err, result) => {
            if (err) { res.send({ error: err }); }

            if (result.length == 1) {
                bcrypt.compare(password, result[0].password, (err, response) => {
                    if (response) {
                        // res.send(result);

                        // jwt
                        var token = jwt.sign({ result }, config.secret, {
                            expiresIn: 3600
                        });

                        var data = {
                            id_user: result[0].id_user,
                            access_token: token,
                            ip_address: ip.address()
                        };

                        var query = "INSERT INTO ?? SET ?";
                        var table = ["akses_token"];

                        query = mysql.format(query, table);
                        db.query(query, data, function (error, respon) {
                            if (error) {
                                console.log(error);
                            } else {
                                res.send({
                                    success: true,
                                    message: 'Token JWT Generated',
                                    token: token,
                                    currUser: data.id_user,
                                    result: result,
                                });
                            }
                        });
                    } else {
                        res.send({ success: false, message: "Wrong username or password !" });
                    }
                })
            } else {
                res.send({ success: false, message: "Wrong username or password !" });
            }
        }
    );
};
