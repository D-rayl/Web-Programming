import React from "react";

const NavBar = props => {
  return (
    <div className="NavBar">
      <div className="NavStyle">
        <div className="Title">{props.title[0]}</div>
        <div className="Title">{props.title[1]}</div>
        <div className="Title">{props.title[2]}</div>
      </div>
      <button className="GameTitle" onClick={props.refresh}>
        Refresh
      </button>
    </div>
  );
};
export default NavBar;
