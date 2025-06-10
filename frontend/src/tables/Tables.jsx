import React, { useEffect, useState } from 'react';
import api from './api';
import TableList from '../components/TableList';
import '../styles/tables.css';

const Tables = () => {
  const [tables, setTables] = useState([]);

  useEffect(() => {
    const fetchTables = async () => {
      try {
        const response = await api.get('/tables');
        setTables(response.data);
      } catch (error) {
        console.error('Failed to fetch tables:', error);
      }
    };

    fetchTables();
  }, []);

  const handleTableClick = async (tableNumber, currentStatus) => {
    try {
      const newStatus = currentStatus === 'available' ? 'occupied' : 'available';

      await api.put(`/tables/${tableNumber}`, { status: newStatus });

      setTables((prevTables) =>
        prevTables.map((table) =>
          table.Table_naumber === tableNumber ? { ...table, status: newStatus } : table
        )
      );
    } catch (error) {
      console.error('Failed to update table status:', error);
      alert('Error updating table status. Please try again.');
    }
  };

  return (
    <div className="tables-container">
      <h2>Table Booking</h2>
      <div className="tables-grid">
        {tables.map((table) => (
          <TableList
            key={table.Table_naumber}
            table={table}
            onClick={() => handleTableClick(table.Table_naumber, table.status)}
          />
        ))}
      </div>
    </div>
  );
};

export default Tables;
