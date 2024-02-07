<form
    <?php foreach ($config["config"]["attrs"] as $conf=>$configValue):?>
        <?= (!empty($conf))? $conf."='".$configValue."'":""?>
    <?php endforeach;?>
>
    <?php $containeRequired = false ?>
    <?php foreach ($config["inputs"] as $name=>$configInput):?>
        <?php
            $isRequired = (!empty($configInput["attrs"]["required"]) && $configInput["attrs"]["required"]);
            if($isRequired) $containeRequired = true;
        ?>
        <div class="form-group <?= (!empty($data[$name])) ? 'invalid' : (count($data) > 0 ? 'valid' : '') ?>">
            <?php if(!empty($configInput["label"])) : ?>
                <label for="<?= $config["config"]["attrs"]["id"]."_".$name ?>" class="form-label"><?= $configInput["label"] ?><?= $isRequired ? '<i class="form-required">*</i>' : "" ?></label>
            <?php endif ?>
            <div class="form-field-group">
                <<?= $configInput["balise"] ?> name="<?= $name ?>" id="<?= $config["config"]["attrs"]["id"]."_".$name ?>"
                    <?php foreach ($configInput["attrs"] as $attr=>$attrValue):?>
                        <?= (!empty($attr))? $attr."='".$attrValue."'":""?>
                    <?php endforeach;?>
                    <?= (isset($_POST[$name]) && $configInput["initOnError"]) ? "value='" . htmlspecialchars($_POST[$name], ENT_QUOTES, 'UTF-8') . "'" : ""; ?>
                >
                <?php if($configInput["balise"] === "select"): ?>
                    <?php foreach ($configInput["options"] as $optionName=>$option):?>
                        <option <?php foreach ($option["attrs"] as $optionAttr=>$optionAttrValue):?>
                                    <?= (!empty($optionAttr))? $optionAttr."='".$optionAttrValue."'":""?>
                                <?php endforeach;?>>
                            <?=$optionName?>
                        </option>
                    <?php endforeach;?>
                <?php endif;?>
                <?= ($configInput["balise"] !== "input") ? "</".$configInput["balise"].">" : "" ?>
                <?php if(!empty($data[$name])) :?>
                    <ul class="form-feedback">
                        <li><?= $data[$name][0] ?></li>
                    </ul>
                <?php endif;?>
                <?php if($configInput["attrs"]["type"] === "password") :?>
                    <div class="form-field-icon discret">
                        <i class="ri-eye-fill"></i>
                    </div>
                <?php endif;?>
            </div>
        </div>
    <?php endforeach;?>
    <div class="form-group">
        <label class="form-label"></label>
        <div class="form-field-group">
            <button type="submit" class="btn btn-primary"><?= $config["config"]["submit"]??"Envoyer" ?></button>
            <?= $containeRequired ? '<small style="margin-left: 20px">(<i class="form-required">*</i>) Champs obligatoires</small>' : '' ?>
        </div>
    </div>
</form>

