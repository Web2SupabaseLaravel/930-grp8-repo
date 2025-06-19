import { useState } from "react";
import "./StarRating.css"; 

const StarRating = ({ rating: initialRating = 0, onChange }) => {
  const [rating, setRating] = useState(initialRating);

  const handleClick = (i) => {
    setRating(i + 1);
    if (onChange) onChange(i + 1);
  };

  return (
    <div className="star-rating">
      {[...Array(5)].map((_, i) => (
        <span
          key={i}
          onClick={() => handleClick(i)}
          className={i < rating ? "filled" : ""}
        >
          {i < rating ? "★" : "☆"}
        </span>
      ))}
    </div>
  );
};

export default StarRating;
