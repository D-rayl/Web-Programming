import React, { Component } from "react";

class Login extends Component {
  constructor(props) {
    super(props);
    this.state = {
      username: "",
      age: null,
      errormessage: "",
      description: "Additional information",
      gender: null
    };
  }
  onSubmitHandler = event => {
    event.preventDefault();
    let a = this.state.age;
    let err = "";
    if (a !== "" && !Number(a)) {
      err = <strong> Your age must be numerical</strong>;
      this.setState({ errormessage: err });
      alert("Invalid age");
    } else {
      this.props.authorise(true);
    }
  };
  myChangedHandler = event => {
    let n = event.target.name;
    let val = event.target.value;
    this.setState({ [n]: val });
  };

  render() {
    let header = "";
    if (this.state.username || this.state.age) {
      header = (
        <h1>
          {this.state.username} {this.state.age}
        </h1>
      );
    } else {
      header = "You must login first";
    }
    return (
      <>
        {header}
        <form onSubmit={this.onSubmitHandler}>
          <p>
            Enter your name:
            <input
              type="text"
              name="username"
              onChange={this.myChangedHandler}
            />
          </p>
          <p>
            Enter your age:
            <input type="text" name="age" onChange={this.myChangedHandler} />
            {this.state.errormessage}
          </p>
          <div>
            <select value={this.state.gender}>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div>
            <textarea
              name="description"
              value={this.state.description}
              onChange={this.myChangedHandler}
            />
          </div>
          <input type="submit" />
        </form>
      </>
    );
  }
}
export default Login;
