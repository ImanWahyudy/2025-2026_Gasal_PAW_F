<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <label for="surname">Surname:</label><br>
    <input type="text" name="surname" id="surname"
           value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>"><br><br>

    <label for="age">Umur:</label><br>
    <input type="number" name="age" id="age"
           value="<?php echo isset($_POST['age']) ? htmlspecialchars($_POST['age']) : ''; ?>"><br><br>

    <label for="email">Email:</label><br>
    <input type="text" name="email" id="email"
           value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"><br><br>

    <label for="website">Website:</label><br>
    <input type="text" name="website" id="website"
           value="<?php echo isset($_POST['website']) ? htmlspecialchars($_POST['website']) : ''; ?>"><br><br>

    <label for="nilai">Nilai:</label><br>
    <input type="text" name="nilai" id="nilai"
           value="<?php echo isset($_POST['nilai']) ? htmlspecialchars($_POST['nilai']) : ''; ?>"><br><br>

    <label for="ip">Alamat IP:</label><br>
    <input type="text" name="ip" id="ip"
           value="<?php echo isset($_POST['ip']) ? htmlspecialchars($_POST['ip']) : ''; ?>"><br><br>

    <label for="tanggal">Tanggal Lahir:</label><br>
    <input type="date" name="tanggal" id="tanggal"
           value="<?php echo isset($_POST['tanggal']) ? htmlspecialchars($_POST['tanggal']) : ''; ?>"><br><br>

    <input type="submit" name="submit" value="Submit">  
</form>
