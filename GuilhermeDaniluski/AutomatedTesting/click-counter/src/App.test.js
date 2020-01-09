import React from "react";
import Enzyme, { shallow } from "enzyme";
import EnzymeAdapter from "enzyme-adapter-react-16";

import App from "./App";

Enzyme.configure({ adapter: new EnzymeAdapter() });

/**
 * Factory function to create a ShallowWrapper for the App component
 * @function setup
 * @param {object} props - Component props specific to this setup.
 * @param {any} state - Initial state for setup.
 * @returns {ShallowWrapper}
 */
const setup = (props = {}, state = null) => {
  const wrapper = shallow(<App {...props} />);
  if (state) wrapper.setState(state);
  return wrapper;
};

/**
 * Return ShallowWrapper containing node(s) with the given data-test value.
 * @param {ShallowWrapper} wrapper - Enzymer shallow wrapper to search within.
 * @param {string} val - Value of data-test attribute for search
 * @returns {ShallowWrapper}
 */
const findByTestAttr = (wrapper, val) => {
  return wrapper.find(`[data-test="${val}"]`);
};

test("renders without error", () => {
  const wrapper = setup();
  const appComponent = findByTestAttr(wrapper, "component-app");
  expect(appComponent.length).toBe(1);
});

test("renders display counter", () => {
  const wrapper = setup();
  const display = findByTestAttr(wrapper, "counter-display");
  expect(display.length).toBe(1);
});

test("counter start at zero", () => {
  const wrapper = setup();
  const initialCounterState = wrapper.state("counter");
  expect(initialCounterState).toBe(0);
});

describe("Increment", () => {
  test("renders increment button", () => {
    const wrapper = setup();
    const buttonIncrement = findByTestAttr(wrapper, "increment-button");
    expect(buttonIncrement.length).toBe(1);
  });

  test("clicking buttonIncrement increments counter display", () => {
    const counter = 7;
    const wrapper = setup(null, { counter });

    // find button and click
    const buttonIncrement = findByTestAttr(wrapper, "increment-button");
    buttonIncrement.simulate("click");

    // find display and test
    const display = findByTestAttr(wrapper, "counter-display");
    expect(display.text()).toContain(counter + 1);
  });
});

describe("Decrement", () => {
  test("renders decrement button", () => {
    const wrapper = setup();
    const buttonDecrement = findByTestAttr(wrapper, "decrement-button");
    expect(buttonDecrement.length).toBe(1);
  });

  test("clicking buttonDecrement decrement counter display", () => {
    const counter = 7;
    const wrapper = setup(null, { counter });

    // find button and click
    const buttonDecrement = findByTestAttr(wrapper, "decrement-button");
    buttonDecrement.simulate("click");

    // find display and test
    const display = findByTestAttr(wrapper, "counter-display");
    expect(display.text()).toContain(counter - 1);
  });

  test("render error message", () => {
    const wrapper = setup();
    const errorMessage = findByTestAttr(wrapper, "error-message");
    expect(errorMessage.length).toBe(1);
  });

  test("error does not shown if not needed", () => {
    const wrapper = setup();

    const errorMessage = findByTestAttr(wrapper, "error-message");
    const errorHasHiddenClass = errorMessage.props().hidden;
    expect(errorHasHiddenClass).toBe(false);
  });

  describe("counter is 0 and decrement is clicked", () => {
    // using a describe here so I can use a "beforeEach" for shared setup

    // scoping wrapper to the describe, so it can be used in beforeEach and the tests
    let wrapper;

    beforeEach(() => {
      // no need to set counter value here; default value of 0 is good
      wrapper = setup();

      // find button and click
      const button = findByTestAttr(wrapper, "decrement-button");
      button.simulate("click");
    });
    test("error shows", () => {
      const wrapper = setup();

      const errorMessage = findByTestAttr(wrapper, "error-message");
      const errorHasHiddenClass = errorMessage.props().hidden;
      expect(errorHasHiddenClass).toBe(false);
    });
    test("counter still displays 0", () => {
      const display = findByTestAttr(wrapper, "counter-display");
      expect(display.text()).toContain(0);
    });
    test("clicking increment clears the error", () => {
      // find and click the increment button
      const buttonIncrement = findByTestAttr(wrapper, "increment-button");
      buttonIncrement.simulate("click");

      // check the class of the error message
      const errorMessage = findByTestAttr(wrapper, "error-message");
      const errorHasHiddenClass = errorMessage.props().hidden;
      expect(errorHasHiddenClass).toBe(true);
    });
  });
});
