<?php
require 'config.php';

$info = [];
$id = filter_input(INPUT_GET, 'id');
if($id) {

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0) {

        $info = $sql->fetch( PDO::FETCH_ASSOC);

    } else {
         header("Location: index.php");
    }

}else{
    header("Location: index.php");
}
?>

<h1>Editar Usuário</h1>

<form action="editar_action.php" method="post">
    <input type="hidden" name="id" value="<?=$info['id'];?>">
    
    <label for="">
        Nome:<br/>
        <input type="text" name="name" value="<?=$info['nome'];?>" id="">
    </label><br/><br/>

    <label for="">
        E-mail:<br/>
        <input type="email" name="email" value="<?=$info['email'];?>" id="">
    </label><br/><br/>

    <input type="submit" value="Salvar">

</form>