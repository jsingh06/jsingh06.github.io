// script.js
document.addEventListener("DOMContentLoaded", () => {
    const jobPostingsSection = document.getElementById("job-postings");
    const applicationForm = document.getElementById("application-form");

    // Function to fetch job postings from the server
    function fetchJobPostings() {
        fetch("/api/job-postings") // Replace with your API endpoint to fetch job postings
            .then(response => response.json())
            .then(data => {
                // Dynamically generate job postings on the page
                jobPostingsSection.innerHTML = "";
                data.forEach(job => {
                    const jobElement = document.createElement("div");
                    jobElement.innerHTML = `
                        <h3>${job.company_name}</h3>
                        <p><strong>Position:</strong> ${job.position}</p>
                        <p>${job.description}</p>
                    `;
                    jobPostingsSection.appendChild(jobElement);
                });
            })
            .catch(error => console.error("Error fetching job postings:", error));
    }

    // Function to handle form submission
    applicationForm.addEventListener("submit", (event) => {
        event.preventDefault();
        const formData = new FormData(applicationForm);

        fetch("/api/apply", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            alert("Application submitted successfully!");
            applicationForm.reset();
        })
        .catch(error => console.error("Error submitting application:", error));
    });

    // Fetch job postings when the page loads
    fetchJobPostings();
});
