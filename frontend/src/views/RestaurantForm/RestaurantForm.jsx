import React, { useState } from 'react';
import './RestaurantForm.css'; 
import axios from 'axios';


const RestaurantForm = () => {
  const [formData, setFormData] = useState({
    name: '',
    country: '',
    city: '',
    street: '',
    building: '',
    phone_number: '',
    category: '',
    close_time: '',
    open_time: '',
    seating_capacity: 0,
  });

  const [isSubmitting, setIsSubmitting] = useState(false);
  const [successMessage, setSuccessMessage] = useState('');
  const [errorMessage, setErrorMessage] = useState('');

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((prev) => ({
      ...prev,
      [name]: name === 'seating_capacity' ? parseInt(value) : value,
    }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    setIsSubmitting(true);
    setSuccessMessage('');
    setErrorMessage('');

    try {
    const response = await axios.post('http://127.0.0.1:8000/api/restaurant', formData, {
      headers: {
        'Content-Type': 'application/json',
      },
    });

      if (!response.ok) {
        const errorData = await response.json();
        throw new Error(errorData.message || 'Failed to create restaurant.');
      }

      const result = await response.json();
      setSuccessMessage('Restaurant created successfully!');
      setFormData({
        name: '',
        country: '',
        city: '',
        street: '',
        building: '',
        phone_number: '',
        category: '',
        close_time: '',
        open_time: '',
        seating_capacity: 0,
      });
    } catch (err) {
      setErrorMessage(err.message);
    } finally {
      setIsSubmitting(false);
    }
  };

  return (
    <div className="form-container">
  <h2>Create Restaurant</h2>
  <form onSubmit={handleSubmit}>
    {['Name', 'Country', 'City', 'Street', 'Building', 'Phone Number', 'Category'].map((field) => (
      <div key={field} className="form-group">
        <label>{field.replace('_', ' ')}</label>
        <input
          type="text"
          name={field}
          value={formData[field]}
          onChange={handleChange}
          required
        />
      </div>
    ))}
    <div className="form-group">
      <label>Open Time</label>
      <input
        type="time"
        name="open_time"
        value={formData.open_time}
        onChange={handleChange}
        required
      />
    </div>
    <div className="form-group">
      <label>Close Time</label>
      <input
        type="time"
        name="close_time"
        value={formData.close_time}
        onChange={handleChange}
        required
      />
    </div>
    <div className="form-group">
      <label>Seating Capacity</label>
      <input
        type="number"
        name="seating_capacity"
        value={formData.seating_capacity}
        onChange={handleChange}
        required
      />
    </div>
    <button type="submit" disabled={isSubmitting}>
      {isSubmitting ? 'Submitting...' : 'Submit'}
    </button>
  </form>

  {successMessage && <p className="success-message">{successMessage}</p>}
  {errorMessage && <p className="error-message">{errorMessage}</p>}
</div>

  );
};

export default RestaurantForm;
