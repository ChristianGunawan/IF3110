import React, { useState, useEffect } from "react";
import Axios from "axios";
import './Satu.css';
import { Link } from 'react-router-dom';
// import data from "../data/request-data.json"


function DaftarRequestDorayaki() {
    const [requests, setRequests] = useState([]);

    const daftarRequestDorayaki = () => {
        Axios.get('http://localhost:3001/daftarRequestDorayaki').then((response) => {
            console.log(response);
            setRequests(response.data.resp);
        });
    };


    const acceptRequest = (id_request) => {
        Axios.post('http://localhost:3001/daftarRequestDorayaki', {
            id_request: id_request
        }).then((response) => {
            console.log("tombol delete ditekan !!!");
            console.log(response);
        })
            .catch((err) => console.log(err));
    };


    useEffect(() => {
        daftarRequestDorayaki()
    }, [])

    return (
        <div className='.table-responsive'>
            <div className='table-wrapper'>
               <h2>Daftar Request Dorayaki</h2>
                <thead className='.table-responsive'>
                    <tr className="judul">
                        <th className='bg'>ID Resep</th>
                        <th className='bg'>Jumlah</th>
                        <th className='bg'>Time Stamp</th>
                        <th className='bg'>Request</th>
                    </tr>
                </thead>
                <tbody className='table-wrapper'>
                    {requests.map(request => (
                        <tr>
                            <td>{request.id_resep}</td>
                            <td>{request.jumlah_dorayaki}</td>
                            <td>{request.ts_request}</td>
                            <td><button onClick={() => acceptRequest(request.id_request)}>Accept</button></td>
                        </tr>
                    ))}
                </tbody>
            </div>
            <Link to="/Dashboard">Back</Link>
        </div>
    )
}

export default DaftarRequestDorayaki