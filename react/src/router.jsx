import {createBrowserRouter, Navigate} from "react-router-dom";
import Login from "./pages/Login.jsx";
import Register from "./pages/Register";
import Services from "./pages/Services";
import NotFound from "./pages/NotFound.jsx";
import DefaultLayout from "./components/DefaultLayout.jsx";
import GuestLayout from "./components/GuestLayout.jsx";
import Home from "./pages/Home.jsx";

const router = createBrowserRouter([
  {
    path: '/',
    element: <DefaultLayout></DefaultLayout>,
    children: [
      {
        path: '/',
        element: <Navigate to={'/services'}></Navigate>
      },
      {
        path: '/services',
        element: <Services></Services>
      },
    ]

  },
  {
    path: '/',
    element: <GuestLayout></GuestLayout>,
    children: [
      {
        path: '/home',
        element: <Home></Home>
      },
      {
        path: '/login',
        element: <Login></Login>
      },
      {
        path: '/register',
        element: <Register></Register>
      },
    ]
  },
  {
    path: '*',
    element: <NotFound></NotFound>
  }

])

export default router;
