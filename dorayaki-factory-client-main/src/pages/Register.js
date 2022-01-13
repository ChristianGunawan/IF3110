import React, { useState } from "react";
import Axios from 'axios';
import { Link } from 'react-router-dom';

function Register() {

    const [usernameReg, setUsernameReg] = useState("");
    const [emailReg, setEmailReg] = useState("");
    const [passwordReg, setPasswordReg] = useState("");

    const register = () => {
        Axios.post('http://localhost:3001/register', {
            username: usernameReg,
            email: emailReg,
            password: passwordReg
        }).then((response) => {
            console.log(response);
        });
    };

    return (
        <div>
            <h1>Registration</h1>
            <div className="registration">
                <input
                    className="registerinput"
                    placeholder="Username"
                    type="text"
                    onChange={(e) => {
                        setUsernameReg(e.target.value);
                    }} /> 
                <input
                    className="registerinput"
                    type="text"
                    placeholder="Email"
                    onChange={(e) => {
                        setEmailReg(e.target.value);
                    }} />
                <input
                    className="registerinput"
                    placeholder="Password"
                    type="password"
                    onChange={(e) => {
                        setPasswordReg(e.target.value);
                    }} />

                <button onClick={register} className='registerbutton' >Register</button>
                <div className="already"><Link to="/Login">Already have an Account ?</Link></div>
            </div>
        </div>
    )
}

export default Register
