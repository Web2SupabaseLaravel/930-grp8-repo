import React, { useState } from 'react';
import './ModifyReservationForm.css';
const ModifyReservationForm = ({ reservation }) => {
  const [formData, setFormData] = useState({ ...reservation });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((prev) => ({
      ...prev,
      [name]: value
    }));
  };
  
  const handleSubmit = (e) => {
    e.preventDefault();
    console.log('Modified Reservation:', formData);
    alert('Reservation updated! (You can now send this to your API)');
  };
  return (
    <form className="modify-form" onSubmit={handleSubmit}>
      <h3>Modify Reservation</h3>

      <label>
        Name:
        <input type="text" name="name" value={formData.name} onChange={handleChange} />
      </label>

      <label>
        Number of People:
        <input type="number" name="number_of_people" value={formData.number_of_people} onChange={handleChange} />
      </label>

      <label>
        Restaurant Rating:
        <input type="number" name="resto_rating" value={formData.resto_rating} onChange={handleChange} />
      </label>

      <label>
        Reservation Time:
        <input type="datetime-local" name="reservation_time" value={formData.reservation_time.slice(0, 16)} onChange={handleChange} />
      </label>

      <label>
        End Time:
        <input type="datetime-local" name="end_time" value={formData.end_time.slice(0, 16)} onChange={handleChange} />
      </label>

      <label>
        Table Number:
        <input type="number" name="table_number" value={formData.table_number} onChange={handleChange} />
      </label>

      <label>
        Status:
        <select name="status" value={formData.status} onChange={handleChange}>
          <option value="confirmed">Confirmed</option>
          <option value="cancelled">Cancelled</option>
        </select>
      </label>

      <button type="submit" className="btn confirm">Save Changes</button>
    </form>
  );
};

export default ModifyReservationForm;
