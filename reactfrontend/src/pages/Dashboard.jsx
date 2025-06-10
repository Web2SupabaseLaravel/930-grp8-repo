import React, { useEffect, useState } from 'react';
import './Dashboard.css';
import axios from '../api/axiosInstance';
import MiniChart from '../components/MiniChart';
import DailyReservationsChart from '../components/DailyReservationsChart';
import WeeklyReservationsChart from '../components/WeeklyReservationsChart';
import TableOccupancyChart from '../components/TableOccupancyChart';
import UsersByAgeChart from '../components/UsersByAgeChart';
import CancellationsByDayChart from '../components/CancellationsByDayChart';
import NoShowByHourChart from '../components/NoShowByHourChart';
import UsersBySignupYearChart from '../components/UsersBySignupYearChart';
import UsersByAddressChart from '../components/UsersByAddressChart';
import MonthlyReservationsChart from '../components/MonthlyReservationsChart';
import AverageSeatingTimeChart from '../components/AverageSeatingTimeChart';
const Dashboard = () => {
  const [stats, setStats] = useState({
    users: 0,
    restaurants: 0,
    reservations: 0
  });
  const [selectedReport, setSelectedReport] = useState('');
  const [reportData, setReportData] = useState(null);

  const reports = [
    { label: 'Daily Reservations', endpoint: 'admin/reports/reservations/daily' },
    { label: 'Weekly Reservations', endpoint: 'admin/reports/reservations/weekly' },
    { label: 'Monthly Reservations', endpoint: 'admin/reports/reservations/monthly' },
    { label: 'Table Occupancy', endpoint: 'admin/reports/tables/occupancy' },
    { label: 'Average Seating Time', endpoint: 'admin/reports/tables/avg-time' },
    { label: 'Users by Address', endpoint: 'admin/reports/users/by-address' },
    { label: 'Cancellations by Day', endpoint: 'admin/reports/cancellations/by-day' },
    { label: 'No Show by Hour', endpoint: 'admin/reports/cancellations/no-show-by-hour' },
    { label: 'Users by Age Range', endpoint: 'admin/reports/users/by-age-range' },
    { label: 'Users by Signup Year', endpoint: 'admin/reports/users/by-signup-year' }
  ];

  useEffect(() => {
    const fetchStats = async () => {
      const token = localStorage.getItem('jwt');
      const headers = { Authorization: `Bearer ${token}` };
      const [u, r, res] = await Promise.all([
        axios.get('admin/reports/users/count', { headers }),
        axios.get('admin/reports/restaurants/count', { headers }),
        axios.get('admin/reports/reservations/count', { headers })
      ]);
            console.log('Stats loaded:', u.data, r.data, res.data); // ← هذا يبين إذا البيانات وصلت

      setStats({
        users: u.data.total,
        restaurants: r.data.total,
        reservations: res.data.total
      });
    };
    fetchStats();
  }, []);

  const handleReportChange = async (e) => {
    const endpoint = e.target.value;
    setSelectedReport(endpoint);
    if (!endpoint) {
      setReportData(null);
      return;
    }
    const token = localStorage.getItem('jwt');
    const response = await axios.get(endpoint, {
      headers: { Authorization: `Bearer ${token}` }
    });
    setReportData(response.data);
  };

return (
  <div className="dashboard">

    <div className="page-title">
      <h2>Dashboard</h2>
      <p>Overview of all key reports</p>
    </div>

    <div className="stats">
      <div className="card">
        <p>Users</p>
        <h3>{stats.users}</h3>
        <MiniChart dataPoints={[5, 7, 6, 9, 10, 11, stats.users]} />
      </div>
      <div className="card">
        <p>Restaurants</p>
        <h3>{stats.restaurants}</h3>
        <MiniChart dataPoints={[3, 5, 4, 8, 7, 6, stats.restaurants]} />
      </div>
      <div className="card">
        <p>Reservations</p>
        <h3>{stats.reservations}</h3>
        <MiniChart dataPoints={[8, 9, 7, 6, 10, 12, stats.reservations]} />
      </div>
    </div>

    <div className="report-select">
      <label htmlFor="report">Select Report:</label>
      <select id="report" value={selectedReport} onChange={handleReportChange}>
        <option value="">-- Select Report --</option>
        {reports.map((r) => (
          <option key={r.endpoint} value={r.endpoint}>
            {r.label}
          </option>
        ))}
      </select>
    </div>

    <div className="report-content">
      {selectedReport === 'admin/reports/reservations/daily' && <DailyReservationsChart data={reportData} />}
      {selectedReport === 'admin/reports/reservations/weekly' && <WeeklyReservationsChart data={reportData} />}
      {selectedReport === 'admin/reports/reservations/monthly' && <MonthlyReservationsChart data={reportData} />}
      {selectedReport === 'admin/reports/tables/occupancy' && <TableOccupancyChart data={reportData} />}
      {selectedReport === 'admin/reports/tables/avg-time' && <AverageSeatingTimeChart data={reportData} />}
      {selectedReport === 'admin/reports/users/by-address' && <UsersByAddressChart data={reportData} />}
      {selectedReport === 'admin/reports/cancellations/by-day' && <CancellationsByDayChart data={reportData} />}
      {selectedReport === 'admin/reports/cancellations/no-show-by-hour' && <NoShowByHourChart data={reportData} />}
      {selectedReport === 'admin/reports/users/by-age-range' && <UsersByAgeChart data={reportData} />}
      {selectedReport === 'admin/reports/users/by-signup-year' && <UsersBySignupYearChart data={reportData} />}
    </div>


  </div>
);

};

export default Dashboard;
