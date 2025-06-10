import React from 'react';
import { Bar } from 'react-chartjs-2';
import {
  Chart as ChartJS,
  BarElement,
  CategoryScale,
  LinearScale
} from 'chart.js';

ChartJS.register(BarElement, CategoryScale, LinearScale);

const UsersByAddressChart = ({ data }) => {
  if (!Array.isArray(data)) return <p>Loading user addresses...</p>;

  const labels = data.map(item => item.address);
  const values = data.map(item => item.total);

  const chartData = {
    labels,
    datasets: [
      {
        label: 'Users',
        data: values,
        backgroundColor: 'rgba(251,191,36,0.6)'
      }
    ]
  };

  const options = {
    responsive: true,
    scales: {
      y: { beginAtZero: true }
    }
  };

  return <Bar data={chartData} options={options} />;
};

export default UsersByAddressChart;
