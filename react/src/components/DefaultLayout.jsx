import {Navigate, Outlet} from "react-router-dom";
import {useStateContext} from "../Context/ContextProvider.jsx";
import backgroundImage from "../img.jpg";

export default function DefaultLayout() {
  const {token} = useStateContext();
  if (!token) {
    return <Navigate to={'/home'} />
  }
  return (
    <div style={{backgroundImage: `url(${backgroundImage})`, backgroundSize: 'auto'}}>
      <Outlet></Outlet>
    </div>
  )
}
