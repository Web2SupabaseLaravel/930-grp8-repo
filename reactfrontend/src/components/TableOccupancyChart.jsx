import React from 'react';
import { Bar } from 'react-chartjs-2';
import {
  Chart as ChartJS,
  BarElement,
  CategoryScale,
  LinearScale
} from 'chart.js';

ChartJS.register(BarElement, CategoryScale, LinearScale);

const TableOccupancyChart = ({ data }) => {
      if (!Array.isArray(data)) return <p>Loading Table Occupancy...</p>;

  const labels = data.map(item =>
    `${item.restaurant_name || 'Unknown'} - Table ${item.table_number}`
  );

  const values = data.map(item => parseFloat(item.occupancy_rate));

  const chartData = {
    labels,
    datasets: [
      {
        label: 'Occupancy Rate (%)',
        data: values,
        backgroundColor: '#60a5fa'
      }
    ]
  };

  const options = {
    responsive: true,
    plugins: {
      legend: { display: true }
    },
    scales: {
      y: {
        beginAtZero: true,
        max: 100,
        title: {
          display: true,
          text: 'Occupancy %'
        }
      },
      x: {
        ticks: {
          autoSkip: false,
          maxRotation: 90,
          minRotation: 45
        }
      }
    }
  };

  return (
    <div>
      <Bar data={chartData} options={options} />
    </div>
  );
};

export default TableOccupancyChart;
