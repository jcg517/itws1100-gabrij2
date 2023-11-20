LAB PAGE: https://gabrij2rpi.eastus.cloudapp.azure.com/iit/labs/lab10/lab10.html

To me this lab was very similar to lab8, but instead of parsing json we are parsing the xml files we made.

The JS code I wrote defines an asynchronous function named displayFeed that takes a URL and a type parameter. It fetches XML data from the lab 4 files, parses it using the DOMParser, and selects entries based on the specified type ("rss" or "atom"). It then iterates over the entries, extracts relevant information (such as title, link, author, description, and date), and constructs HTML elements for each entry. Finally, it appends the generated feed content to the "body-block".

Material used as reference:
https://css-tricks.com/how-to-fetch-and-parse-rss-feeds-in-javascript/
