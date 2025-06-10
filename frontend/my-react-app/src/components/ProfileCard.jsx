import React from 'react';
import './ProfileCard.css';
import { Link } from 'react-router-dom';
const ProfileCard = () => {
  return (
    <div className="profile-container">
      <div className="profile-left">
        <div className="profile-avatar">
          <div className="circle-avatar"><i class="bi bi-person-circle" ></i></div>
          <div>
            <h2 className="name">Sami Braik</h2>
            <p className="email">sami2025@gmail.com</p>
          </div>
        </div>

        <div className="profile-info">
          <div className="info-item">
            <span><i class="bi bi-house-door-fill"></i> Palestine, Nablus</span>
          </div>
          <div className="info-item">
            <span><i class="bi bi-telephone-fill"></i> (+970)-5950-55344</span>
          </div>
          <div className="info-item">
            <span><i class="bi bi-calendar4"></i> joined October 2022</span>
          </div>
        </div>
      </div>

      <div className="profile-right">
        <Link to="/edit-profile">
        <button className="profile-btn">Edit Profile</button>
        </Link>
        <button className="profile-btn">Dashboard</button>
      </div>
    </div>
  );
};

export default ProfileCard;
