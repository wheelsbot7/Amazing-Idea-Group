## Related Requirements:
Automatic sql add
## Initiating Actor:
Parker Engle
## Actor's Goal:
Automatically send email 
## Participating Actors:
Parker Engle, Dean Atwood
## Preconditions:
The database has space / fields for incoming project information
## Postconditions:
Emails are recieved and able to be reviewed, then the information is moved to sql table.
## Flow of Events for Main Success Scenario:

1. Student submits project idea
2. Email is automatically sent out to selected email (Dean Atwood)
3. Information is added to temp table in sql
4. Project is reviewed and is either accepted or rejected
5. If accepted, information of the project goes into sql table, and is now viewable on the website. 
