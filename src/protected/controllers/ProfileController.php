<?php
class ProfileController extends CController
{
	/**
	 * Using layout.
	 */
	public $layout = 'adminUnauthorized';

	/**
	 * Default controller's action.
	 */
	public $defaultAction = 'login';
	
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
	 * Returns controller's avaliable actions.
	 * 
	 * @return array actions
	 */
	public function actions()
	{
		return array(
			'login' => 'application.controllers.profile.LoginAction',
			'logout' => 'application.controllers.profile.LogoutAction',
			'change_password' => 'application.controllers.profile.ChangePasswordAction',
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
		
		/*
		 * Only not authorized users can access to login action,
		 * and only authorized users to other actions. 
		 */
		if($filterChain->action->id == 'login' && !$user->isGuest) {
			$this->redirect(array('tag/list'));
		} elseif($filterChain->action->id != 'login' && $user->isGuest) {
			$this->redirect(array('login'));
		}
		
		$filterChain->run();
	}
}