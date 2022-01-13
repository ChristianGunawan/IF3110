import React, { useState, useEffect } from 'react';
import Axios from "axios";
import './BahanBaku.css';
import { Link } from 'react-router-dom';

function BahanBaku() {
    const [nama_bahan, setNamaBahan] = useState("");
    const [stok_bahan, setStokBahan] = useState("");

    const [bahan, setBahan] = useState([]);

    const daftarBahanBaku = () => {
        Axios.get('http://localhost:3001/BahanBaku').then((response) => {
            console.log(response);
            setBahan(response.data.resp);
        });
    };

    const createBahanBaku = () => {
        Axios.post('http://localhost:3001/BahanBaku', {
            nama_bahan: nama_bahan,
            stok_bahan: stok_bahan
        }).then((response) => {
            console.log(response);
        })
            .catch((err) => console.log(err));
    }

    useEffect(() => {
        daftarBahanBaku()
    }, [])

    return (
        <div className='table-responsive'>
            <div className='table-wrapper'>
                <h2>Daftar Bahan Baku</h2>

                <thead className='table-responsive'>
                    <tr className='judul'>
                        <th className='bg'>ID Bahan</th>
                        <th className='bg'>Nama Bahan</th>
                        <th className='bg'>Stok Bahan</th>
                    </tr>
                </thead>
                <tbody className='table-wrapper'>
                    {bahan.map(b => (
                        <tr>
                            <td>{b.id_bahan}</td>
                            <td>{b.nama_bahan}</td>
                            <td>{b.stok_bahan}</td>
                        </tr>
                    ))}
                </tbody>
            </div>

            <div className="createBahanBaku">
                <h1 className='judul'> Create Bahan Baku </h1>
                <br /><br />

                <label className="labelBahanBaku">Nama Bahan Baku  : </label>
                <input
                    className="createBahanBaku"
                    type="text"
                    onChange={(e) => {
                        setNamaBahan(e.target.value);
                    }} />
                <br /><br />

                <label className="labelBahanBaku">Stock Bahan Baku  : </label>
                <input
                    className="createBahanBaku"
                    type="number"
                    onChange={(e) => {
                        setStokBahan(e.target.value);
                    }} />
                <br /><br />

                <button onClick={createBahanBaku} className='createbutton'>Create</button>
            <Link to="/Dashboard">Back</Link>
            </div>
        </div>
    )
}

export default BahanBaku;