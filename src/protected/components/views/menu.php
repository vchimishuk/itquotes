<ul id="main">
  <li <?=($this->controller->action->id == 'list' ? 'class="current_page_item"' : '')?>><a href="<?=$this->controller->createAbsoluteUrl('list')?>">Цитаты</a></li>
  <li <?=($this->controller->action->id == 'search' ? 'class="current_page_item"' : '')?>><a href="<?=$this->controller->createAbsoluteUrl('search')?>">Поиск</a></li>
  <li <?=($this->controller->action->id == 'random' ? 'class="current_page_item"' : '')?>><a href="<?=$this->controller->createAbsoluteUrl('random')?>">Случайная цитата</a></li>
  <li <?=($this->controller->action->id == 'add' ? 'class="current_page_item"' : '')?>><a href="<?=$this->controller->createAbsoluteUrl('add')?>">Добавить</a></li>
  <li <?=($this->controller->action->id == 'about' ? 'class="current_page_item"' : '')?>><a href="<?=$this->controller->createAbsoluteUrl('about')?>">О проекте</a></li>
  <li <?=($this->controller->action->id == 'rss' ? 'class="current_page_item"' : '')?>><a href="<?=$this->controller->createAbsoluteUrl('rss')?>">RSS</a></li>
</ul>
