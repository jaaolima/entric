<div class="nav-header">
    <div class="brand-logo">

        <a href="">
            <b><img src="assets/images/symbol.png" width="auto"></b>
            <span class="brand-title"><img src="assets/images/logo-text.png"></span>
        </a>
    </div>
</div>

<?php
// https://pictogrammers.github.io/@mdi/font/5.4.55/

if ($bruker->type == "administrador"){
    ?>
    <ul class="metismenu" id="menu">
        <li class="nav-label"></li>
        <li class="mega-menu mega-menu-lg">
            <a href=""><img src="assets/images/icones/icon-menu-home.png" border="0"><span class="nav-text">Início</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href=""><img src="assets/images/icones/icon-dashboard.png" border="0"><span class="nav-text">Dashboard</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href=""><img src="assets/images/icones/icon-financeiro.png" border="0"><span class="nav-text">Financeiro</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="prescritor_relatorioalta"><img src="assets/images/icones/icon-gerar-relatorio.png" border="0"><span class="nav-text">Relatório de Alta</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="prescritor_ferramentas"><img src="assets/images/icones/icon-ferramentas.png" border="0"><span class="nav-text">Ferramentas</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href=""><img src="assets/images/icones/icon-cadastros.png" border="0"><span class="nav-text">Cadastros</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="prescritor_consultarproduto"><img src="assets/images/icones/icon-consultar-produto.png" border="0"><span class="nav-text">Consultar Produto</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="prescritor_fornecedores"><img src="assets/images/icones/icon-fornecedores.png" border="0"><span class="nav-text">Fornecedores</span></a>
        </li>        
        <li class="mega-menu mega-menu-lg">
            <a href="prescritor_videosalta"><img src="assets/images/icones/icon-video-alta.png" border="0"><span class="nav-text">Vídeos</span></a>
        </li>
    </ul>
    <?php
}
else if ($bruker->type == "paciente"){
	?>
    <ul class="metismenu" id="menu">
        <li class="nav-label"></li>
        <li class="mega-menu mega-menu-lg">
            <a href=""><img src="assets/images/icones/icon-menu-home.png" border="0"><span class="nav-text">Início</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="paciente_relatorioalta"><img src="assets/images/icones/icon-gerar-relatorio.png" border="0"><span class="nav-text">Relatório de Alta</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="paciente_videosalta"><img src="assets/images/icones/icon-video-alta.png" border="0"><span class="nav-text">Vídeos de Alta</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="paciente_contato"><img src="assets/images/icones/icon-contato.png" border="0"><span class="nav-text">Contato</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="paciente_fornecedores"><img src="assets/images/icones/icon-fornecedores.png" border="0"><span class="nav-text">Fornecedores</span></a>
        </li>
    </ul>
	<?php
}
else if ($bruker->type == "prescritor"){
    ?>
    <ul class="metismenu" id="menu">
        <li class="nav-label"></li>
        <li class="mega-menu mega-menu-lg">
            <a href=""><img src="assets/images/icones/icon-menu-home.png" border="0"><span class="nav-text">Início</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="prescritor_relatorioalta"><img src="assets/images/icones/icon-gerar-relatorio.png" border="0"><span class="nav-text">Relatório de Alta</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="prescritor_consultarproduto"><img src="assets/images/icones/icon-consultar-produto.png" border="0"><span class="nav-text">Consultar Produto</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="prescritor_fornecedores"><img src="assets/images/icones/icon-fornecedores.png" border="0"><span class="nav-text">Fornecedores</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="prescritor_videosalta"><img src="assets/images/icones/icon-video-alta.png" border="0"><span class="nav-text">Vídeos de Alta</span></a>
        </li>
        <li class="mega-menu mega-menu-lg">
            <a href="prescritor_ferramentas"><img src="assets/images/icones/icon-ferramentas.png" border="0"><span class="nav-text">Ferramentas</span></a>
        </li>
    </ul>
    <?php
} 
?>