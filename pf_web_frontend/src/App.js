import React from "react";
import "./App.css";
import Blog from "./component/Blog";
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";
const App = () => {
  return (
    <div>
      <Router>
        <Route path="/">
          <Blog />
        </Route>
        <Route path="/registration">
          <Blog />
        </Route>
        <Route path="/login">
          <Blog />
        </Route>
      </Router>
    </div>
  );
};

export default App;
