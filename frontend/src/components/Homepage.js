import React from 'react';
import { Link } from "react-router-dom";
import Button from "react-bootstrap/Button";


const Homepage = () => {
  return (
    <div>
        
        <Button variant="light">User / Trainer</Button>
        <Button variant="light">Manager</Button>
        <Link to={'/skill-list'}><Button variant="light">HR</Button></Link>
    </div>
  )
}

export default Homepage