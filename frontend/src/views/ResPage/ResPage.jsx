import { restaurantData } from "../../components/data/restaurantData.js";


const ResPage = () => {
    const data = restaurantData;
  return (
    <div className="p-4">
       <RestaurantInfo
        name={data.name}
        location={data.location}
        hours={data.hours}
        rating={data.rating}
      />
      <BookingForm/>  
      <div className="main-flex-row">
        <Calendar/>
        <RestaurantCard
          image={data.image}
          name={data.name}
          address={data.address}
          phone={data.phone}
          payment={data.payment}
          rating={data.rating}
        />
      </div>
    </div>
  );
};

export default ResPage;
