import React, { Component } from "react";
import "./App.css";
import pic1 from "./img/pic1.jpg";
import pic2 from "./img/pic2.jpg";
import pic3 from "./img/pic3.jpg";
import pic4 from "./img/pic4.jpg";
import pic5 from "./img/pic5.jpg";
import Game from "./components/Game";
import NavBar from "./components/NavBar";

class App extends Component {
  state = {
    isTicTac: true,
    title: ["Tic", "Tac", "Toe"],
    refresh: false,
    squares: Array(9).fill(null),
    imagesArray: Array(9).fill(null),
    images: [pic1, pic2, pic3, pic4],
    next: true,
    count: 0,
    picks: [-1, -1]
  };

  render() {
    const {
      isTicTac,
      title,
      refresh,
      squares,
      imagesArray,
      next,
      count,
      picks
    } = this.state;
    return (
      <>
        <NavBar title={title} refresh={this.refreshGame} />
        <Game
          squares={squares}
          imagesArray={imagesArray}
          isTicTac={isTicTac}
          refresh={refresh}
          next={next}
          count={count}
          picks={picks}
          changeGame={game => this.changeGame(game, false)}
          setTicTacState={(squares, next) => this.setTicTacState(squares, next)}
          setGoFishState={(squares, picks, count) =>
            this.setGoFishState(squares, picks, count)
          }
        />
      </>
    );
  }
  setTicTacState = (squares, next) => {
    this.setState({ squares, next });
  };
  setGoFishState = (squares, count, picks) => {
    this.setState({ squares, count, picks });
  };

  changeGame = (isTic, isRefresh) => {
    const { isTicTac } = this.state;

    if ((isTic && !isTicTac) || (isRefresh && isTic)) {
      const squares = [...this.state.squares];
      for (let i = 0; i < squares.length; i++) {
        squares[i] = null;
      }
      this.setState({
        squares,
        title: ["Tic", "Tac", "Toe"],
        isTicTac: true,
        next: true,
        count: 0
      });
    } else if ((!isTic && isTicTac) || (isRefresh && !isTic)) {
      const imagesArray = this.setImages();
      const squares = [...this.state.squares];
      for (let i = 0; i < squares.length; i++) {
        squares[i] = null;
      }
      this.setState({
        squares,
        imagesArray,
        title: ["Go", "?", "Fish"],
        count: 0,
        isTicTac: false
      });
    }
  };

  setImages = () => {
    const imagesArray = [...this.state.imagesArray];
    let j = 0;
    for (let i = 0; i < imagesArray.length - 1; i++) {
      imagesArray[i] = this.state.images[j];
      if (i % 2 === 1) {
        j++;
      }
    }
    imagesArray[imagesArray.length - 1] = pic5;
    const newImagesArray = shuffle(imagesArray);
    return newImagesArray;
  };
  refreshGame = () => {
    const squares = [...this.state.squares];
    for (let i = 0; i < squares.length; i++) {
      squares[i] = null;
    }
    if (this.state.isTicTac) {
      this.changeGame(true, true);
    } else {
      this.changeGame(false, true);
    }
  };
}
function shuffle(sourceArray) {
  for (var i = 0; i < sourceArray.length - 1; i++) {
    var j = i + Math.floor(Math.random() * (sourceArray.length - i));

    var temp = sourceArray[j];
    sourceArray[j] = sourceArray[i];
    sourceArray[i] = temp;
  }
  return sourceArray;
}

export default App;
