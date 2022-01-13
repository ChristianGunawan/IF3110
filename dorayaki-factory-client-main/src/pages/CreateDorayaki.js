import React, { useState } from "react";
import Axios from "axios";
import './Satu.css';
import { Link } from 'react-router-dom';


function CreateDorayaki() {
    const [dorayaki, setDorayaki] = useState("");
    const [idBahan1, setIdBahan1] = useState("");
    const [idBahan2, setIdBahan2] = useState("");
    const [idBahan3, setIdBahan3] = useState("");
    const [jumlahBahan1, setJumlahBahan1] = useState("");
    const [jumlahBahan2, setJumlahBahan2] = useState("");
    const [jumlahBahan3, setJumlahBahan3] = useState("");

    const createDorayaki = () => {
        Axios.post('http://localhost:3001/createDorayaki', {
            dorayaki: dorayaki,
            idBahan1: idBahan1,
            idBahan2: idBahan2,
            idBahan3: idBahan3,
            jumlahBahan1: jumlahBahan1,
            jumlahBahan2: jumlahBahan2,
            jumlahBahan3: jumlahBahan3
        }).then((response) => {
            console.log(response);
        })
            .catch((err) => console.log(err));
    }

    return (
        <div className="homeDorayaki">
                <h1> Create New Dorayaki (Resep) </h1>
                <br />
                <div className="homeDorayaki">
                    <div className="createDorayaki">
                        <label>Nama Dorayaki  : </label>
                        <input
                            type="text"
                            onChange={(e) => {
                                setDorayaki(e.target.value);
                            }} />
                        <br /><br />

                        <label>ID Bahan 1  : </label>
                        <input
                            type="text"
                            onChange={(e) => {
                                setIdBahan1(e.target.value);
                            }} />
                        <br />

                        <label>Jumlah Bahan 1  : </label>
                        <input
                            type="number"
                            min='0'
                            onChange={(e) => {
                                setJumlahBahan1(e.target.value);
                            }} />
                        <br /><br />

                        <label>ID Bahan 2  : </label>
                        <input
                            type="text"
                            onChange={(e) => {
                                setIdBahan2(e.target.value);
                            }} />
                        <br />

                        <label>Jumlah Bahan 2  : </label>
                        <input
                            type="number"
                            min='0'
                            onChange={(e) => {
                                setJumlahBahan2(e.target.value);
                            }} />
                        <br /><br />

                        <label>ID Bahan 3  : </label>
                        <input
                            type="text"
                            onChange={(e) => {
                                setIdBahan3(e.target.value);
                            }} />
                        <br />

                        <label>Jumlah Bahan 3  : </label>
                        <input
                            type="number"
                            min='0'
                            onChange={(e) => {
                                setJumlahBahan3(e.target.value);
                            }} />
                        <br /><br />

                        <button onClick={createDorayaki}>Submit</button>
                    </div>
                </div>

                <Link to="/Dashboard">Back</Link>
            </div>
    )
}

export default CreateDorayaki