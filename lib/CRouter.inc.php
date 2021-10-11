<?php
class CRouter
{
	private $Controller;
	private $Method;
	private $ArrayParameters;
	public function __construct($url)
	{
		$Info_cmd = explode('/', $url);
		$this->ArrayParameters = array();
		foreach($Info_cmd as $StrParameter) if($StrParameter != '') $this->ArrayParameters[] = $StrParameter;
		$this->ArrayParameters[0] = isset($this->ArrayParameters[0]) ? $this->ArrayParameters[0] : 'main';
		$this->Method = 'Method_'.(isset($this->ArrayParameters[1]) ? $this->ArrayParameters[1] : 'Page_404');
		switch($this->ArrayParameters[0])
		{

			case 'invnt': $this->Controller = 'CPage'; $this->Method = 'Method_invnt_SELECT'; break;
			case 'invnt_old': $this->Controller = 'CPage'; $this->Method = 'Method_invnt_old_SELECT'; break;
			case 'web_cam': $this->Controller = 'CPage'; $this->Method = 'Method_web_cam'; break;
			case 'avalible_raw': $this->Controller = 'CPage'; $this->Method = 'Method_avalible_raw_SELECT'; break;
					case 'avalible_raw_VIEW': $this->Controller = 'CPage'; $this->Method = 'Method_avalible_raw_VIEW_SELECT'; break;
			case 'coming_raw': $this->Controller = 'CPage'; $this->Method = 'Method_coming_raw_SELECT'; break;
			case 'coming_raw_old': $this->Controller = 'CPage'; $this->Method = 'Method_coming_raw_old_SELECT'; break;
			case 'contracts': $this->Controller = 'CPage'; $this->Method = 'Method_contracts_SELECT'; break;
			case 'contracts_old': $this->Controller = 'CPage'; $this->Method = 'Method_contracts_old_SELECT'; break;
			case 'providers': $this->Controller = 'CPage'; $this->Method = 'Method_providers_SELECT'; break;
			case 'request_supply': $this->Controller = 'CPage'; $this->Method = 'Method_request_supply_SELECT'; break;
			case 'request_supply_old': $this->Controller = 'CPage'; $this->Method = 'Method_request_supply_old_SELECT'; break;
			case 'quality_of': $this->Controller = 'CPage'; $this->Method = 'Method_quality_of_SELECT'; break;
				case 'quality_of_VIEW': $this->Controller = 'CPage'; $this->Method = 'Method_quality_of_VIEW_SELECT'; break;			
			case 'param': $this->Controller = 'CPage'; $this->Method = 'Method_param_SELECT'; break;
			case 'farinograf': $this->Controller = 'CPage'; $this->Method = 'Method_farinograf_SELECT'; break;
				case 'farinograf_VIEW': $this->Controller = 'CPage'; $this->Method = 'Method_farinograf_VIEW_SELECT'; break;
			case 'farinograf_averaged': $this->Controller = 'CPage'; $this->Method = 'Method_farinograf_averaged_SELECT'; break;
				case 'farinograf_averaged_VIEW': $this->Controller = 'CPage'; $this->Method = 'Method_farinograf_averaged_VIEW_SELECT'; break;
			case 'users': $this->Controller = 'CPage'; $this->Method = 'Method_users_SELECT'; break;
			case 'offers': $this->Controller = 'CPage'; $this->Method = 'Method_offers_SELECT'; break;
			case 'main': $this->Controller = 'CPage'; $this->Method = 'Method_Index'; break;
			
			case 'neural_network': $this->Controller = 'CPage'; $this->Method = 'Method_neural_network'; break;
			case 'API_1_1': $this->Controller = 'CPage'; $this->Method = 'Method_API_1_1'; break;
			case 'API_1_2': $this->Controller = 'CPage'; $this->Method = 'Method_API_1_2'; break;
			
			default: $this->Controller = 'CPage';
		}
	}
	public function Request()
	{
		$object = new $this->Controller();
		$object->Go($this->Method, $this->ArrayParameters);
	}
}
?>