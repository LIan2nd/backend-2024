// TODO 3: Import data students dari folder data/students.js
// code here
const students = require('../data/students.js')

// Membuat Class StudentController
class StudentController {
  index(req, res) {
    // TODO 4: Tampilkan data students
    const data = {
      "message": "Menampilkan semua data students",
      "data": students
    }

    res.status(200).json(data);
  }

  store(req, res) {
    // TODO 5: Tambahkan data students
    const { name } = req.body;
    students.push(name)

    const data = {
      "message": `Menambah data student : ${name}`,
      "data": students
    }

    res.status(201).json(data);
  }

  update(req, res) {
    // TODO 6: Update data students
    const { id } = req.params;
    const { name } = req.body;

    students[id] = name;

    const data = {
      "message": `Mengedit student dengan id ${id}, nama : ${name}`,
      "data": students
    }

    res.status(200).json(data);
  }

  destroy(req, res) {
    const { id } = req.params;
    students.splice(id, 1);

    const data = {
      "message": `Menghapus student id ${id}`,
      "data": students,
    }

    res.status(200).json(data);
  }
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;