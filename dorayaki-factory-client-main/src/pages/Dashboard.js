import React from 'react'
import { Link } from 'react-router-dom';
import "./Dashboard.css"

function Dashboard() {
    return (
        <div>
            <h1>Welcome to Dorayaki Factory !</h1><br />
            <h2> Menu List </h2>
            <tr className='juduldashboard'>
                <td><Link to="/BahanBaku">Bahan Baku</Link><br /></td>
                <td><Link to="/CreateDorayaki">Create Resep</Link><br /></td>
                <td><Link to="/Resep">Check Resep</Link><br /></td>
                <td><Link to="/DaftarRequestDorayaki">Request Dorayaki</Link><br /></td>
            </tr>
        </div>
    )
}

export default Dashboard