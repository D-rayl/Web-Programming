import React from "react";
import {
  Switch,
  Route,
  Link,
  useRouteMatch,
  useParams
} from "react-router-dom";

function About() {
  let match = useRouteMatch();
  return (
    <>
      <h1>About...</h1>
      <ul>
        <li>
          <Link to={`${match.url}/This`}>This</Link>
        </li>
        <li>
          <Link to={`${match.url}/That`}>That</Link>
        </li>
      </ul>
      <hr />
      <Switch>
        <Route path={`${match.path}/:topicId`}>
          <Topic />
        </Route>
        <Route path={match.path}>
          <h3>Select a topic</h3>
        </Route>
      </Switch>
    </>
  );
}
function Topic() {
  let { topicId } = useParams();
  return <h3>Requested ID: {topicId}</h3>;
}

export default About;
