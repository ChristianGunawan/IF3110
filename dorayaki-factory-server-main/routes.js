'use strict';

module.exports = function (app) {
    var registerLogin = require('./registerLogin');
    var createDorayaki = require('./createDorayaki');
    var daftarRequestDorayaki = require('./daftarRequestDorayaki');
    var bahanBaku = require('./bahanBaku');
    var resep = require('./resep');
    

    app.route('/register').post(registerLogin.register);
    app.route('/login').post(registerLogin.login);
    app.route('/createDorayaki').post(createDorayaki.createDorayaki);
    app.route('/daftarRequestDorayaki').get(daftarRequestDorayaki.daftarRequestDorayaki);
    app.route('/daftarRequestDorayaki').post(daftarRequestDorayaki.acceptRequest);
    app.route('/bahanBaku').get(bahanBaku.daftarBahanBaku);
    app.route('/bahanBaku').post(bahanBaku.createBahanBaku);
    app.route('/daftarResep').get(resep.daftarResep);
}