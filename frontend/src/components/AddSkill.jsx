import React from 'react';
import axios from "axios";
import { useNavigate } from "react-router-dom";
import { useForm } from "react-hook-form";

import 'bootstrap/dist/css/bootstrap.min.css';
import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';
import Container from 'react-bootstrap/Container';

const AddSkill = () => {
    const {register, handleSubmit, formState: { errors } } = useForm();
    const navigate = useNavigate();

    const onSubmit = async (data) => {
        try {
            await axios.post("http://localhost:8080/skill", {
                skill_id: data.SkillId,
                skill_name: data.SkillName
            });
            navigate("/skill-list");
        } catch (error){
            console.log(error);
        }
    }
    return (
        <Container>
            <Form onSubmit={handleSubmit(onSubmit)}>
                <Form.Group className="mb-3" controlId="formBasicSkillId">
                    <Form.Label>Enter Skill ID</Form.Label>
                    <Form.Control type="number" placeholder="60000"
                    {...register("SkillId", {required:'This is required'})}/>
                    <p class = "fs-6 text-danger">{errors.SkillId?.message}</p>
                </Form.Group>

                <Form.Group className="mb-3" controlId="formBasicSkillName">
                    <Form.Label>Skill Name</Form.Label>
                    <Form.Control type="text" placeholder="Basic React"
                    {...register("SkillName", {required:'This is required', minLength: {value:4, message:'Min length is 4'}, maxLength: {value:20, message:'Max length is 20'}
                    , pattern: { value: /^[A-Za-z ]+$/, message: 'Alphabets only'}}) }/>
                    <p class = "fs-6 text-danger">{errors.SkillName?.message}</p>
                </Form.Group>
                <Button variant="primary" type="submit">
                    Submit
                </Button>
            </Form>
        </Container>
    )
}

export default AddSkill;