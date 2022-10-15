require('dotenv').config()
var mysql = require('mysql');

var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "ljps"
  });
  
  module.exports = con;