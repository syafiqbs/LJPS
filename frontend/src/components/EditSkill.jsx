import React, { useState, useEffect} from 'react';
import axios from "axios";
import { useNavigate, useParams } from "react-router-dom";
import { useForm } from "react-hook-form";

import 'bootstrap/dist/css/bootstrap.min.css';
import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';
import Container from 'react-bootstrap/Container';

const EditSkill = () => {
    const {register, handleSubmit, formState: { errors } } = useForm();
    const navigate = useNavigate();
    const {id} = useParams();

    useEffect(()=>{
        getSkillById();
    }, []);

    const onSubmit = async (data) => {
        try {
            await axios.put("http://localhost:8080/skill", {
                skill_id: {id}.id,
                skill_name: data.SkillName
            });
            navigate("/skill-list");
        } catch (error){
            console.log(error);
        }
    }
    const getSkillById = async (data) => {
        const response = await axios.get(`http://localhost:8080/skill/${id}`);
    }
    return (
        <Container>
            <Form onSubmit={handleSubmit(onSubmit)}>
                <Form.Group className="mb-3" controlId="formBasicSkillId">
                    <Form.Label>The Skill ID</Form.Label>
                    <Form.Control type="number" placeholder={id}
                    {...register("SkillId", {required:'This is required', disabled: true})}/>
                    <p class = "fs-6 text-danger">{errors.SkillId?.message}</p>
                </Form.Group>

                <Form.Group className="mb-3" controlId="formBasicSkillName">
                    <Form.Label>New Skill Name</Form.Label>
                    <Form.Control type="text" placeholder="Basic Vue"
                    {...register("SkillName", {required:'This is required', minLength: {value:4, message:'Min length is 4'}, maxLength: {value:20, message:'Max length is 20'}
                    , pattern: { value: /^[A-Za-z ]+$/, message: 'Alphabets only'}}) }/>
                    <p class = "fs-6 text-danger">{errors.SkillName?.message}</p>
                </Form.Group>
                <Button variant="primary" type="submit">
                    Update
                </Button>
            </Form>
        </Container>
    )
}

export default EditSkill;