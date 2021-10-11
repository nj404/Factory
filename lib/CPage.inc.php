<?php
// Контроллер страниц сайта
class CPage extends CBase
{
	public function __construct(){ parent::__construct(); }
	public function Before(){ parent::Before(); }
	
	public function Method_Index()
	{
		$template = 'tpl_content';
		$this->title .= 'Головна';
//		$this->keywords .= '';
//		$this->description .= '';
		$html = '<br /><br /><br /><strong>Вітаємо на головній сторінці!</strong><br /><br /><br /></html>';
		$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'Головна', 'content' => $html));
	}
	
		public function Method_invnt_SELECT()
	{
		$template = 'tpl_content_invnt';
		$this->title .= 'Інвентаризація';
		$this->styles[] = 'themes/blue/style';
		$this->styles[] = 'jquery.tablesorter.pager';
		$this->scripts[] = 'jquery';
		$this->scripts[] = 'jquery-latest';
		$this->scripts[] = 'jquery.tablesorter.min';
		$this->scripts[] = 'jquery.tablesorter.pager.min';		
		$db = CMySQL::Instance();
		$res = $db->Select("SELECT * FROM invnt");
		$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'Інвентаризація', 'content' => $res));
	}
	
		public function Method_invnt_old_SELECT()
	{
		$template = 'tpl_content_invnt_old';
		$this->title .= 'Архів інвентаризації';
		$this->styles[] = 'themes/blue/style';
		$this->styles[] = 'jquery.tablesorter.pager';
		$this->scripts[] = 'jquery';
		$this->scripts[] = 'jquery-latest';
		$this->scripts[] = 'jquery.tablesorter.min';
		$this->scripts[] = 'jquery.tablesorter.pager.min';		
		$db = CMySQL::Instance();
		$res = $db->Select("SELECT * FROM invnt_old");
		$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'Архів інвентаризації', 'content' => $res));
	}
	
		public function Method_web_cam()
	{
		$template = 'tpl_content_web_cam';
		$this->title .= 'Відео нагляд';
		$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'Відео нагляд', 'content' => $res));
	}
	
	public function Method_avalible_raw_SELECT()
	{
		$template = 'tpl_content_avalible_raw';
		$this->title .= 'Доступна сировина';
		$this->styles[] = 'themes/blue/style';
		$this->styles[] = 'jquery.tablesorter.pager';
		$this->scripts[] = 'jquery';
		$this->scripts[] = 'jquery-latest';
		$this->scripts[] = 'jquery.tablesorter.min';
		$this->scripts[] = 'jquery.tablesorter.pager.min';		
		$db = CMySQL::Instance();
		$res = $db->Select("SELECT * FROM avalible_raw");
		$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'Доступна сировина', 'content' => $res));
	}
	
						public function Method_avalible_raw_VIEW_SELECT()
					{
						$template = 'tpl_content_avalible_raw_VIEW';
						$this->title .= 'Доступна сировина';
						$this->styles[] = 'themes/blue/style';
						$this->styles[] = 'jquery.tablesorter.pager';
						$this->scripts[] = 'jquery';
						$this->scripts[] = 'jquery-latest';
						$this->scripts[] = 'jquery.tablesorter.min';
						$this->scripts[] = 'jquery.tablesorter.pager.min';		
						$db = CMySQL::Instance();
						$res = $db->Select("SELECT * FROM avalible_raw");
						$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'Доступна сировина', 'content' => $res));
					}
	
	public function Method_coming_raw_SELECT()
	{
		$template = 'tpl_content_coming_raw';
		$this->title .= 'Прихід сировини';
		$this->styles[] = 'themes/blue/style';
		$this->styles[] = 'jquery.tablesorter.pager';
		$this->scripts[] = 'jquery';
		$this->scripts[] = 'jquery-latest';
		$this->scripts[] = 'jquery.tablesorter.min';
		$this->scripts[] = 'jquery.tablesorter.pager.min';		
		$db = CMySQL::Instance();
		$res = $db->Select("SELECT * FROM coming_raw");
		$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'Прихід сировини', 'content' => $res));
	}
	
		public function Method_coming_raw_old_SELECT()
	{
		$template = 'tpl_content_coming_raw_old';
		$this->title .= 'Архів приходу сировини';
		$this->styles[] = 'themes/blue/style';
		$this->styles[] = 'jquery.tablesorter.pager';
		$this->scripts[] = 'jquery';
		$this->scripts[] = 'jquery-latest';
		$this->scripts[] = 'jquery.tablesorter.min';
		$this->scripts[] = 'jquery.tablesorter.pager.min';		
		$db = CMySQL::Instance();
		$res = $db->Select("SELECT * FROM coming_raw_old");
		$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'Архів приходу сировини', 'content' => $res));
	}
	
	public function Method_contracts_SELECT()
	{
		$template = 'tpl_content_contracts';
		$this->title .= 'Договори';
		$this->styles[] = 'themes/blue/style';
		$this->styles[] = 'jquery.tablesorter.pager';
		$this->scripts[] = 'jquery';
		$this->scripts[] = 'jquery-latest';
		$this->scripts[] = 'jquery.tablesorter.min';
		$this->scripts[] = 'jquery.tablesorter.pager.min';		
		$db = CMySQL::Instance();
		$res = $db->Select("SELECT * FROM contracts");
		$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'Договори', 'content' => $res));
	}
	
	public function Method_contracts_old_SELECT()
	{
		$template = 'tpl_content_contracts_old';
		$this->title .= 'Архів договорів';
		$this->styles[] = 'themes/blue/style';
		$this->styles[] = 'jquery.tablesorter.pager';
		$this->scripts[] = 'jquery';
		$this->scripts[] = 'jquery-latest';
		$this->scripts[] = 'jquery.tablesorter.min';
		$this->scripts[] = 'jquery.tablesorter.pager.min';		
		$db = CMySQL::Instance();
		$res = $db->Select("SELECT * FROM contracts_old");
		$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'Архів договорів', 'content' => $res));
	}
	
	public function Method_providers_SELECT()
	{
		$template = 'tpl_content_providers';
		$this->title .= 'Поставники';
		$this->styles[] = 'themes/blue/style';
		$this->styles[] = 'jquery.tablesorter.pager';
		$this->scripts[] = 'jquery';
		$this->scripts[] = 'jquery-latest';
		$this->scripts[] = 'jquery.tablesorter.min';
		$this->scripts[] = 'jquery.tablesorter.pager.min';		
		$db = CMySQL::Instance();
		$res = $db->Select("SELECT * FROM providers");
		$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'Поставники', 'content' => $res));
	}
	
	public function Method_request_supply_SELECT()
	{
		$template = 'tpl_content_request_supply';
		$this->title .= 'Заявки на поставку сировини';
		$this->styles[] = 'themes/blue/style';
		$this->styles[] = 'jquery.tablesorter.pager';
		$this->scripts[] = 'jquery';
		$this->scripts[] = 'jquery-latest';
		$this->scripts[] = 'jquery.tablesorter.min';
		$this->scripts[] = 'jquery.tablesorter.pager.min';		
		$db = CMySQL::Instance();
		$res = $db->Select("SELECT * FROM request_supply");
		$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'Заявки на поставку сировини', 'content' => $res));
	}
	
		public function Method_request_supply_old_SELECT()
	{
		$template = 'tpl_content_request_supply_old';
		$this->title .= 'Архів заявок';
		$this->styles[] = 'themes/blue/style';
		$this->styles[] = 'jquery.tablesorter.pager';
		$this->scripts[] = 'jquery';
		$this->scripts[] = 'jquery-latest';
		$this->scripts[] = 'jquery.tablesorter.min';
		$this->scripts[] = 'jquery.tablesorter.pager.min';		
		$db = CMySQL::Instance();
		$res = $db->Select("SELECT * FROM request_supply_old");
		$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'Архів заявок', 'content' => $res));
	}
	
		public function Method_quality_of_SELECT()
	{
		$template = 'tpl_content_quality_of';
		$this->title .= 'Якісні показники борошна';
		$this->styles[] = 'themes/blue/style';
		$this->styles[] = 'jquery.tablesorter.pager';
		$this->scripts[] = 'jquery';
		$this->scripts[] = 'jquery-latest';
		$this->scripts[] = 'jquery.tablesorter.min';
		$this->scripts[] = 'jquery.tablesorter.pager.min';		
		$db = CMySQL::Instance();
		$res = $db->Select("SELECT * FROM quality_of_flour");
		$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'Якісні показники борошна', 'content' => $res));
	}
	
						
						public function Method_quality_of_VIEW_SELECT()
					{
						$template = 'tpl_content_quality_of_VIEW';
						$this->title .= 'Якісні показники борошна';
						$this->styles[] = 'themes/blue/style';
						$this->styles[] = 'jquery.tablesorter.pager';
						$this->scripts[] = 'jquery';
						$this->scripts[] = 'jquery-latest';
						$this->scripts[] = 'jquery.tablesorter.min';
						$this->scripts[] = 'jquery.tablesorter.pager.min';		
						$db = CMySQL::Instance();
						$res = $db->Select("SELECT * FROM quality_of_flour");
						$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'Якісні показники борошна', 'content' => $res));
					}
	
	
	public function Method_param_SELECT()
	{
		$template = 'tpl_content_param';
		$this->title .= 'ТЕ парам.';
		$this->styles[] = 'themes/blue/style';
		$this->styles[] = 'jquery.tablesorter.pager';
		$this->scripts[] = 'jquery';
		$this->scripts[] = 'jquery-latest';
		$this->scripts[] = 'jquery.tablesorter.min';
		$this->scripts[] = 'jquery.tablesorter.pager.min';		
		$db = CMySQL::Instance();
		$res = $db->Select("SELECT * FROM data");
		$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'ТЕ парам.', 'content' => $res));
	}
	
		public function Method_farinograf_SELECT()
	{
		$template = 'tpl_content_farinograf';
		$this->title .= 'Фаринограмма';
		$this->styles[] = 'themes/blue/style';
		$this->styles[] = 'jquery.tablesorter.pager';
		$this->scripts[] = 'jquery';
		$this->scripts[] = 'jquery-latest';
		$this->scripts[] = 'jquery.tablesorter.min';
		$this->scripts[] = 'jquery.tablesorter.pager.min';		
		$db = CMySQL::Instance();
		$res = $db->Select("SELECT * FROM farinograf");
		$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'Фаринограмма', 'content' => $res));
	}
						
								public function Method_farinograf_VIEW_SELECT()
						{
							$template = 'tpl_content_farinograf_VIEW';
							$this->title .= 'Фаринограма';
							$this->styles[] = 'themes/blue/style';
							$this->styles[] = 'jquery.tablesorter.pager';
							$this->scripts[] = 'jquery';
							$this->scripts[] = 'jquery-latest';
							$this->scripts[] = 'jquery.tablesorter.min';
							$this->scripts[] = 'jquery.tablesorter.pager.min';		
							$db = CMySQL::Instance();
							$res = $db->Select("SELECT * FROM farinograf");
							$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'Фаринограма', 'content' => $res));
						}
			public function Method_farinograf_averaged_SELECT()
	{
		$template = 'tpl_content_farinograf_averaged';
		$this->title .= 'Обробка фаринограми';
		$this->styles[] = 'themes/blue/style';
		$this->styles[] = 'jquery.tablesorter.pager';
		$this->scripts[] = 'jquery';
		$this->scripts[] = 'jquery-latest';
		$this->scripts[] = 'jquery.tablesorter.min';
		$this->scripts[] = 'jquery.tablesorter.pager.min';		
		$db = CMySQL::Instance();
		$res = $db->Select("SELECT * FROM farinograf_averaged");
		$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'Обробка фаринограми', 'content' => $res));
	}
	
						
								public function Method_farinograf_averaged_VIEW_SELECT()
						{
							$template = 'tpl_content_farinograf_averaged_VIEW';
							$this->title .= 'Обробка фаринограми';
							$this->styles[] = 'themes/blue/style';
							$this->styles[] = 'jquery.tablesorter.pager';
							$this->scripts[] = 'jquery';
							$this->scripts[] = 'jquery-latest';
							$this->scripts[] = 'jquery.tablesorter.min';
							$this->scripts[] = 'jquery.tablesorter.pager.min';		
							$db = CMySQL::Instance();
							$res = $db->Select("SELECT * FROM farinograf_averaged");
							$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'Обробка фаринограми', 'content' => $res));
						}
			public function Method_users_SELECT()
	{
		$template = 'tpl_content_users';
		$this->title .= 'Користувачі';
		$this->styles[] = 'themes/blue/style';
		$this->styles[] = 'jquery.tablesorter.pager';
		$this->scripts[] = 'jquery';
		$this->scripts[] = 'jquery-latest';
		$this->scripts[] = 'jquery.tablesorter.min';
		$this->scripts[] = 'jquery.tablesorter.pager.min';		
		$db = CMySQL::Instance();
		$res = $db->Select("SELECT * FROM users");
		$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'Користувачі', 'content' => $res));
	}
	
				public function Method_offers_SELECT()
	{
		$template = 'tpl_content_offers';
		$this->title .= 'Пропозиції від поставників';
		$this->styles[] = 'themes/blue/style';
		$this->styles[] = 'jquery.tablesorter.pager';
		$this->scripts[] = 'jquery';
		$this->scripts[] = 'jquery-latest';
		$this->scripts[] = 'jquery.tablesorter.min';
		$this->scripts[] = 'jquery.tablesorter.pager.min';		
		$db = CMySQL::Instance();
		$res = $db->Select("SELECT * FROM offers");
		$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'Пропозиції', 'content' => $res));
	}
	
