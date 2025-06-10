import React from 'react';
import { Line } from 'react-chartjs-2';
import {
  Chart as ChartJS,
  LineElement,
  PointElement,
  LinearScale,
  CategoryScale
} from 'chart.js';

ChartJS.register(LineElement, PointElement, LinearScale, CategoryScale);

const DailyReservationsChart = ({ data }) => {
        if (!Array.isArray(data)) return <p>Loading Daily Reservations...</p>;

  const labels = data.map(item => item.date);
  const values = data.map(item => item.total);

  const chartData = {
    labels,
    datasets: [
      {
        label: 'Reservations',
        data: values,
        borderColor: '#3b82f6',
        backgroundColor: 'rgba(59,130,246,0.1)',
        tension: 0.4
      }
    ]
  };

  const options = {
    responsive: true,
    plugins: {
      legend: { display: false }
    },
    scales: {
      y: { beginAtZero: true }
    }
  };

  return <Line data={chartData} options={options} />;
};

export default DailyReservationsChart;
