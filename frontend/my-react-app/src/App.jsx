import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import UserProfile from './pages/UserProfile';
import './App.css';
import EditProfilePage from './pages/EditProfilePage';

const App = () => {
  return (
    <>
    <Router>
      <Routes>
      <Route path='/' element={<UserProfile/>} />
      <Route path='/edit-profile' element={<EditProfilePage/>} />
      </Routes>
    </Router>

    
    
    </>
  );
};

export default App;
