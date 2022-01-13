import React, { useState } from "react";
import Axios from "axios";
import { Link } from 'react-router-dom';

function Login() {
    const [username, setUsername] = useState("");
    const [password, setPassword] = useState("");

    const [loginStatus, setLoginStatus] = useState("");


    const login = () => {
        Axios.post('http://localhost:3001/login', {
            username: username,
            password: password
        }).then((response) => {
            if (response.data.success === true) {
                setLoginStatus(response.data.result[0]['username']);
            } else {
                setLoginStatus(response.data.message);
                console.log("login fail");
            }
            console.log(response);
        });
    };

    return (
        <div>
            <div className="login">
                <h1>Login</h1>
                <input className="logininput" type="text" placeholder="Username..."
                    onChange={(e) => {
                        setUsername(e.target.value);
                    }} />
                <input className="logininput" type="password" placeholder="Password..."
                    onChange={(e) => {
                        setPassword(e.target.value);
                    }} />
                <button onClick={login} className='loginbutton'>Login</button>
            </div>
            <h1>{loginStatus}</h1>
            <div>
                <Link to="/Register">Don't have an Account ?</Link>
            </div>
        </div>
    )
}

export default Login
