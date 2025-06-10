import React from 'react';
import { Bar } from 'react-chartjs-2';
import {
  Chart as ChartJS,
  BarElement,
  CategoryScale,
  LinearScale
} from 'chart.js';

ChartJS.register(BarElement, CategoryScale, LinearScale);

const NoShowByHourChart = ({ data }) => {
    if (!Array.isArray(data)) return <p>Loading No Show By Hour...</p>;

  const labels = data.map(item => item.hour);
  const values = data.map(item => item.total);

  const chartData = {
    labels,
    datasets: [
      {
        label: 'No Show',
        data: values,
        backgroundColor: 'rgba(139,92,246,0.6)'
      }
    ]
  };

  const options = {
    responsive: true,
    indexAxis: 'y',
    scales: {
      x: { beginAtZero: true }
    }
  };

  return <Bar data={chartData} options={options} />;
};

export default NoShowByHourChart;
