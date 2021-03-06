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
			'search' => 'application.controllers.site.SearchAction',
			'quote' => 'application.controllers.site.QuoteAction',
			'random' => 'application.controllers.site.RandomAction',
			'tag' => 'application.controllers.site.TagAction',
			'author' => 'application.controllers.site.AuthorAction',
			'add' => 'application.controllers.site.AddAction',
			'addThanks' => 'application.controllers.site.AddThanksAction',
			'about' => 'application.controllers.site.AboutAction',
			'rss' => 'application.controllers.site.RssAction',
			'captcha' => array('class'=>'CCaptchaAction'),
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