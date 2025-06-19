import './RestaurantInfo.css';

const RestaurantInfo = ({ name, location, hours, rating }) => (
  <div className="restaurant-info-container">
    <h2 className="restaurant-info-name">{name}</h2>
    <p className="restaurant-info-location">📍 {location}</p>
    <p className="restaurant-info-hours">{hours}</p>
    <p className="restaurant-info-rating">★ {rating}</p>
  </div>
);

export default RestaurantInfo;