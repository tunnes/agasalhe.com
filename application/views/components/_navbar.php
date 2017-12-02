<nav>
    <!--<div class="container">-->
        <div class="nav-wrapper">
            <a href="/" class="brand-logo">
            <img src="/application/assets/img/header-logo.png"/>
            <h2>trocaqui</h2>
            </a>
            <!-- Case page be items, a session to filter will be created-->
            <?php if(isset($isItems)): ?>
            <a href="#" data-activates="slide-out" class="button-collapse trigger-sidenav right">
                <i class="material-icons account-menu-trigger">search</i>
            </a>
            <?php endif; ?>
            
            <!-- Case page be account, only sidebar menu will be shown in responsive-->
            <?php if(isset($isAccount)): ?>
            <a href="#" data-activates="slide-out" class="button-collapse trigger-sidenav left">
                <i class="material-icons account-menu-trigger">menu</i>
            </a>
            <?php else: ?>
            <a href="#" data-activates="mobile-demo" class="button-collapse left"><i class="material-icons">menu</i></a>
            <?php endif;?>
            <ul id="dropdown-menu" class="dropdown-content">
              <li><a href="/account"><i class="material-icons left">account_circle</i><?= $this->lang->line('main_nav_item_6')?></a></li>
              <li><a href="/logout"><i class="material-icons left">power_settings_new</i><?= $this->lang->line('main_nav_item_7') ?></a></li>
            </ul>
            <!-- Menu itens -->
            <ul class="right hide-on-med-and-down">
                <li><a href="/items"><?= $this->lang->line('main_nav_item_1') ?></a></li>
                <?php if($isLogged): ?>
                <li><a class="valign-wrapper dropdown-button" href="#!" data-activates="dropdown-menu"><img class="circle navbar-account-picture" src="<?= $myimage?>"/><?= $mynickname ?></a></li>
                <?php else: ?>
                <li><a href="#login-modal" class="modal-trigger"><?= $this->lang->line('main_nav_item_5') ?></a></li>
                <?php endif; ?>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <?php if($isLogged): ?>
                <li>
                    <div class="user-view">
                        <img class="circle materialboxed" src="<?= $myimage ?>"/>
                        <span class="user-infomations">
                            <span class="name black-text"><?= $myusername ?></span>
                            <span class="email black-text"><?= $mynickname ?></span>
                        </span>
                    </div>
                </li><br>
                <?php endif;?>
                <li><a href="/items"><i class="material-icons left">search</i><?= $this->lang->line('main_nav_item_1') ?></a></li>
                <?php if($isLogged): ?>
                <li><a class="valign-wrapper" href="/account"><i class="material-icons left">account_circle</i><?= $this->lang->line('main_nav_item_6')?></a></li>
                <li><a href="/logout"><i class="material-icons left">power_settings_new</i><?= $this->lang->line('main_nav_item_7') ?></a></li>
                <?php else: ?>
                <li><a href="#login-modal" class="modal-trigger"><i class="material-icons left">play_circle_outline</i><?= $this->lang->line('main_nav_item_5') ?></a></li>
                <?php endif; ?>
            </ul>
        </div>
    <!--</div>-->
</nav>
