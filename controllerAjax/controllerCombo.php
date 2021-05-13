<?php

    include '../classes/componentes.php';
    $objComponentes = new Componentes();

    $objComponentes->setFiltro($_POST['filtro']);
    $objComponentes->setTabela($_POST['tabela']);
    $objComponentes->comboBox();
