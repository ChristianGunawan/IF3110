const jwt = require('jsonwebtoken');
const config = require('../config/secret');

function verification() {
    return function(req, res, next) {
        // check authorization header
        var tokenBearer = req.headers.authorization;
        if(tokenBearer) {
            var token = tokenBearer.split(' ')[1];
            // verification
            jwt.verify(token, config.secret, function(error, decoded) {
                if (error) {
                    console.log(error);
                    return res.status(401).send({auth:false, message:"Token tidak terdaftar !"});
                } else {
                    req.auth = decoded;
                    next();
                }
            });
        } else {
            return res.status(401).send({auth:false, message:"Token tidak tersedia !"});
        }
    };
}

module.exports = verification;