var mysql = require('mysql');

// create connection to database mysql
const conn = mysql.createConnection({
    host:'localhost',
    user:'root',
    password:'',
    port:'3307',
    database:'webede'
});

conn.connect((err)=>{
    if(err) throw err;
    console.group('Mysql connected');
});

module.exports = conn;