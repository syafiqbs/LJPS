const express = require('express');
const connection = require('../LJPS/backend/database.js');
const cors = require('cors');

const app = express();
const router = express.Router();

app.use(express.json());
app.use("/", router);
app.use(cors());

connection.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
  });
  
router.get('/', (req, res) => {
    res.sendFile(__dirname + '/frontend/index.html');
});


app.listen(3000, function () {
    console.log('Node app is being served on port: 3000')
})

// CRUD skill
router.post('/skill', function (req, res){
    const skill_id = req.body.skill_id;
    const skill_name = req.body.skill_name;
    connection.query(`INSERT into skill VALUES ("${skill_id}", "${skill_name}")`, function (err, result) {
        if (err) {
            res.status(500).json({
                "message": "Server error",
                "error": err
            });
        } else {
            if (Number(result.affectedRows) == 1) {
                res.status(201).json({
                    "message": "Success, skill added",
                    "Skill": skill_name
                });  
            } else {
                res.status(422).json({
                    "message": "Failed, skill not added"
                });  
            }
        }
    })
});

router.get('/skill', function (req, res) {
    connection.query('SELECT * FROM skill', function (err, result) {
        if (err) {
            res.status(500).json({
                "message": "Server error",
                "error": err
            });
        } else {
            if (!Array.isArray(result) || !result.length) {
                res.status(404).json({
                    "message": "Failed, no skills in database"
                });
            } else {
                arr = []
                result.forEach(element => {
                    skill_obj = JSON.parse(JSON.stringify(element))
                    arr.push(skill_obj)
                });
                res.status(200).json({
                    "message": "Success, skills found",
                    "address": arr
                });   
            }
        }
    })
});

router.put('/skill', function (req,res){
    const skill_id = req.body.skill_id;
    const skill_name = req.body.skill_name;

    connection.query(`UPDATE skill SET skill_name='${skill_name}' WHERE skill_id='${skill_id}'`, function (err, result){
        if (err) {
            res.status(500).json({
                "message": "Server error",
                "error": err
            });
        } 
        else{
            if (Number(result.affectedRows) == 1) {
                res.status(200).json({
                    "message": "Success, skill updated",
                    "skill_name": skill_name
                });  
            } else {
                res.status(404).json({
                    "message": "Failed, skill not updated"
                });  
            }
        }
    });
});

router.delete('/skill', function (req, res) {
    const skill_id = req.body.skill_id;

    connection.query(`DELETE FROM skill where skill_id="${skill_id}"`, function (err, result) {
        if (err) {
            res.status(500).json({
                "message": "Server error",
                "error": err
            });
        } else {
            if (Number(result.affectedRows) == 1) {
                res.status(200).json({
                    "message": "Success, skill deleted",
                    "skill_id": skill_id
                });  
            } else {
                res.status(404).json({
                    "message": "Failed, skill not deleted"
                });  
            }
        }
    })
});

// CRUD roles

// CRUD skill to course

// CRUD skill to roles (job)

module.exports = app;