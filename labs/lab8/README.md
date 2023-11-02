REPO: https://github.com/RPI-ITWS/itws1100-gabrij2
LAB8 PAGE: http://gabrij2rpi.eastus.cloudapp.azure.com/iit/labs/lab8/lab8.html

lab8.js Explaination:

- First the "projects-container" element is found and assigned it to the variable "projectsContainer".
- Next an asynchronous function named "loadProjects" is defined. This function uses "fetch" to retrieve the content of the "lab8.json" file. The fetched data is then converted to a JavaScript object using the "json()" method.
- Next a loop iterates through each project in the array obtained from the JSON file. For each project, it appends HTML code to the "projectsContainer". The code creates a card for the project with an image, lab number, project name, and a link to the project. The "replaceAll" method is used to replace spaces in the "tooltip" property with non-breaking spaces.

The tooptip uses Jquery UI to make add description to each project card on hover.
