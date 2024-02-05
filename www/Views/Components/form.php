<form
    <?php foreach ($config["config"]["attrs"] as $conf=>$configValue):?>
        <?= (!empty($conf))? $conf."='".$configValue."'":""?>
    <?php endforeach;?>
>
    <!-- Affichage des inputs -->
    <?php foreach ($config["inputs"] as $name=>$configInput):?>
        <<?= $configInput["balise"] ?> name="<?= $name ?>"

            <?php foreach ($configInput["attrs"] as $attr=>$inputAttribut):?>
                <?= (!empty($attr))? $attr."='".$inputAttribut."'":""?>
            <?php endforeach;?>

            <?= (isset($_POST[$name]) && $configInput["initOnError"]) ? "value='" . htmlspecialchars($_POST[$name], ENT_QUOTES, 'UTF-8') . "'" : ""; ?>

        > <?= ($configInput["balise"] !== "input") ? "</".$configInput["balise"].">" : "" ?>

        <?php if(!empty($data[$name])) :?>
            <div style="color: red">
                <?= $data[$name][0] ?>
            </div>
        <?php endif;?>
        <br>
    <?php endforeach;?>

    <input type="submit" value="<?= $config["config"]["submit"]??"Envoyer" ?>">
</form>