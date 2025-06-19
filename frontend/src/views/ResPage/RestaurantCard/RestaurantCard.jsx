import './RestaurantCard.css';
import StarRating from '../../ResPage/StarRating/StarRating';
import chineseImage from '../../../assets/chinese.png'; 

const RestaurantCard = ({
  image,
  name,
  address,
  phone,
  payment,
  rating,
  onRatingChange 
}) => (
  <div className="restaurant-card">
<img src={chineseImage} alt={name} className="restaurant-card-img" />    <h2 className="restaurant-card-name">{name}</h2>
    <div className="restaurant-card-row">
      <span className="restaurant-card-icon">📍</span>
      <span className="restaurant-card-text">{address}</span>
    </div>
    <div className="restaurant-card-row">
      <span className="restaurant-card-icon">📞</span>
      <span className="restaurant-card-text">{phone}</span>
    </div>
    <div className="restaurant-card-row">
      <span className="restaurant-card-icon">💳</span>
      <span className="restaurant-card-text">{payment}</span>
    </div>
    <div className="restaurant-card-stars">
<StarRating rating={3} onChange={newRating => console.log(newRating)} />    </div>
  </div>
);

export default RestaurantCard;