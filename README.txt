there are 3 access point -
admin -view/edit parking spots, users, attendant(gaurd). view current & previous transactions.
attendent - view who booked perticular spot.
users - book parking spots.

mysql - stores all the data, for first time opening - username - root, pass - NULL

how to set up -
put code in xampp/htdocs
start apache and mysql in xampp server
go to myphpadmin, import smart_users.sql

how to use -
user- http://localhost/Smart-parking/ *** username - s10@gmail.com, pass - pass
admin - http://localhost/Smart-parking/admin_login.php  *** username - admin@gmail.com, pass - admin@123
attendant - http://localhost/Smart-parking/attendant_login.php  *** username - attend, pass - attend

note - new users can be added in admin page, attendant can only view booking history, spot can only be booked by 1 user at a time.
