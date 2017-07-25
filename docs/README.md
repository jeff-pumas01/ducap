# DuPage Area Project

## Contact
Robert Dzurko<br/>
Area Project Administrator<br/>
DuCAP Main Office<br/>
Email: bob@ducap.org<br/>
Fax: (630) 671-0180<br/>
Phone: (630) 671-8000<br/>
Mobile: (815) 922-8684<br/>
address: 104 S. Bloomingdale Rd Bloomingdale, IL 60108-1218

## Background
DuCap promotes a healthy environment in which children can live and grow successfully.  They offers the following services:
* Community Organizers (Neighborhood Action Club)
* Community Resource Experts
* Advocates for Area Youth and Families
* After-School Programs  

See their [website](http://ducap.org) for more details.

## Project Overview
DuCap in need of a database and reporting system for tracking participants, events, attendance and volunteers.  They require a robust reporting system to provide reports for the state of Illinois.

## Current Status
The project has been implemented with a MySQL database and PHP.  The [current version](https://www.cs.lewisu.edu/~howardcy/ducap/) is running on the Lewis Front server (ask me for credentials).  It has well designed database which likely won't require any modification.  This [video](https://www.dropbox.com/s/o1tufgl5sq7h1b8/DuCAP.mov?dl=0) demonstrates the portion of the project completed last semester.  We've worked on this project since Spring 2016 and it should be completed this semester.  

###  Things to do
1.  Update the manage volunteers page so that it matches the pages for managing events and participants.
1. Create a verifyVolunteerData function in the DB class (DB.class.php) that will receive the input from the form. It should sanitize the data, verify it, and either insert it into a new Volunteer row or find and update an existing one. Use the verifyParticipantData function as a template, unless you think of a better way to implement this.
1. Provide functionality for volunteers to login. Logged-in volunteers should be able to take attendance for events, but only for the sites they are registered for. Create a Volunteer Control Panel page that will link to the second Attendance page (attendance2.php) and pass it the volunteer's site_id value.
1. Provide robust reporting functionality.
1. Deploy the application using the client's current host.
