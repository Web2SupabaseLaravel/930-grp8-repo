import React from 'react';
import '../styles/tables.css';

const TableList = ({ table, onClick }) => {
  const { Table_naumber, status, Size } = table;

  return (
    <div className={`table-item ${status === 'available' ? 'available' : 'occupied'}`}>
      <div className="table-circle">
        <span className="table-number">{Table_naumber}</span>
      </div>
      <div className="table-info">
        <p>الحالة: {status}</p>
        <p>الحجم: {Size}</p>
      </div>
      <button
        className={`book-btn ${status === 'occupied' ? 'booked' : ''}`}
        onClick={onClick}
        disabled={status === 'occupied'}
      >
        {status === 'available' ? 'احجز' : 'محجوز'}
      </button>
    </div>
  );
};

export default TableList;
