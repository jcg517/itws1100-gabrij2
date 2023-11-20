async function displayFeed(url, type) {
  let feedContainer = `<div class="feed-container"> <h2>${url} Feed:</h2>`;

  const feedEntrys = fetch(url)
    .then((res) => res.text())
    .then((str) => new window.DOMParser().parseFromString(str, "text/xml"))
    .then((data) => data.querySelectorAll(type == "rss" ? "item" : "entry"));

  for (let entry of await feedEntrys) {
    const entryTitle = entry.querySelector("title").innerHTML;
    const entryLink =
      entry.querySelector("link").getAttribute("href") ??
      entry.querySelector("link").innerHTML;
    const entryAuthor = "" ?? entry.querySelector("name").innerHTML;
    const entryDescription = entry.querySelector(
      type == "rss" ? "description" : "summary"
    ).innerHTML;
    const entryDate = entry.querySelector(
      type == "rss" ? "pubDate" : "published"
    ).innerHTML;

    feedEntry = `     
      <div class="feed-entry">
        <a class="entry-link" href="${entryLink}">
          <h3>${entryTitle}</h3>
        </a>
        <p>${entryDate}, ${entryAuthor}</p>
        <br/>
        <p>${entryDescription}</p>
      </div>`;

    feedContainer += feedEntry;
    console.log(entry);
  }

  feedContainer += "</div>";
  document.getElementById("body-block").innerHTML += feedContainer;
}

displayFeed("../lab4/gabrij2-ITWS1100-Lab4-ATOM.xml", "atom");
displayFeed("../lab4/gabrij2-ITWS1100-Lab4-RSS.xml", "rss");
