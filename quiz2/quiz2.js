async function question1() {
  const header = document.querySelector("h1");
  let data = await fetch("./quiz2.json");
  let musicList = await data.json();
  header.textContent = musicList[Math.floor(Math.random() * 3)].title;
}

question1();
