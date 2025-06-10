import React from 'react';
import './FavoriteFoods.css';
import logo1 from '../assets/Fastfood.PNG';
import logo2 from '../assets/healthyfood.PNG';
import logo3 from '../assets/arabfood.PNG';
const foods = [
  { label: 'Fast Food', emoji: logo1 },
  { label: 'Healthy Food', emoji: logo2 },
  { label: 'Arab Food', emoji: logo3 },
];

const FavoriteFoods = () => {
  return (
    <div className="food-section">
      <h3>Favorite foods</h3>
      {foods.map((food, i) => (
        <div key={i} className="food-item">
          <span className="emoji"><img src={food.emoji} alt="" /></span>
          <span>{food.label}</span>
        </div>
      ))}
    </div>
  );
};

export default FavoriteFoods;