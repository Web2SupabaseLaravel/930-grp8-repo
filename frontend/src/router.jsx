import { createBrowserRouter } from 'react-router-dom';
import SignIn from './views/SingIn/SignIn.jsx';
import Signup from './views/Signup.jsx';
import Dashboard from './views/Dashboard.jsx';
import RestaurantForm from './views/RestaurantForm/RestaurantForm.jsx';
import ResPage from './views/ResPage/ResPage.jsx';

const router = createBrowserRouter([
     
    {
        path: '/signin',
      element: <SignIn />,
    },
    {
        path: '/signup',
        element: <Signup />,
    },
    {
        path: '/dashboard',
        element: <Dashboard />,
    },
    {
        path: '/restaurantform',
        element: <RestaurantForm />,
    },
    {
        path: '/respage',
        element: <ResPage />,
    }

]);

export default router;