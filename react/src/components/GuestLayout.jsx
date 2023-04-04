import {Link, Outlet} from "react-router-dom";
import backgroundImage from "../img.jpg";
import {Dropdown} from "react-bootstrap";

export default function GuestLayout() {
  return (
    <div id="guestLayout">
      <div style={{backgroundImage: `url(${backgroundImage})`, backgroundSize: 'auto'}} >

        <header>
          <div>
            <Link to={'/home'}>Beauty Salon</Link>
          </div>
          <div>
            <nav>
              <Link to="/services">Services</Link>
              &nbsp;
              <Link to="/products">Products</Link>
              &nbsp;
              <Link to="/team">Team</Link>
              &nbsp;
              <Link to="/contact">Contact</Link>
              &nbsp;
              <Link to="/appointment">Appointment</Link>
              <Dropdown>
                <Dropdown.Toggle variant="link">
                  Login or Register
                </Dropdown.Toggle>
                <Dropdown.Menu>
                  <Dropdown.Item href="/login">Login</Dropdown.Item>
                  <Dropdown.Item href="/register">Register</Dropdown.Item>
                </Dropdown.Menu>
              </Dropdown>
            </nav>
          </div>
        </header>
        <main>
        <Outlet></Outlet>
        </main>
      <footer className="pt-4 my-md-5 pt-md-5 border-top">
      <div className="row">
        <ul className="list-styled text-small">
          <li><small className="d-block mb-3 text-muted">&copy;{new Date().getFullYear()}</small></li>
          <li><a className="text-muted" href="/terms">Terms and conditions</a></li>
          <li><a className="text-muted" href="/privacy">Privacy</a></li>
        </ul>
      </div>
      </footer>
      </div>
    </div>
  )
}
