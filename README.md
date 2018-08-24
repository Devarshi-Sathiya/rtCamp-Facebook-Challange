# rtCamp-Facebook-Challange
### Facebook user albums download and backup in google drive system.
-----
### [Live Link](https://devarshi.xyz/home.php)
### Creted with :heart: by [Devarshi Sathiya](https://www.devarshi.xyz)
----
## [Challange Discription](https://careers.rtcamp.com/web-engineer/assignments/#facebook-challenge)
Create a small PHP-script to accomplish following parts:
### Part-1: Album Slideshow
  1. User visits your script page.
  2. User will be asked to connect using his FB account.
  3. Once authenticated, your script will pull his album list from FB.
  4. User will click on an album name/thumbnail.
  5. A pure CSS and Plain JS slideshow will start showing photos in that album (in full-screen mode).
### Part-2: Download Album
  1. Beside every album icon (step #4 in part-1), add a new icon/button saying “Download This Album”.
  2. When the user clicks on that button, your script will fetch all photos in that album behind the scene and zip them inside a folder on server.
  3. You may start a “progress bar” as soon as user-click download button as download process may take time.
  4. Once zip building on server completes, show user link to zip file.
  5. When user clicks zip-file link, it will download zip folder without opening any new page.
  6. Beside album names, add a checkbox. Then add a common “Download Selected Album” button. This button will download selected albums into a common zip that will contain one folder for each album. Folder-name will be album-name.
  7. Also, add a big “Download All” button. This button will download all albums in a zip, similar to above.
### Part-3: Backup albums to Google Drive
  1. Provide the user with an option to move albums to a Google Drive.
  2. The Google Drive will contain a master folder whose name will be of the format facebook_<username>_albums where username will be the Facebook username of the user.
  3. The user’s Facebook albums will be backed up in this master folder. Photos from each album will go inside their respective folders. Folder names will be the same as the Facebook album names.
  4. To improve the user experience, include the three following buttons:
     - “Move” button- This button will appear under each album on your website. When clicked, the corresponding album only will be moved to Google Drive.
     - “Move Selected”- This button will work along with a checkbox system. The user can select a few albums via checkboxes and click on this button. Only the selected albums will be moved to Google Drive.
     - “Move All”- This button will immediately move all user albums to Google Drive within their respective folders.
  5. Make sure that the user is asked to connect to their Google account only once, no matter how many times they choose to move data.
---  
  
## Technologies Used:
  
#### Languages:
  1. HTML
  2. CSS
  3. Sass
  4. JavaScript
  5. Jquery
  6. Ajax
  7. PHP
#### Plugins:
  1. Facebook-PHP-SDK
  2. Google-Client-SDK
  3. Php Zip
  4. Curl
#### Font Files:
  3. Font-Awesome
  4. Google Fonts
#### Super Cool Things:
  1. **Self written :pencil2:** Sass for the **grid system** and basic layout.
  2. **No Bootstrap** or other front-end framework used !
  3. Albums uploaded to drive **without** third party storage.
  4. All the code is **original and written from scratch**.
----  
## How to use the code ?
```
Use 'home.php' as index page.
Add your Client Secrets or validators at the right place in the code.
```
----
## Notes From the Developer:
```
It is possible that the images you see there can be in 130 * 130 in resolution(Thumbnails).
This has been done to make the website perform faster in the testing Environment.

Few of the things are modified and may differ from the challange discription but the functionalities are same.

Special thanks to Google, Stackoverflow and some other websites !
Also rtCamp for making this awesome challange.

Still Confused ? Feel free to contact me.(details are on my website).
Want to learn ? Sure, I'll arrange something for you to learn !
```
----

## Remaining things as of now:
  [x] Some bug fixes and feature implementation.
  
  [x] login page UI.
