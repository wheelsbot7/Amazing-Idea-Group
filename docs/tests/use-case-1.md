## Related Requirements:
REQ 1,2,3
## Initiating Actor:
Student
## Actor's Goal:
Submit project idea to database
## Participating Actors:
Student, Reviewer
## Preconditions:
The database has fields for every input in the submit form.
The reviewer is avaliable and actively reading emails.
## Postconditions:
The database is connected to the frontend and displaying the new project idea.
## Flow of Events for Main Success Scenario:

1. Student visits the site and clicks "Submit a Project Idea"
2. Student fills out a form and clicks "Submit"
3. The contents of the form are formatted into an email, which is sent to a reviewer (student input ends here, everything after will be handled by admin)
4. The reviewer signals approval
5. The contents of the form are added to the project database
6. The project idea appears in the web frontend