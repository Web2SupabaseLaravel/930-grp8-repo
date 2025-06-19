import React from 'react';
import './Header.css';
import logo from '../../assets/2.png';

const Header = () => {
  return (
    <header className="header">
      <div className="logo"><img src={logo} alt="" className='logoimg' /> FOODIES</div>
      <input type="text" placeholder="Hinted search text" className="search" />
      <div className="buttons">
        <button className="btn">Sign Up</button>
        <button className="btn">Log In</button>
        <div className="avatar"><i class="bi bi-person-circle"></i></div>
      </div>
    </header>
  );
};

export default Header;