<htlm>
    <body>

        <form method = "POST">        
            <fieldset>
                <legend>
                    Inserimento dati nel DataBase [Persona]:
                </legend>
                <p>CF: <input type="text" name="cf"></p>
                <p>Nome: <input type="text" name="nome"></p>
                <p>Cognome: <input type="text" name="cognome"></p>
                <p>Eta: <input type="text" name="eta"></p>
                <input type="submit" value="Invio dati">
            </fieldset>
        </form>

</htlm>

<?php

    include "FunConnDB.php";
    
    include "conf.php";

    if(!empty($_POST)){

        $cf = $_POST['cf'];
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $eta = $_POST['eta'];

        $conn = connessioneDB($hostname, $user, $pw, $db);

        if ($conn -> connect_error) { 
            
            die('CONNESSIONE FALLITA: '  . $conn->connect_error); 

        }else{ 

            $sql = "INSERT INTO Persona (cf, nome, cognome, eta)
            VALUES ('$cf', '$nome', '$cognome', '$eta')";
            
            if ($conn -> query($sql) === TRUE) {

              echo "OPERAZIONE ESEGUITA CON SUCCESSO!";

            } else {

              echo "ERRORE: " . $sql . "<br>" . $conn->error;
            }
            
            $conn -> close();

        }
    }

?>