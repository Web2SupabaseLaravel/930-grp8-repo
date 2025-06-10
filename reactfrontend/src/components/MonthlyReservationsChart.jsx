import React from 'react';
import { Line } from 'react-chartjs-2';

const MonthlyReservationsChart = ({ data }) => {
  if (!Array.isArray(data)) return <p>Loading monthly reservations...</p>;

  const labels = data.map(item => item.month);
  const counts = data.map(item => item.total);

  const chartData = {
    labels,
    datasets: [
      {
        label: 'Monthly Reservations',
        data: counts,
        fill: false,
        borderColor: 'blue',
        tension: 0.3
      }
    ]
  };

  return (
    <div>
      <h3>Monthly Reservations</h3>
      <Line data={chartData} />
    </div>
  );
};

export default MonthlyReservationsChart;
