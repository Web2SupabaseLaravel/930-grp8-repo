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

const WeeklyReservationsChart = ({ data }) => {
  if (!Array.isArray(data)) return <p>Loading weekly reservations...</p>;

  const labels = data.map(item =>
    new Date(item.week_start).toLocaleDateString('en-US', {
      month: 'short',
      day: 'numeric'
    })
  );
  const values = data.map(item => item.total);

  const chartData = {
    labels,
    datasets: [
      {
        label: 'Reservations',
        data: values,
        borderColor: '#10b981',
        backgroundColor: 'rgba(16,185,129,0.1)',
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

export default WeeklyReservationsChart;
