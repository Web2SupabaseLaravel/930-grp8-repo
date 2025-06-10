import React from 'react';
import './PreviousReservations.css';
import logo1 from '../assets/Hulk.PNG';
import logo2 from '../assets/Malaky.PNG';
import logo3 from '../assets/Black.PNG';
const reservations = [
  { name: 'Hulk Burger', date: '7 June 2024', emoji:logo1},
  { name: 'Malaky Chicken', date: '25 August 2024', emoji: logo2 },
  { name: 'Black Shawarma', date: '21 May 2024', emoji: logo3 },
];

const PreviousReservations = () => {
  return (
    <div className="reservation-section">
      <h3>Previous reservations</h3>
      {reservations.map((item, i) => (
        <div key={i} className="reservation-item">
          <span className="emoji"><img src={item.emoji} alt="" /></span>
          <div>
            <strong>{item.name}</strong>
            <p className="date">Last reservation: {item.date}</p>
          </div>
        </div>
      ))}
    </div>
  );
};

export default PreviousReservations;