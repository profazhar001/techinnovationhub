
// Define global variables to store selected skills and classes
var selectedSkills = [];
var selectedSkillLevels = [];
var selectedClasses = [];

// Function to fetch and display skill suggestions
function fetchSkillSuggestions() {
    const skillInput = document.getElementById('skill');
    const skillSuggestionsDiv = document.getElementById('skillSuggestions');

    // Get the user's input from the input field
    const userInput = skillInput.value.trim();

    // Make an AJAX request to the PHP script to get skill suggestions
    // Replace 'suggestions.php' with the path to your PHP script handling skill suggestions
    fetch('suggestions.php?query=' + userInput)
        .then(response => response.json())
        .then(data => {
            // Clear previous suggestions
            skillSuggestionsDiv.innerHTML = '';

            // Display the suggestions as links
            data.forEach(skill => {
                const suggestionLink = document.createElement('a');
                suggestionLink.textContent = skill;
                suggestionLink.href = '#'; // You can set the link to trigger an action if clicked
                suggestionLink.onclick = function() {
                    skillInput.value = skill;
                    skillSuggestionsDiv.innerHTML = ''; // Clear suggestions after selecting one
                };
                skillSuggestionsDiv.appendChild(suggestionLink);
                skillSuggestionsDiv.appendChild(document.createElement('br'));
            });
        });
}

// Function to add selected skill to the list
function addSkillToList(skill) {
    var skillLevel = $("#skillLevel").val();

    if (skill !== '') {
        var listItem = '<li>' + skill + ' (' + skillLevel + ')' +
            '<input type="hidden" name="skills[]" value="' + skill + '">' +
            '<input type="hidden" name="skillLevels[]" value="' + skillLevel + '">' +
            '<button type="button" class="removeSkill" style="margin-left:5px; border-radius:15px; padding: 3px; background-color: #ff9a8c;" onclick="removeSkill(this)">Remove</button></li>';
        $("#selectedSkills").append(listItem);
        $("#skill").val('');
    }

    // Hide the skill suggestions list after adding the skill
    $("#skillSuggestions").hide();
}

// Function to fetch class suggestions
function getClassSuggestions(value) {
    // Implement similar logic as above to fetch class suggestions
}

// Function to fetch internship suggestions
function getInternshipSuggestions(value) {
    // Implement similar logic as above to fetch internship suggestions
}

// Function to add selected skill to the list of selected skills
function addSkillToSelected(skillValue, skillLevelValue) {
    // Implement logic to add selected skill and its level to the selectedSkills and selectedSkillLevels arrays
}

// Function to add selected class to the list of selected classes
function addClassToSelected(classValue) {
    // Implement logic to add selected class to the selectedClasses array
}

// Function to handle adding a skill to the selectedSkills list
function addSkill() {
    const skillInput = document.getElementById('skill');
    const skillName = skillInput.value.trim();

    if (skillName !== '') {
        // Create a new list item element
        const li = document.createElement('li');

        // Add skill name to the list item
        li.textContent = skillName;

        // Add a button to remove the skill from the list
        const removeButton = document.createElement('button');
        removeButton.textContent = 'Remove';
        removeButton.onclick = function() {
            li.remove();
        };

        // Add the remove button to the list item
        li.appendChild(removeButton);

        // Add the list item to the selectedSkills list
        document.getElementById('selectedSkills').appendChild(li);

        // Clear the input field after adding the skill
        skillInput.value = '';
    }
}

// Function to add selected class to the list
function addClass() {
    // Implement logic to add the selected class to the list
    // and call addClassToSelected function to update selectedClasses array
}

// Function to remove selected skill from the list
function removeSkill(button) {
    // Implement logic to remove the selected skill from the list
    // and update selectedSkills and selectedSkillLevels arrays
}

// Function to remove selected class from the list
function removeClass(button) {
    // Implement logic to remove the selected class from the list
    // and update selectedClasses array
}

// Function to handle form submission
function handleSubmit() {
    // Implement logic to handle form submission
    // You can use jQuery to add the selected skills, skill levels, and classes as hidden input fields to the form
    // Then submit the form to the server for further processing
}

