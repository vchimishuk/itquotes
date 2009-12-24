<?php
class AuthorController extends CController
{
	/**
	 * Using layout.
	 */
	public $layout = 'admin';
	
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
			'list' => 'application.controllers.author.ListAction',
			'edit' => 'application.controllers.author.EditAction',
			'delete' => 'application.controllers.author.DeleteAction',
		);
	}
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	/**
	 * User permissions filter.
	 * 
	 * @param CFilterChain $filterChain
	 */	
	public function filterAccessControl($filterChain)
	{
		$user = Yii::app()->user;

		if($user->isGuest)
			$this->redirect(array('profile/login'));
		else
			$filterChain->run();
	}
}