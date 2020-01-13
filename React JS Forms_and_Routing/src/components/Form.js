import React, { Component } from "react";
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link,
  Redirect
} from "react-router-dom";
import Login from "./Login";

class Form extends Component {
  state = {
    auth: false
  };

  handleAuthentication = value => {
    this.setState({ auth: value });
    this.render();
  };

  render() {
    return (
      <Router>
        <div>
          <ul>
            <li>
              <Link to="/public">Public</Link>
            </li>
            <li>
              <Link to="/Protected">Protected</Link>
            </li>
          </ul>
          <Switch>
            <Route path="/public">
              <PublicData />
            </Route>
            <Route path="/Login">
              <Login
                authorise={bool => this.handleAuthentication(bool)}
                a={this.state.auth}
              />
            </Route>
            <PrivateRoute path="/Protected">
              <ProtectedData />
            </PrivateRoute>
          </Switch>
        </div>
      </Router>
    );
  }
}
export default Form;

class PrivateRoute extends Component {
  constructor(props) {
    super(props);
  }
  render() {
    return (
      <Route
        render={() =>
          this.props.a ? (
            ProtectedData()
          ) : (
            <Redirect to={{ pathname: "/login" }} />
          )
        }
      />
    );
  }
}

function PublicData() {
  return <h2>This is a public area</h2>;
}
function ProtectedData() {
  return <h1>Secure area</h1>;
}
