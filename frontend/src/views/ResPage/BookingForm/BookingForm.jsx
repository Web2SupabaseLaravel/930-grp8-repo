import { useState } from "react";
import "./BookingForm.css";

const BookingForm = () => {
  const [guests, setGuests] = useState(2);
  const [date, setDate] = useState("Today");
  const [time, setTime] = useState("12 PM");

  return (
    <div className="booking-form-bar">
      <div className="booking-form-section">
        <span className="booking-form-label">Guests</span>
        <select
          className="booking-form-select"
          value={guests}
          onChange={(e) => setGuests(e.target.value)}
        >
          {[...Array(10)].map((_, i) => (
            <option key={i} value={i + 1}>
              {i + 1} Guest{s(i + 1)}
            </option>
          ))}
        </select>
      </div>
      <div className="booking-form-section">
        <span className="booking-form-label">Date</span>
        <select
          className="booking-form-select"
          value={date}
          onChange={(e) => setDate(e.target.value)}
        >
          <option>Today</option>
          <option>Tomorrow</option>
        </select>
      </div>
      <div className="booking-form-section">
        <span className="booking-form-label">Time</span>
        <select
          className="booking-form-select"
          value={time}
          onChange={(e) => setTime(e.target.value)}
        >
          <option>12 PM</option>
          <option>1 PM</option>
          <option>2 PM</option>
          <option>3 PM</option>
          <option>4 PM</option>
          <option>5 PM</option>
          <option>6 PM</option>
          <option>7 PM</option>
        </select>
      </div>
    </div>
  );
};

function s(n) {
  return n === 1 ? "" : "s";
}

export default BookingForm;
