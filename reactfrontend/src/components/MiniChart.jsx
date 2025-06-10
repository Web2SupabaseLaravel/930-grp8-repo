import React from 'react';
import { Line } from 'react-chartjs-2';
import { Chart as ChartJS, LineElement, PointElement, CategoryScale, LinearScale } from 'chart.js';

ChartJS.register(LineElement, PointElement, CategoryScale, LinearScale);

const MiniChart = ({ dataPoints }) => {
  const data = {
    labels: dataPoints.map((_, i) => i + 1),
    datasets: [
      {
        data: dataPoints,
        borderColor: '#4f46e5',
        backgroundColor: 'rgba(79,70,229,0.1)',
        tension: 0.4
      }
    ]
  };

  const options = {
    responsive: true,
    plugins: { legend: { display: false } },
    scales: { x: { display: false }, y: { display: false } }
  };

  return <Line data={data} options={options} height={50} />;
};

export default MiniChart;
