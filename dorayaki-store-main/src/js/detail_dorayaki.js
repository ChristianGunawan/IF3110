const dorayaki_info = document.getElementById("dorayaki_info");

const searchParam = window.location.search;
const urlParam = new URLSearchParams(searchParam);

const dorayaki = data.dorayaki[urlParam.get("dorayaki")];
//contoh : http:webedestore.com/dorayaki=strawberry gituu

function showDorayaki(dorayaki){
    // Initiate variable
    const mydorayaki = document.createElement('article');
    const nama_dorayaki = document.createElement('h1');
    const gambar = document.createElement('img');
    const harga = document.createElement('p');
    const stock = document.createElement('p');
    const jumlah_terjual = document.createElement('p');
    const deskripsi = document.createElement('p');

    nama_dorayaki.textContent = dorayaki.nama_dorayaki;
    mydorayaki.appendChild(nama_dorayaki);

    gambar.src = dorayaki.gambar;
    mydorayaki.appendChild(gambar);

    harga.textContent = 'Harga Dorayaki : ' + dorayaki.harga;
    mydorayaki.appendChild(harga);

    //Belum ajax nya
    stock.textContent = 'Stock Dorayaki : ' + dorayaki.stock;
    mydorayaki.appendChild(stock);

    stock.textContent = 'Jumlah terjual : ' + dorayaki.jumlah_terjual;
    mydorayaki.appendChild(jumlah_terjual);

    stock.textContent = 'Deskripsi : ' + dorayaki.deskripsi;
    mydorayaki.appendChild(deskripsi);
    
    dorayaki_info.appendChild(mydorayaki);
}
