import React from "react";
import { Routes, Route } from "react-router-dom";

import './App.css';
import Welcome from './pages/Welcome';
import Register from "./pages/Register";
import Login from "./pages/Login";
import CreateDorayaki from "./pages/CreateDorayaki";
import DaftarRequestDorayaki from "./pages/DaftarRequestDorayaki";
import BahanBaku from "./pages/BahanBaku";
import Resep from "./pages/Resep";
import Dashboard from "./pages/Dashboard";



function App() {

  return (
    <div className="App">

      <Routes>
        <Route exact path="/" element={<Welcome />} />
        <Route path="/Register" element={<Register />} />
        <Route path="/Login" element={<Login />} />
        <Route path="/CreateDorayaki" element={<CreateDorayaki />} />
        <Route path="/DaftarRequestDorayaki" element={<DaftarRequestDorayaki />} />
        <Route path="/BahanBaku" element={<BahanBaku />} />
        <Route path="/daftarResep" element={<Resep />} />
        <Route path="/Dashboard" element={<Dashboard />} />
      </Routes>

    </div>
  );
}

export default App;
