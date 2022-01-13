import { useState, useEffect } from 'react';
import Axios from 'axios';
import './Satu.css';
import { Link } from 'react-router-dom';

function Resep() {
  const [resep, setResep] = useState([]);

  const daftarResep = () => {
    Axios.get('http://localhost:3001/daftarResep').then((response) => {
      setResep(response.data.resp);
    });
  };


  useEffect(() => {
    daftarResep();
  }, [])

  return (
    <div className='.table-responsive'>
      <div className='table-wrapper'>
      <h2>Daftar Resep</h2>

      <thead className='.table-responsive'>
        <tr className="judul">
          <th className='bg'>ID Resep</th>
          <th className='bg'>Nama Resep</th>
          <th className='bg'>ID Bahan Baku 1</th>
          <th className='bg'>Jumlah Bahan Baku 1</th>
          <th className='bg'>ID Bahan Baku 2</th>
          <th className='bg'>Jumlah Bahan Baku 2</th>
          <th className='bg'> ID Bahan Baku 3</th>
          <th className='bg'>Jumlah Bahan Baku 3</th>
        </tr>
      </thead>
      <tbody className='table-wrapper'>
        {resep.map(r => (
          <tr>
            <td>{r.id_resep}</td>
            <td>{r.nama_resep}</td>
            <td>{r.id_bahan_baku1 }</td>
            <td>{r.jumlah_bahan1}</td>
            <td>{r.id_bahan_baku2 }</td>
            <td>{r.jumlah_bahan2}</td>
            <td>{r.id_bahan_baku3 }</td>
            <td>{r.jumlah_bahan3}</td>
          </tr>
        ))} 
      </tbody>
      </div>
      <Link to="/Dashboard">Back</Link>
    </div>
  )
}

export default Resep