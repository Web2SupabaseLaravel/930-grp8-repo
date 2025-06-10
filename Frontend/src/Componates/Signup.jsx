import React, { useState } from 'react';
import './Signup.css';
import InputField from './InputField';
import Logo from './Logo';
import { Link, useNavigate } from 'react-router-dom';
import api from '../api';

function Signup() {
  const navigate = useNavigate();

  const [formData, setFormData] = useState({
    //user_id:'',
    name: '',
    email: '',
    phone_number: '',
    address: '',
    birthdate: '',
    password: '',
    confirmPassword: '',
    role: '',
    signupyear: new Date().getFullYear(),
    serialnumber: Math.floor(Math.random() * 1000000000),
    Admin_id: '', // optional
  });

  const [error, setError] = useState('');

  const handleChange = (e) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    if (!formData.role) {
      alert('Please select a role.');
      return;
    }

    if (formData.password !== formData.confirmPassword) {
      setError('Passwords do not match ❌');
      return;
    }

    try {
      const response = await api.post('/register', formData);
      const token = response.data.token;
      localStorage.setItem('token', token);
      navigate(`/${formData.role}`); // توجيه حسب الدور
    } catch (err) {
      if (err.response?.data) {
        const messages = Object.values(err.response.data).flat().join('\n');
        setError(messages);
      } else {
        setError('Registration failed');
      }
    }
  };

  return (
    <div className="signup-page">
      <div className="form-container">
        <Link to="/" className="back-link">← Back to Home</Link>
        <Logo />
        <form onSubmit={handleSubmit}>
          <InputField
            placeholder="Full Name"
            name="name"
            value={formData.name}
            onChange={handleChange}
          />
          <InputField
            placeholder="Email Address"
            name="email"
            value={formData.email}
            onChange={handleChange}
          />
          <InputField
            placeholder="+970 59-XXXXXXX"
            name="phone_number"
            value={formData.phone_number}
            onChange={handleChange}
          />
          <InputField
            placeholder="Your Address"
            name="address"
            value={formData.address}
            onChange={handleChange}
          />
          <InputField
            placeholder="Date of Birth"
            name="birthdate"
            type="date"
            value={formData.birthdate}
            onChange={handleChange}
          />
          <InputField
            placeholder="Password"
            name="password"
            type="password"
            value={formData.password}
            onChange={handleChange}
          />
          <InputField
            placeholder="Confirm Password"
            name="confirmPassword"
            type="password"
            value={formData.confirmPassword}
            onChange={handleChange}
          />

          {/* اختيار الدور */}
          <select
            className="input-field"
            name="role"
            value={formData.role}
            onChange={handleChange}
            required
          >
            <option value="">Select Role</option>
            <option value="customer">Customer</option>
            <option value="staff">Staff</option>
            <option value="manager">Manager</option>
          </select>

          {error && <p style={{ color: 'red' }}>{error}</p>}

          <button className="signup-btn" type="submit">Sign up</button>
        </form>

        <p className="bottom-text">
          Already have an account? <Link to="/signin">Sign in</Link>
        </p>
      </div>
    </div>
  );
}

export default Signup;
