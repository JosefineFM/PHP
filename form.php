<!doctype html>
<html>
<head>
<title> PHP </title>
</head>
<body>

<?php
$name = '';
$password = '';
$comments = '';
$gender = '';
$tc = '';
$color = '';
$languages = array();


if (isset($_POST['submit'])){
    $ok = true;
    if(!isset($_POST['name']) || $_POST['name'] === '') {
        $ok = false;
    } else {
        $name = $_POST['name'];
    }

    if(!isset($_POST['password']) || $_POST['password'] === '') {
        $ok = false;
    } else {
        $password = $_POST['password'];
    }

    if(!isset($_POST['comments']) || $_POST['comments'] === '') {
        $ok = false;
    } else {
        $comments = $_POST['comments'];
    }

    if(!isset($_POST['gender']) || $_POST['gender'] === '') {
        $ok = false;
    } else {
        $gender = $_POST['gender'];
    }

    if(!isset($_POST['tc']) || $_POST['tc'] === '') {
        $ok = false;
    }else {
        $tc = $_POST['tc'];
    }

    if(!isset($_POST['color']) || $_POST['color'] === '') {
        $ok = false;
    }else {
        $color = $_POST['color'];
    }

    if(!isset($_POST['languages']) || is_array($_POST['languages'])
        || count($_POST['languages']) === 0) {
        $ok = false;
    }else {
        $languages = $_POST['languages'];
    }

if ($ok) {
    printf('User name: %s 
    <br>Password: %s
    <br>Gender: %s
    <br>Color: %s
    <br>Language %s
    <br>Comments: %s
    <br>T&amp;C: %s',
        htmlspecialchars($name), 
        htmlspecialchars($password), 
        htmlspecialchars($gender), 
        htmlspecialchars($color), 
        htmlspecialchars(implode (' ', $languages)), 
        htmlspecialchars($comments), 
        htmlspecialchars($tc));
}
}
?>

<form method="post" actions="">
User Name: <input type="text" name="name" value="<?php
    echo htmlspecialchars ($name); 
    ?>"><br>

Password: <input type="password" name="password"value="<?php
    echo htmlspecialchars ($password); 
    ?>"> <br>

Gender:
    <input type="radio" name="gender" value="female" <?php
    if ($gender === 'female'){
        echo ' checked'; } ?> > female

    <input type="radio" name="gender" value="male" <?php
    if ($gender === 'male'){
        echo ' checked'; } ?>>male <br>

Favorite Color:
<select name="color">
    <option value="">Please Select</option>
    <option value="#f00" <?php
    if ($color === '#f00') {
        echo ' selected';
    } 
    ?> > red </option>

    <option value="#0f0"<?php
    if ($color === '#0f0') {
        echo ' selected';
    } 
    ?> > green </option>

    <option value="#00f" <?php
    if ($color === '#00f') {
        echo ' selected';
    } 
    ?> > blue </option>
</select> <br>

Languages spoken:
<select name="languages[]" multiple size="3">
    
    <option value="en"<?php
    if (in_array('en', $languages)) {
        echo ' selected';
        } 
        ?>> English </option>
    
    <option value="fr" <?php
    if (in_array('fr', $languages)) {
        echo ' selected';
    }
    ?>> Franch </option>

    <option value="it" <?php
    if (in_array('it', $languages)) {
        echo ' selected';
    }
    ?>> Italian </option>
</select>
<br>

Comments:<textarea name="comments"><?php echo htmlspecialchars ($comments);
    ?></textarea><br>

<input type="checkbox" name="tc" value="ok" <?php
if ($tc === 'ok') {
    echo ' Checked';
} ?>
> I accept! <br>

<input type="submit" name="submit" value="submit">
</form>
</body>
</html>