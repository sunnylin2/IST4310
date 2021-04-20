<? php
/ *
* This tutorial demonstrates examples of RESTful
* RESTful service class
* /
Class Site {

private $ sites = array (
1 => 'TaoBao',
2 => 'Google',
3 => 'w3big',
4 => 'Baidu',
5 => 'Weibo',
6 => 'Sina'

);


public function getAllSite () {
return $ this -> sites;
}

public function getSite ($ id) {

$ site = array ($ id = > ($ this -> sites [$ id]) $ this -> sites [$ id]:? $ this -> sites [1]);
return $ site;
}
}
?>
