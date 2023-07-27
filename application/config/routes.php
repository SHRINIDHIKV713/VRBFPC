<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'HomeController';
$route['home'] = 'HomeController';
$route['logout'] = 'HomeController/logout';
$route['admin_dashboard'] = 'SuperadminController';
$route['accountant_dashboard'] = 'AccountantController';
$route['ceo_dashboard'] = 'CeoController';
$route['agent_dashboard'] = 'AgentController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['userEntry'] = 'SuperadminController/userEntry';

//FPO
$route['fpoEntry'] = 'SuperadminController/fpoEntry';
$route['fpoManage'] = 'SuperadminController/fpoManage';
$route['fpoEdit'] = 'SuperadminController/fpoEdit';

$route['promoManage'] = 'SuperadminController/promoManage';
$route['shareholdersManage'] = 'SuperadminController/shareholdersManage';
$route['bdManage'] = 'SuperadminController/bdManage';
$route['agentManage'] = 'SuperadminController/agentManage';
$route['ipcatalogManage'] = 'SuperadminController/ipcatalogManage';
$route['ipindentManage'] = 'SuperadminController/ipindentManage';
$route['ippurchaseManage'] = 'SuperadminController/ippurchaseManage';
$route['iptransferManage'] = 'SuperadminController/iptransferManage';
$route['ipsalesManage'] = 'SuperadminController/ipsalesManage';
$route['ipreturnManage'] = 'SuperadminController/ipreturnManage';
$route['opcatalogManage'] = 'SuperadminController/opcatalogManage';
$route['oppurchaseManage'] = 'SuperadminController/oppurchaseManage';
$route['opsalesManage'] = 'SuperadminController/opsalesManage';
$route['opreturnManage'] = 'SuperadminController/opreturnManage';

//USER ENTRY CEO
$route['userentry'] = 'CeoController/userentry';
$route['fpomanage'] = 'CeoController/fpomanage';


//SHAREHOLDERS CEO
$route['shareholderentry'] = 'CeoController/shareholderentry';
$route['shareholdersmanage'] = 'CeoController/shareholdersmanage';
$route['shareholderedit'] = 'CeoController/shareholderedit';


//PROMOTERS CEO
$route['promoentry'] = 'CeoController/promoentry';
$route['promomanage'] = 'CeoController/promomanage';
$route['promoedit'] = 'CeoController/promoedit';


//Board of Directors CEO
$route['bdentry'] = 'CeoController/bdentry';
$route['bdmanage'] = 'CeoController/bdmanage';
$route['bdedit'] = 'CeoController/bdedit';

//Agent CEO
$route['agententry'] = 'CeoController/agententry';
$route['agentmanage'] = 'CeoController/agentmanage';
$route['agentedit'] = 'CeoController/agentedit';

//Input Catalog CEO
$route['ipcatalogentry'] = 'CeoController/ipcatalogentry';
$route['ipcatalogmanage'] = 'CeoController/ipcatalogmanage';
$route['ipcatalogedit'] = 'CeoController/ipcatalogedit';

//Input Indent CEO
$route['ipindententry'] = 'CeoController/ipindententry';
$route['ipindentmanage'] = 'CeoController/ipindentmanage';
$route['ipindentedit'] = 'CeoController/ipindentedit';


//Input Purchase CEO
$route['ippurchaseentry'] = 'CeoController/ippurchaseentry';
$route['ippurchasemanage'] = 'CeoController/ippurchasemanage';
$route['ippurchaseedit'] = 'CeoController/ippurchaseedit';

//Input Transfer CEO
$route['iptransferentry'] = 'CeoController/iptransferentry';
$route['iptransfermanage'] = 'CeoController/iptransfermanage';
$route['iptransferedit'] = 'CeoController/iptransferedit';

//Input Sales CEO
$route['ipsalesentry'] = 'CeoController/ipsalesentry';
$route['ipsalesmanage'] = 'CeoController/ipsalesmanage';
$route['ipsalesedit'] = 'CeoController/ipsalesedit';

//Input Return CEO
$route['ipreturnentry'] = 'CeoController/ipreturnentry';
$route['ipreturnmanage'] = 'CeoController/ipreturnmanage';
$route['ipreturnedit'] = 'CeoController/ipreturnedit';

//Output Catalog CEO
$route['opcatalogentry'] = 'CeoController/opcatalogentry';
$route['opcatalogmanage'] = 'CeoController/opcatalogmanage';
$route['opcatalogedit'] = 'CeoController/opcatalogedit';

//Output Purchase CEO
$route['oppurchaseentry'] = 'CeoController/oppurchaseentry';
$route['oppurchasemanage'] = 'CeoController/oppurchasemanage';
$route['oppurchaseedit'] = 'CeoController/oppurchaseedit';

//Output Sales CEO
$route['opsalesentry'] = 'CeoController/opsalesentry';
$route['opsalesmanage'] = 'CeoController/opsalesmanage';
$route['opsalesedit'] = 'CeoController/opsalesedit';

//Output Return CEO
$route['opreturnentry'] = 'CeoController/opreturnentry';
$route['opreturnmanage'] = 'CeoController/opreturnmanage';
$route['opreturnedit'] = 'CeoController/opreturnedit';