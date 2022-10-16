import React, { useState, useEffect } from 'react';
import axios from "axios";
import { Link } from "react-router-dom";

import Table from 'react-bootstrap/Table';
import Container from 'react-bootstrap/Container';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Button from 'react-bootstrap/Button';


const SkillList = () => {
  const [skills, setSkill] = useState([]);

  useEffect(()=>{
    getSkill();
  },[])

  const getSkill = async () =>{
    const response = await axios.get('http://localhost:8080/skill');
    setSkill(response.data);
  }

  const deleteUser = async (id) => {
    try {
      await axios.delete(`http://localhost:8080/skill/${id}`);
      getSkill();
    } catch (error) {
      console.log(error);
    }
  };

  return (
    <Container>
      <Row>
        <Col></Col>
        <Col xs={6}>
          <Link to={'/skill/add'}>
            <Button variant="outline-primary">Add New</Button>
          </Link>
          <p>Skill List</p>
          <Table responsive striped bordered hover size="sm">
            <thead>
              <tr>
                <th>Skill ID</th>
                <th>Skill Name</th>
              </tr>
            </thead>
            <tbody>
              {skills.map(skill => (
                <tr key={skill.skill_id}>
                  <td>{skill.skill_id}</td>
                  <td>{skill.skill_name}</td>
                  <td>
                    <Link to={`/skill/edit/${skill.skill_id}`} ><Button variant="secondary">Edit</Button></Link>
                    <Link onClick={() => deleteUser(skill.skill_id)}><Button variant="danger">Delete</Button></Link>
                  </td>
                </tr>
              ))}
            </tbody>
          </Table>
        </Col>
        <Col></Col>
      </Row>
      
    </Container>
    
  )
}

export default SkillList
