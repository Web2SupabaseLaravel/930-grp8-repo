// src/components/AverageSeatingTimeChart.jsx
import React from 'react';
import { Bar } from 'react-chartjs-2';

const AverageSeatingTimeChart = ({ data }) => {
    if (!Array.isArray(data)) return <p>Loading Average Seating Time...</p>;

  const labels = data.map(item =>
    `${item.restaurant_name?.trim() || 'Unknown'} - Table ${item.table_number}`
  );

  const values = data.map(item =>
    parseFloat((item.avg_minutes * 1).toFixed(2)) // أو *60 إذا حبيت
  );

  const chartData = {
    labels,
    datasets: [
      {
        label: 'Avg Seating Time (minutes)',
        data: values,
        backgroundColor: 'rgba(75,192,192,0.6)'
      }
    ]
  };

  const options = {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true,
        suggestedMax: 10
      }
    }
  };

  return (
    <div>
      <h3>Average Seating Time</h3>
      <Bar data={chartData} options={options} />
    </div>
  );
};

export default AverageSeatingTimeChart;
