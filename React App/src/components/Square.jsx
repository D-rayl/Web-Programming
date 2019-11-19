import React from "react";

const Square = props => {
  if (props.isTic) {
    return (
      <button className="Square" onClick={props.draw}>
        {props.value}
      </button>
    );
  } else {
    return (
      <button className="Images" onClick={props.draw}>
        <img src={props.img} alt="#" className="Square" />
      </button>
    );
  }
};
export default Square;
