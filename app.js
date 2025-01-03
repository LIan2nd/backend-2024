// import express and router
const express = require("express");
const router = require("./routes/api");
require("dotenv").config();

const { APP_PORT } = process.env;
// buat object express
const app = express();

// menggunakan middleware
app.use(express.json());

// menggunakan router
app.use(router);

// mendefinisikan port
app.listen(APP_PORT);