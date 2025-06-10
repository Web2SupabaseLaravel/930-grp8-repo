import React, { useState } from 'react';
import './SignIn.css';
import InputField from './InputField';
import { Link } from 'react-router-dom';
import api from '../api'; // استيراد ملف axios

function SignIn() {
  const [formData, setFormData] = useState({
    email: '',
    password: ''
  });

  const [error, setError] = useState('');

  const handleChange = (e) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value
    });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    setError('');

    try {
      const response = await api.post('/login', formData);
      const token = response.data.token;
      localStorage.setItem('token', token);
      alert('Login successful ✅');
      // Redirect here if needed
    } catch (err) {
      setError('Invalid email or password ❌');
    }
  };

  return (
    <div className="signin-page">
      <div className="form-container">
        <img 
          src="/foodies-high-resolution-logo-transparent.png" 
          alt="Sign In Logo"
          style={{ width: 250, marginBottom: '20px' }} 
        />
        <form onSubmit={handleSubmit}>
          <InputField 
            name="email"
            placeholder="Email Address"
            value={formData.email}
            onChange={handleChange}
          />
          <InputField 
            name="password"
            type="password"
            placeholder="Password"
            value={formData.password}
            onChange={handleChange}
          />
          <button className="signin-btn" type="submit">Login</button>
        </form>
        {error && <p className="error">{error}</p>}
        <p className="bottom-text">
          Don't have an account? <Link to="/signup">Sign up</Link>
        </p>
      </div>
    </div>
  );
}

export default SignIn;
