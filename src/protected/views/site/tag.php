<h3>Quotes list for "<?=$tag->name?>" tag.</h3>

<?=$this->renderPartial('_list', array(
  'quotes' => $quotes,
  'pages' => $pages,
))?>
