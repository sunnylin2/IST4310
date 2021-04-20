<? php
require_once ( "SiteRestHandler.php");

$ view = "";
if (isset ($ _GET & # 91; "view" & # 93;))
$ view = $ _GET & # 91 ; "view" & # 93 ;;
/ *
* RESTful service controller
* URL mapping
* /
switch ($ view) {

case "all":
// Handle REST Url / site / list /
$ siteRestHandler = new SiteRestHandler ();
$ siteRestHandler -> getAllSites ();
break;

case "single":
// Handle REST Url / site / show / < id> /
$ siteRestHandler = new SiteRestHandler ();
$ siteRestHandler -> getSite ($ _GET [ "id"]);
break;

case "":
// 404 - not found;
break;
}
?>
