<?=Yii::app()->clientScript->registerScriptFile(
	Yii::app()->request->baseUrl . '/static/js/site/email.js',
	CClientScript::POS_HEAD
)?>

<? Yii::app()->clientScript->registerScript(
	'aboutEncodeEmail',
	'$("#authorEmail").text(decodeEmail("ha[UW2daaf gS"));',
	CClientScript::POS_READY
); ?>


<h3>About page</h3>

Этот сайт задумывался для организации коллекции цитат великих (и не очень) деятелей IT-сферы, в одном месте и виде удобном для просмотра. Если Вы также любите узнать точку зрения гуру IT-мира на интересующую Вас тему, то предлагаю присоединится к проекту. Вы также можете влиять на его развитие, а именно путем <?=CHtml::link('добавления', array('add'))?> цитат, которые будут опубликованы после модерации, в добавлении перевода на английский/русский язык, указании автора, или просто советами по улучшению ресурса. Для этих целей вы можете использовать как форму добавления цитат, так и email-адрес автора проeкта. Также прошу сообщать об ошибках, неточностях или повторах в уже имеющихся цитатах. 
<br /><br />

Автор проекта: Вячеслав Чимишук &lt;<span id="authorEmail"></span>&gt; (email и jabber).<br /> 
<br />
Исходный код проекта можно найти <?=CHtml::link('здесь', 'http://repository.org/...')?>.
