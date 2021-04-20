<? php
require_once ( "SimpleRest.php");
require_once ( "Site.php");

class SiteRestHandler extends SimpleRest {

function getAllSites () {

$ site = new Site ();
$ rawData = $ site -> getAllSite ();

if (empty ($ rawData)) {
$ statusCode = 404;
$ rawData = array ( 'error' => 'No sites found!');
} Else {
$ statusCode = 200;
}

$ requestContentType = $ _SERVER [ 'HTTP_ACCEPT '];
$ this -> setHttpHeaders ($ requestContentType , $ statusCode);

if (strpos ($ requestContentType, ' application / json')! == false) {
$ response = $ this -> encodeJson ($ rawData);
echo $ response;
} Else if (strpos ($ requestContentType , 'text / html')! == False) {
$ response = $ this -> encodeHtml ($ rawData);
echo $ response;
} Else if (strpos ($ requestContentType , 'application / xml')! == False) {
$ response = $ this -> encodeXml ($ rawData);
echo $ response;
}
}

public function encodeHtml ($ responseData) {

$ htmlResponse = "<table border = '1'>";
foreach ($ responseData as $ key = > $ value) {
.. $ htmlResponse = "<tr > <td>" $ key "</ td> <td>" $ value "</ td> </ tr>"...;
}
. $ htmlResponse = "</ table >";
return $ htmlResponse;
}

public function encodeJson ($ responseData) {
$ jsonResponse = json_encode ($ responseData) ;
return $ jsonResponse;
}

public function encodeXml ($ responseData) {
// Create an object SimpleXMLElement
$ xml = new SimpleXMLElement ( '< site> </ site> <xml version = "1.0"??>');
foreach ($ responseData as $ key = > $ value) {
$ xml -> addChild ($ key , $ value);
}
return $ xml -> asXML () ;
}

public function getSite ($ id) {

$ site = new Site ();
$ rawData = $ site -> getSite ($ id);

if (empty ($ rawData)) {
$ statusCode = 404;
$ rawData = array ( 'error' => 'No sites found!');
} Else {
$ statusCode = 200;
}

$ requestContentType = $ _SERVER [ 'HTTP_ACCEPT '];
$ this -> setHttpHeaders ($ requestContentType , $ statusCode);

if (strpos ($ requestContentType, ' application / json')! == false) {
$ response = $ this -> encodeJson ($ rawData);
echo $ response;
} Else if (strpos ($ requestContentType , 'text / html')! == False) {
$ response = $ this -> encodeHtml ($ rawData);
echo $ response;
} Else if (strpos ($ requestContentType , 'application / xml')! == False) {
$ response = $ this -> encodeXml ($ rawData);
echo $ response;
}
}
}
?>
