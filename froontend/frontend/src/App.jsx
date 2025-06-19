import React from 'react';
import ReservationConfirmation from './components/randComponents/ReservationConfirmation';
import Header from './components/randComponents/Header';
import Footer from './components/randComponents/Footer';
function App() {
  return (
    <div className="App">
      <Header/>
      <ReservationConfirmation/>
      <Footer/>
    </div>
  );
}

export default App;