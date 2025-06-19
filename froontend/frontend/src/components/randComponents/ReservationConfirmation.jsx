import axios from 'axios';
import './Reservation.css';
import photo1 from '/src/assets/photo1.png';
import React, { useState } from 'react';
import ModifyReservationForm from './ModifyReservationForm'
const ReservationConfirmation = () => {
    const [showModifyForm, setShowModifyForm] = useState(false);

  const handleConfirmReservation = async () => {
    try {
      const response = await axios.post('http://localhost:8000/api/reservations', {
        phone_number: '059000088000',
        restaurant: 'cc',
        date: '2025-04-15',
        time: '17:39',
        guests: 2,
        table_number: 9,
        reservation_id: 'CR7726'
      });
      console.log('Reservation confirmed:', response.data);
      alert('Reservation saved successfully!');
    } catch (error) {
      console.error('Error saving reservation:', error);
      alert('Failed to save reservation.');
    }
  };


const reservation = {
  reservationid: 1,
  name: 'Reservation #125',
  number_of_people: 4,
  resto_rating: '2',
  reservation_time: '2025-04-14T05:30',
  end_time: '2025-04-14T07:30',
  status: 'cancelled',
  table_number: 15,
};

  return (
    <div className="rand">
      <div className="div-2">
        <div className="text-wrapper-6">Reservation Confirmation</div>
        <div className="reservation-info">
          <div className="info-box">
            <p><strong>Phone Number:</strong> 059000000000</p>
            <p><strong>Restaurant:</strong> cccc</p>
            <p><strong>Date:</strong> 18/4/2025</p>
            <p><strong>Time:</strong> 5:30pm</p>
            <p><strong>Guests:</strong> 5</p>
            <p><strong>Table Number:</strong> 4</p>
            <p><strong>Reservation Id:</strong> #CR8726</p>
          </div>
          <div className="image-box">
            <img src={photo1} alt="Restaurant" />
            <button id="view-page-btn33" className="view-page-btn">View Restaurant Page</button>
          </div>
        </div>

        {/* Instructions */}
        <div className="overlap-2">
          <div className="rectangle-2"></div>
          <div className="text-wrapper-3">instructions</div>
          <p className="p">• Please arrive 10 minutes early.</p>
          <p className="text-wrapper-4">• you can modify or cancel the reservation up to 2 hours in advance.</p>
          <p className="text-wrapper-5">• For any questions call us at (+970)567889.</p>
        </div>

        {/* Buttons */}
<button
  className="button-danger button-danger-2"
  onClick={() => setShowModifyForm(true)}
>
  Modify reservation
</button>

        <button className="button-danger button-danger-4" onClick={handleConfirmReservation}>
          Confirm reservation
        </button>

        {showModifyForm && (
  <ModifyReservationForm
    reservation={reservation}
    onUpdate={() => {
      setShowModifyForm(false);
      alert('Reservation updated!');
    }}
  />
)}

      </div>
    </div>
  );
};

export default ReservationConfirmation;
