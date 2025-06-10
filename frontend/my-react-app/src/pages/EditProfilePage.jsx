import React, { useState } from 'react';
import './EditProfilePage.css';
import Footer from '../components/Footer';
const EditProfilePage = () => {
  const [formData, setFormData] = useState({
    fullName: 'Sami Braik',
    email: 'sami2025@gmail.com',
    address: 'Palestine, Nablus',
    phone: '+970-5950-55344',
    password: '',
  });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((prev) => ({ ...prev, [name]: value }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    // Normally, you'd send formData to backend here
    alert('Profile updated!');
  };

  return (

    <>
    
    
    <div className="edit-profile-container">
      <h2>Edit Profile</h2>
      <form onSubmit={handleSubmit} className="edit-form">
        <label>
          Full Name:
          <input
            type="text"
            name="fullName"
            value={formData.fullName}
            onChange={handleChange}
          />
        </label>

        <label>
          Email Address:
          <input
            type="email"
            name="email"
            value={formData.email}
            onChange={handleChange}
          />
        </label>

        <label>
          Address:
          <input
            type="text"
            name="address"
            value={formData.address}
            onChange={handleChange}
          />
        </label>

        <label>
          Phone Number:
          <input
            type="text"
            name="phone"
            value={formData.phone}
            onChange={handleChange}
          />
        </label>

        <label>
          Password:
          <input
            type="password"
            name="password"
            value={formData.password}
            onChange={handleChange}
          />
        </label>

        <button type="submit" className="save-btn">Save Changes</button>
      </form>
    </div>
    <Footer/>
    </>
          
    
  );
};

export default EditProfilePage;
