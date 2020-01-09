import React, { Component } from "react";

export default class App extends Component {
  constructor(props) {
    super(props);
    this.state = {
      counter: 0,
      errorIsVisible:false
    };
  }
  render() {
    return (
      <div data-test="component-app">
        <h1 data-test="counter-display">
          The counter is currently {this.state.counter}
        </h1>
        <div hidden={this.state.errorIsVisible} data-test="error-message">
          <h1 style={{ color: "red" }}>Counter cannot go below zero</h1>{" "}
        </div>
        <button
          data-test="increment-button"
          onClick={() => {
            this.setState({ counter: this.state.counter + 1 });
          }}
        >
          Increment counter
        </button>
        <button
          data-test="decrement-button"
          onClick={() => {
            if (this.state.counter > 0)
              this.setState({ counter: this.state.counter - 1 });
              else this.setState({errorIsVisible:true})
          }}
        >
          Decrement counter
        </button>
      </div>
    );
  }
}
