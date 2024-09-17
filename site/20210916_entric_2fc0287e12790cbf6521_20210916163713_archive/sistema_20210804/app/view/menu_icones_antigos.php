<?php
// https://pictogrammers.github.io/@mdi/font/5.4.55/

if ($bruker->type == "administrador"){
    ?>
    <ul class="metismenu" id="menu">
        <li class="nav-label"></li>
        <li class="mega-menu mega-menu-lg">
            <a href=""><i class="mdi mdi-home-outline"></i><span class="nav-text">Início</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href=""><i class="mdi mdi-message-draw"></i><span class="nav-text">Dashboard</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href=""><i class="mdi mdi-message-draw"></i><span class="nav-text">Financeiro</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="prescritor_relatorioalta"><i class="mdi mdi-message-draw"></i><span class="nav-text">Relatório de Alta</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="prescritor_ferramentas"><i class="mdi mdi-cogs"></i><span class="nav-text">Ferramentas</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href=""><i class="mdi mdi-message-draw"></i><span class="nav-text">Cadastros</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="prescritor_consultarproduto"><i class="mdi mdi-pill"></i><span class="nav-text">Consultar Produto</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="prescritor_fornecedores"><i class="mdi mdi-wallet-membership"></i><span class="nav-text">Fornecedores</span></a>
        </li>        
        <li class="mega-menu mega-menu-lg">
            <a href="prescritor_videosalta"><i class="mdi mdi-video"></i><span class="nav-text">Vídeos</span></a>
        </li>
    </ul>
    <?php
}
else if ($bruker->type == "paciente"){
	?>
    <ul class="metismenu" id="menu">
        <li class="nav-label"></li>
        <li class="mega-menu mega-menu-lg">
            <a href=""><i class="mdi mdi-home-outline"></i><span class="nav-text">Início</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="paciente_relatorioalta"><i class="mdi mdi-message-draw"></i><span class="nav-text">Relatório de Alta</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="paciente_videosalta"><i class="mdi mdi-video"></i><span class="nav-text">Vídeos de Alta</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="paciente_contato"><i class="mdi mdi-email-outline"></i><span class="nav-text">Contato</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="paciente_fornecedores"><i class="mdi mdi-wallet-membership"></i><span class="nav-text">Fornecedores</span></a>
        </li>
    </ul>
	<?php
}
else if ($bruker->type == "prescritor"){
    ?>
    <ul class="metismenu" id="menu">
        <li class="nav-label"></li>
        <li class="mega-menu mega-menu-lg">
            <a href=""><i class="mdi mdi-home-outline"></i><span class="nav-text">Início</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="prescritor_relatorioalta"><i class="mdi mdi-message-draw"></i><span class="nav-text">Relatório de Alta</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="prescritor_consultarproduto"><i class="mdi mdi-pill"></i><span class="nav-text">Consultar Produto</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="prescritor_fornecedores"><i class="mdi mdi-wallet-membership"></i><span class="nav-text">Fornecedores</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="prescritor_videosalta"><i class="mdi mdi-video"></i><span class="nav-text">Vídeos de Alta</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="prescritor_ferramentas"><i class="mdi mdi-cogs"></i><span class="nav-text">Ferramentas</span></a>
        </li>
    </ul>
    <?php
} 
?>