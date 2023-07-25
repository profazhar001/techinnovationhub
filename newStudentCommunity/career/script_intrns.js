
    var hideTimeouts = {};

    // Function to fetch job title suggestions
    function getJobTitleSuggestions(value) {
        if (value.length > 0) {
            $.ajax({
                type: "POST",
                url: "getJobTitleSuggestions.php",
                data: { query: value },
                success: function (response) {
                    $("#jobSuggestions").html(response);
                    $("#jobSuggestions").show(); // Show the suggestions
                }
            });
        } else {
            hideSuggestions('jobSuggestions');
        }
    }

    // Function to fetch class suggestions
function getClassSuggestions(value) {
    if (value.length > 0) {
        $.ajax({
            type: "POST",
            url: "getClassSuggestions.php",
            data: { query: value },
            success: function (response) {
                $("#classSuggestions").html(response);
                $("#classSuggestions").show(); // Show the suggestions

                // Add event listener to the checkboxes
                $(".suggestion-checkbox").on("change", function() {
                    const classValue = $(this).val();
                    if ($(this).is(":checked")) {
                        addClassToSelected(classValue);
                    } else {
                        removeClassFromSelected(classValue);
                    }
                });
            }
        });
    } else {
        hideSuggestions('classSuggestions');
    }
}

    // Function to fetch skill suggestions
    function getSkillSuggestions(value) {
        if (value.length > 0) {
            $.ajax({
                type: "POST",
                url: "getSkillSuggestions.php",
                data: { query: value },
                success: function (response) {
                    $("#skillSuggestions").html(response);
                    $("#skillSuggestions").show(); // Show the suggestions
                }
            });
        } else {
            hideSuggestions('skillSuggestions');
        }
    }

    // Function to fetch internship suggestions
    function getInternshipSuggestions(value) {
        if (value.length > 0) {
            $.ajax({
                type: "POST",
                url: "getInternshipSuggestions.php",
                data: { query: value },
                success: function (response) {
                    $("#internshipSuggestions").html(response);
                    $("#internshipSuggestions").show(); // Show the suggestions
                }
            });
        } else {
            hideSuggestions('internshipSuggestions');
        }
    }

    // Function to schedule hiding suggestions after a delay
    function scheduleHideSuggestions(suggestionId) {
        clearTimeout(hideTimeouts[suggestionId]);
        hideTimeouts[suggestionId] = setTimeout(function() {
            hideSuggestions(suggestionId);
        }, 150); // Hide after 0.1 seconds
    }

    // Function to hide suggestions
    function hideSuggestions(suggestionId) {
        $("#" + suggestionId).empty();
        $("#" + suggestionId).hide(); // Hide the suggestions
    }

    // Function to add selected skill to the list
    function addSkill() {
        var skill = $("#skill").val();
        var level = $("#skillLevel").val();

        if (skill !== '') {
            var listItem = '<li>' + skill + ' (' + level + ')' +
                '<input type="hidden" name="skills[]" value="' + skill + '">' +
                '<input type="hidden" name="skillLevels[]" value="' + level + '">' +
                '<button type="button" class="removeSkill" style="margin-left:5px; border-radius:15px; padding: 3px; background-color: #ff9a8c;" onclick="removeSkill(this)">Remove</button></li>';
            $("#selectedSkills").append(skill);
            $("#skill").val('');
        }
    }

    // Function to remove selected skill from the list
    function removeSkill(button) {
        $(button).closest('li').remove();
    }

    var selectedClassSuggestions = [];

    // Function to add selected class suggestion to the list
    function addClassSuggestion(checkbox) {
        var classVal = checkbox.value;

        if (checkbox.checked && !selectedClassSuggestions.includes(classVal)) {
            selectedClassSuggestions.push(classVal);
            var listItem = '<li>' + classVal +
                '<input type="hidden" name="classes[]" value="' + classVal + '">' +
                '<button type="button" class="removeClass" style="margin-left:5px; border-radius:15px; padding: 3px; background-color: #ff9a8c;" onclick="removeClass(this)">Remove</button></li>';
            $("#selectedClasses").append(listItem);
        } else if (!checkbox.checked && selectedClassSuggestions.includes(classVal)) {
            selectedClassSuggestions = selectedClassSuggestions.filter(function (value) {
                return value !== classVal;
            });
            $("#selectedClasses li:contains('" + classVal + "')").remove();
        }
    }

    // Updated function to add selected class to the list
    function addClass() {
        var classVal = $("#class").val();

        if (classVal !== '') {
            var listItem = '<li>' + classVal +
                '<input type="hidden" name="classes[]" value="' + classVal + '">' +
                '<button type="button" class="removeClass" style="margin-left:5px; border-radius:15px; padding: 3px; background-color: #ff9a8c;" onclick="removeClass(this)">Remove</button></li>';
            $("#selectedClasses").append(listItem);
            $("#class").val('');
        }
    }

    // Function to remove selected class from the list
    function removeClass(button) {
        $(button).closest('li').remove();
    }

    // Function to clear the selected skills and classes lists
    function clearLists() {
        $("#selectedSkills").empty();
        $("#selectedClasses").empty();
    }
    
