import React from 'react';
import { Line } from 'react-chartjs-2';

const CancellationsByDayChart = ({ data }) => {
      if (!Array.isArray(data)) return <p>Loading Cancellations By Day...</p>;

  const labels = data.map(item => (item.day_of_week || 'Unknown').trim());
  const values = data.map(item => item.total);

  const chartData = {
    labels,
    datasets: [
      {
        label: 'Cancellations',
        data: values,
        borderColor: '#f87171',
        backgroundColor: 'rgba(248,113,113,0.1)',
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

export default CancellationsByDayChart;
