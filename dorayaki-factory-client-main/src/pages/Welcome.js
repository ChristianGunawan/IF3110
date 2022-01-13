import React from 'react'
import { Link } from 'react-router-dom';

function Welcome() {
    return (
        <div>
            <h1>Welcome to Dorayaki Factory !</h1>
            <Link to="/Login">Go To Login</Link><br/>
            <Link to="/Register">Go To Register</Link>
        </div>
    )
}

export default Welcome
