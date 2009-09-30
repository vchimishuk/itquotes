<?php
class SiteController extends CController
{
	/**
	 * Using layout.
	 */
	public $layout = 'site';
	
	/**
	 * Default controller's action.
	 */
	public $defaultAction = 'list';

	/**
	 * Returns controller's avaliable actions.
	 * 
	 * @return array actions
	 */
	public function actions()
	{
		return array(
			'list' => 'application.controllers.site.ListAction',
			'quote' => 'application.controllers.site.QuoteAction',
			'tag' => 'application.controllers.site.TagAction',
		);
	}
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
		);
	}
}