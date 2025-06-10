import React from 'react';
import Header from '../components/Header'
import ProfileCard from '../components/ProfileCard';
import FavoriteFoods from '../components/FavoriteFoods';
import PreviousReservations from '../components/PreviousReservations';
import Footer from '../components/Footer';
import './UserProfile.css';
const UserProfile = () => {
  return (
    <div>
      <Header />
      <div className="container">
        <ProfileCard />
        <div className="row">
          <FavoriteFoods />
          <PreviousReservations />
        </div>
      </div>
      <Footer/>
    </div>
  );
};

export default UserProfile;