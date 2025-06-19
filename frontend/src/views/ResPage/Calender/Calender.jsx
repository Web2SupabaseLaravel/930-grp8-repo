import { useState } from "react";
import './Calender.css';

const Calendar = ({ onDateSelect }) => {
  const [selectedDay, setSelectedDay] = useState(17); // Default selected day

  const handleDayClick = (day) => {
    setSelectedDay(day);
    if (onDateSelect) onDateSelect(day);
  };

  return (
    <div className="calendar-container">
      <div>
        <p className="calendar-title">April 2025</p>
        <span className="calendar-arrow">&#9654;</span>
      </div>
      <div className="calendar-grid">
        {["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"].map((d) => (
          <div key={d} className="calendar-day-header">{d}</div>
        ))}
        {[...Array(30)].map((_, i) => (
          <div
            key={i}
            className={`calendar-day${i + 1 === selectedDay ? " selected" : ""}`}
            onClick={() => handleDayClick(i + 1)}
            style={{ cursor: "pointer" }}
          >
            {i + 1}
          </div>
        ))}
      </div>
    </div>
  );
};

export default Calendar;
