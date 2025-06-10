import React from 'react';
import './Header.css'; 
import logo from '../assets/logo.png'; 
import { FaSearch, FaUser, FaBars } from 'react-icons/fa';

const Header = () => {
  return (
    <header className="header">
      <div className="header-left">
        <img src={logo} alt="Foodies Logo" className="logo" />
        <span className="brand-name">Foodies</span>
      </div>

      <div className="search-box">
        <FaBars className="search-icon" />
        <input type="text" placeholder="Hinted search text" />
        <FaSearch className="search-icon" />
      </div>

      <div className="header-right">
        <button className="btn-signup">SIGN UP</button>
        <span className="login-text">LOG IN</span>
        <div className="user-icon">
          <FaUser />
        </div>
      </div>
    </header>
  );
};

export default Header;