//нейнонная сеть!!!!!!!
			public function Method_neural_network()
	{
		
		$template = 'tpl_content_neural_network';
		$this->title .= 'Нейронна мережа';
		$this->styles[] = 'themes/blue/style';
		$this->styles[] = 'jquery.tablesorter.pager';
		$this->scripts[] = 'jquery';
		$this->scripts[] = 'jquery-latest';
		$this->scripts[] = 'jquery.tablesorter.min';
		$this->scripts[] = 'jquery.tablesorter.pager.min';		
		$db = CMySQL::Instance();
		$res = $db->Select("SELECT * FROM mixing_programs");
		$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'Нейронна мережа', 'content' => $res));
	}

//прогнозирование (API) --1--!
///////////////////////////////////////
			public function Method_API_1_1()
	{
		
		$template = 'tpl_content_API_1_1';
		$this->title .= 'API прогнозування продажів';
		$this->styles[] = 'themes/blue/style';
		$this->styles[] = 'jquery.tablesorter.pager';
		$this->scripts[] = 'jquery';
		$this->scripts[] = 'jquery-latest';
		$this->scripts[] = 'jquery.tablesorter.min';
		$this->scripts[] = 'jquery.tablesorter.pager.min';		
		$db = CMySQL::Instance();
		$res = $db->Select("SELECT * FROM sales");
		$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'API прогнозування продажів', 'content' => $res));
	}
///////////////////////////////////////

//прогнозирование (API) --2--!
///////////////////////////////////////
			public function Method_API_1_2()
	{
		
		$template = 'tpl_content_API_1_2';
		$this->title .= 'API прогнозування продажів';
		$this->styles[] = 'themes/blue/style';
		$this->styles[] = 'jquery.tablesorter.pager';
		$this->scripts[] = 'jquery';
		$this->scripts[] = 'jquery-latest';
		$this->scripts[] = 'jquery.tablesorter.min';
		$this->scripts[] = 'jquery.tablesorter.pager.min';		
		$db = CMySQL::Instance();
		$res = $db->Select("SELECT * FROM sales");
		$this->content = $this->Template('lib/template/'.$template.'.inc.php', array('name_page' => 'API прогнозування продажів', 'content' => $res));
	}
///////////////////////////////////////


//продажи!
///////////////////////////////////////
///////////////////////////////////////
///////////////////////////////////////

	
	public function Method_Page_404()
	{
		$StrTitle = 'Сторінка не існує, або Ви ввели не правильну адресу!';
		$this->title .= 'Error 404';
		$this->content = $this->Template('lib/template/tpl_404.inc.php', array('message' => $StrTitle));
	}
}