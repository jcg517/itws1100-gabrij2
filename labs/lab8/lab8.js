const projectsContainer = document.querySelector(".projects-container");

async function loadProjects() {
  const projectsArr = await (await fetch("./lab8.json")).json();

  for (let project of projectsArr) {
    projectsContainer.innerHTML += `
        <div class="project-card" title=${project.tooltip.replaceAll(
          " ",
          "\u00A0"
        )}>
          <p class="project-header">Lab ${project.labNumber}:</p>
          <a href=${project.link} target="_blank"
            ><img
              class="project-img"
              src=${project.img}
              alt=${project.name}
            />
            <p class="project-footer">${project.name}</p>
          </a>
        </div>
        `;
  }
}

loadProjects();
