import {Link} from "react-router-dom";
import {useRef, useState} from "react";
import axiosClient from '../axios-client'
import {useStateContext} from '../Context/ContextProvider'

export default function  Login() {
  const {setToken, setUser} = useStateContext();
  const [errors, setErrors]= useState(null);
  const emailRef = useRef();
  const passwordRef = useRef();
  const onSubmit = (ev) => {
    ev.preventDefault();
    const payload = {
      email: emailRef.current.value,
      password: passwordRef.current.value,
    }
    setErrors(null)

    axiosClient.post('/login', payload)
      .then(({data}) => {
        console.log(data, 'test')
        setToken(data.token);
        setUser(data.user);
      }).catch(err => {
      const response = err.response;
      if (response && response.status === 422) {
        if (response.data.errors){
          setErrors(response.data.errors);
        } else {
          setErrors({
            email: [response.data.message]
          })
        }
      }
    })

  }
  return (
    <div className="row justify-content-center">
      <div className="col-md-8">
        <form onSubmit={onSubmit}>
          <h4 className="title">
            Login into your account
          </h4>
          {errors &&
            <div className="alert">
              {Object.keys(errors).map(key => (
                <p key={key}>{errors[key][0]}</p>
              ))}
            </div>
          }
          <div className="form-group row">
            <div className="col-md-6">
              <input ref={emailRef} type="email" placeholder="Email"/>
            </div>
          </div>
          <div className="form-group row">
            <div className="col-md-6">
              <input ref={passwordRef} type="password" placeholder="Password"/>
            </div>
          </div>

          <div className="form-group row mb-0">
            <div className="col-md-8">
              <button type="submit" className="btn btn-primary">
               Login
              </button>
            </div>
          </div>
          <p className="message">
            Not registered? <Link to="/register">Create an account</Link>
          </p>
        </form>
      </div>
    </div>
  )
}
