import React, { Component } from "react";
import Board from "./Board";

class GoFish extends Component {
  render() {
    const status = "Number of tries: " + this.props.count;
    return (
      <Board
        images={this.props.squares}
        sentStatus={status}
        handleGo={i => this.handleGo(i)}
      />
    );
  }
  handleGo(i) {
    const squares = [...this.props.squares];
    if (squares[i]) {
      return;
    }
    this.props.handleTurn(i);
  }
}

export default GoFish;
