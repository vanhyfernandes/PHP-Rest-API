<html>

    <head>

    </head>
    <body>
    <h2>Consuming the API using curl</h2>
        <a href="read_api.php">Read API</a><br/><br/>
        <a href="create_api.php">Create API</a><br/><br/>
        <a href="update_api.php">Update API</a><br/><br/>
        <a href="delete_api.php">Delete API</a><br/><br/>
    
    <h2>Exemplo of reading operation</h2>
    <h3>Reading all students</h3>
    <p>url: https://personal-sites.deakin.edu.au/~vcarvalho/ass1/read.php</p>
    <p>[{"sid":"3","fname":"Joao","sname":"mauricio","email":"joe.griffith@gmail.com"},{"sid":"4","fname":"Monica","sname":"fernands","email":"monica@deakin.edu.au"},{"sid":"5","fname":"vanessa","sname":"fernandes","email":"teste"},{"sid":"7","fname":"marcia","sname":"suxa;la","email":"fff"},{"sid":"100","fname":"Rita","sname":"Fernandes","email":"rita@hotmail.com"}]</p>

    <h3>Reading student by sid</h3>
    <p>url: https://personal-sites.deakin.edu.au/~vcarvalho/ass1/read.php?sid=3</p>
    <p>[{"sid":"3","fname":"Joao","sname":"mauricio","email":"joe.griffith@gmail.com"}]</p>
    </body>

</html>