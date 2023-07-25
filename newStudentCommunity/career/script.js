document.addEventListener("DOMContentLoaded", function() {
    const majorSelect = document.getElementById("major");
    const jobSelect = document.getElementById("job");
    const difficultyParagraph = document.getElementById("difficulty");

    // Add change event listeners to select elements
    majorSelect.addEventListener("change", handleSelectionChange);
    jobSelect.addEventListener("change", handleSelectionChange);

    function handleSelectionChange() {
        const major = majorSelect.value;
        const job = jobSelect.value;

        // Send an AJAX request to the PHP file
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "compare_skills.php?major=" + encodeURIComponent(major) + "&job=" + encodeURIComponent(job), true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Update the difficulty paragraph with the response from PHP
                difficultyParagraph.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }
});