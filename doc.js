// Menambahkan data ke collections;
db.product.insertOne({
  "name": "Laptop",
  "price": new NumberLong("59000000")
});

// Mencari data di collection
db.product.find({});

db.product.find({
  "name": "Laptop"
});

// Update data di collection
db.product.updateOne(
  {
    "name": "Laptop"
  },
  {
    $set: {
      "price": new NumberLong("1000000")
    }
  });

// Menghapus data di collection
db.product.deleteOne({ "name": "Laptop" });