// import express dan routing
const express = require("express");
const router = require("./routes/api.js");

// Membuat object express
const app = express();

// Menggunakan middleware
app.use(express.json());
app.use(express.urlencoded());

// Menggunakan routing (router)
app.use(router);
app.get('/hello', (req, res) => {
  res.send("Hello form app.js")
});

// Mendefinisikan port.
app.listen(3000);