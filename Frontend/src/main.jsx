import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './App.jsx';
import './index.css';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Signup from './Componates/Signup.jsx';
import SignIn from './Componates/SignIn.jsx';
import CustomerPage from './Componates/CustomerPage';
import StaffPage from './Componates/StaffPage';
import ManagerPage from './Componates/ManagerPage';

ReactDOM.createRoot(document.getElementById('root')).render(
  <BrowserRouter>
    <Routes>
      <Route path="/" element={<Signup />} />
      <Route path="/signup" element={<Signup />} />
      <Route path="/signin" element={<SignIn />} />
  <Route path="/customer" element={<CustomerPage />} />
  <Route path="/staff" element={<StaffPage />} />
  <Route path="/manager" element={<ManagerPage />} />

    </Routes>
  </BrowserRouter>
);
