Lackbackers PHP Website
This project is created with the aim of delivering and providing freelancers in the world projects that they can take on. Project owners who wants to look for freelancers to take on their projects can also do this with use with usage of the website.

General Overview
The website uses technologies like PHP, AJAX, XML and more. Additionally, some of the general features available on the website includes but is not limited to:

1. User Accounts
- Registration of User accounts (Freelancer/Project Owners)
- Login

2. Projects Management
- Creation of new Projects (Project Owners Only)
- Viewing all Projects available on the Website
- Viewing Individual Projects (Freelancers viewing projects they are associated to, Project Owners viewing projects that belong to them)

3. Additional
- Sending of emails for queries
- Web scrapping of modules suggested for users to learn, improving their skills as a freelancers
- PDF file generation of projects for users
- SQL injection mitigation is done my using mysqli prepared statements

4. There are also other features available on the website, do browse through it for a better and more personal understanding.

To Run Codes
1. You will need either an actual/virtual server that supports PHP codes.
2. PHPmyadmin.
3. Import the '.sql' file in '.zip' file into PHPmyadmin.
4. Amend the 'database/credentials.php' file according to the comments found within the file.
5. Insert your own Google API key according to the comments in the file, 'information/aboutus.php' in order for the google map to work.
6. Change folder permission of your image upload directory to '777' in order for image upload of the 'createproject.php' to work.
