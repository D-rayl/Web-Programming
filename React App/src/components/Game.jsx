import React, { Component } from "react";
import TicTacToe from "./TicTacToe";
import GoFish from "./GoFish";

class Game extends Component {
  renderGame() {
    const { squares, next, images, count, isTicTac } = this.props;
    if (isTicTac) {
      return (
        <TicTacToe
          isTicTac={isTicTac}
          next={next}
          squares={squares}
          handleTurn={i => this.handleTicTacTurn(i)}
        />
      );
    } else {
      return (
        <GoFish
          images={images}
          squares={squares}
          next={next}
          count={count}
          isTicTac={isTicTac}
          handleTurn={i => this.handleGoFishTurn(i)}
        />
      );
    }
  }

  render() {
    return (
      <div className="Game">
        <div className="Section">
          <div className="sideContent">
            <p className="GameTitle">Tic Tac Toe</p>
            <button
              className="GameBtn"
              onClick={() => this.props.changeGame(true)}
            >
              Play
            </button>
          </div>
        </div>
        <div className="Section">{this.renderGame()}</div>
        <div className="Section">
          <div className="sideContent">
            <p className="GameTitle">Go Fish</p>
            <button
              className="GameBtn"
              onClick={() => this.props.changeGame(false)}
            >
              Play
            </button>
          </div>
        </div>
      </div>
    );
  }

  handleTicTacTurn(i) {
    const squares = [...this.props.squares];
    squares[i] = this.props.next ? "X" : "O";
    this.props.setTicTacState(squares, !this.props.next);
  }
  handleGoFishTurn(i) {
    const { imagesArray } = this.props;
    const picks = [...this.props.picks];
    const squares = [...this.props.squares];
    if (picks[0] === -1) {
      picks[0] = i;
      squares[i] = imagesArray[i];
    } else {
      picks[1] = i;
      squares[i] = imagesArray[i];
    }
    let newCount = this.props.count;
    if (picks[1] !== -1) {
      newCount++;
      if (squares[picks[0]] === squares[picks[1]]) {
        picks[0] = -1;
        picks[1] = -1;
      } else {
        squares[picks[0]] = null;
        squares[picks[1]] = null;
        picks[0] = -1;
        picks[1] = -1;
      }
    }
    this.props.setGoFishState(squares, newCount, picks);
  }
}

export default Game;
