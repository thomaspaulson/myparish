<!DOCTYPE html>
<head>
	<% base_tag %>
	<title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; My Survey</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	$MetaTags(false)

	<style>
	h3 { font-family: "Helvetica Neue",Helvetica,Roboto,Arial,sans-serif }
	table { border-collapse: collapse; font-family: Arial, sans-serif; color: #333; font-size: 12pt; }
	table th { border-bottom: 2px solid #333; padding: 5px 10px; font-weight: bold; text-align: left; }
	table th:first-child { padding-left: 0px; }
	table td { border-top: 1px solid #aaa; border-bottom: 1px solid #aaa; text-align: left; padding: 5px 10px; }
	table td:first-child { padding-left: 0px; }
    @media print {
        .footer {page-break-after: always;}
    }
	</style>
</head>
<body onload="window.print();">

<h3>My Parish</h3>
<% if $Title %><h5>$Title</h5><% end_if %> 
		$Layout

<p>
    Printed at $Now.Nice<br>
	Printed at $Member.Name
    <br />
</p>

</body>
</html>
