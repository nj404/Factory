<?php
session_start();

// Базовый контроллер сайта
abstract class CBase extends CController
{
	protected $title; // заголовок страницы
	protected $content; // содержание страницы
	protected $keywords; // ключевые слова
	protected $description; // описание страницы
	protected $styles; // css стили
	protected $scripts; // скрипты страницы
	
	function __construct()
	{
		$this->description = '';
		$this->keywords = '';
		$this->styles = array('style', 'menu');
		$this->scripts = array();
	}
	
	protected function Before()
	{
		$this->title = '&laquo;Samle CMS&raquo; &bull; ';
		$this->content = '';
	}
	
	// Генерация базового шаблона
	public function Render()
	{
		if($_SESSION['DOSTYP_LEVEL'] == 10)
		{		
			echo $this->Template('lib/template/tpl_nach_sklada.inc.php', 
			array('title' => $this->title, 'content' => $this->content, 
			'description' => $this->description, 'keywords' => $this->keywords, 
			'styles' => $this->styles, 'scripts' => $this->scripts));
		}
		else if($_SESSION['DOSTYP_LEVEL'] == 15)
		{		
			echo $this->Template('lib/template/tpl_nach_zakypok.inc.php', 
			array('title' => $this->title, 'content' => $this->content, 
			'description' => $this->description, 'keywords' => $this->keywords, 
			'styles' => $this->styles, 'scripts' => $this->scripts));
		}
		else if($_SESSION['DOSTYP_LEVEL'] == 5)
		{		
			echo $this->Template('lib/template/tpl_tehnolog.inc.php', 
			array('title' => $this->title, 'content' => $this->content, 
			'description' => $this->description, 'keywords' => $this->keywords, 
			'styles' => $this->styles, 'scripts' => $this->scripts));
		}
		else if($_SESSION['DOSTYP_LEVEL'] == 4)
		{		
			echo $this->Template('lib/template/tpl_lab.inc.php', 
			array('title' => $this->title, 'content' => $this->content, 
			'description' => $this->description, 'keywords' => $this->keywords, 
			'styles' => $this->styles, 'scripts' => $this->scripts));
		}
				else if($_SESSION['DOSTYP_LEVEL'] == 3)
		{		
			echo $this->Template('lib/template/tpl_provider.inc.php', 
			array('title' => $this->title, 'content' => $this->content, 
			'description' => $this->description, 'keywords' => $this->keywords, 
			'styles' => $this->styles, 'scripts' => $this->scripts));
		}
				else if($_SESSION['DOSTYP_LEVEL'] == 100)
		{		
			echo $this->Template('lib/template/tpl_admin.inc.php', 
			array('title' => $this->title, 'content' => $this->content, 
			'description' => $this->description, 'keywords' => $this->keywords, 
			'styles' => $this->styles, 'scripts' => $this->scripts));
		}
		else
		{
			echo $this->Template('lib/template/tpl_authorization.inc.php', 
			array('title' => $this->title, 'content' => $this->content, 
			'description' => $this->description, 'keywords' => $this->keywords, 
			'styles' => $this->styles, 'scripts' => $this->scripts));
		}
	}
}
?>