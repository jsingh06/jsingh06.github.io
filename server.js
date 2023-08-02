const express = require("express");
const bodyParser = require("body-parser");
const sql = require("mssql");

const app = express();
const port = 3000;

app.use(bodyParser.urlencoded({ extended: true }));

// Replace with your MSSQL database connection settings
const config = {
  user: "sa",
  password: "root",
  server: "JYOT-PC\SQLEXPRESS01",
  database: "Job_Finder",
  options: {
    encrypt: true, // Set to true if using Azure
    trustServerCertificate: true // Set to true if using Azure
  }
};

// Endpoint to fetch job postings
app.get("/api/job-postings", async (req, res) => {
  try {
    const pool = await sql.connect(config);
    const result = await pool.request().query("SELECT * FROM jobs");
    res.json(result.recordset);
  } catch (error) {
    console.error("Error fetching job postings:", error);
    res.status(500).json({ error: "Failed to fetch job postings" });
  }
});

// Endpoint to handle application submissions
app.post("/api/apply", async (req, res) => {
  const { name, email } = req.body;
  const job_id = 1; // Set the job_id appropriately based on the selected job

  try {
    const pool = await sql.connect(config);
    const result = await pool
      .request()
      .input("job_id", sql.Int, job_id)
      .input("name", sql.VarChar, name)
      .input("email", sql.VarChar, email)
      .query("INSERT INTO applications (job_id, name, email ) VALUES (@job_id, @name, @email )");

    res.json({ message: "Application submitted successfully" });
  } catch (error) {
    console.error("Error submitting application:", error);
    res.status(500).json({ error: "Failed to submit application" });
  }
});

// Start the server
app.listen(port, () => {
  console.log(`Server running on port ${port}`);
});
