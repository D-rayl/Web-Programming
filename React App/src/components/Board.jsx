import React, { Component } from "react";
import Square from "./Square";

class Board extends Component {
  renderSquare(i) {
    const { squares, images, isTicTac } = this.props;
    if (isTicTac) {
      return (
        <Square
          isTic={isTicTac}
          value={squares[i]}
          draw={() => this.props.handleGo(i)}
        />
      );
    } else {
      return (
        <Square
          isTic={isTicTac}
          img={images[i]}
          draw={() => this.props.handleGo(i)}
        />
      );
    }
  }
  render() {
    return (
      <div className="Container">
        <div className="innerContainer">
          <div className="Status">
            <h2>{this.props.sentStatus}</h2>
          </div>

          <div className="Table">
            <div className="Row">
              {this.renderSquare(0)}
              {this.renderSquare(1)}
              {this.renderSquare(2)}
            </div>
            <div className="Row">
              {this.renderSquare(3)}
              {this.renderSquare(4)}
              {this.renderSquare(5)}
            </div>
            <div className="Row">
              {this.renderSquare(6)}
              {this.renderSquare(7)}
              {this.renderSquare(8)}
            </div>
          </div>
        </div>
      </div>
    );
  }
}

export default Board;
