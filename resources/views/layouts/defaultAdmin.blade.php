<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>ROC Admin - Dashboard</title>
    <meta name="description" content="Dashboard | ROC Admin">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Your website">
    <link rel="shortcut icon" href="{{asset('/assets-admin/images/rocReadMe.png')}}">
    <link href="{{asset('/assets-admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets-admin/font-awesome/css/all.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets-admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('/assets-admin/plugins/datatables/datatables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/assets-admin/plugins/trumbowyg/ui/trumbowyg.min.css')}}">
</head>

<body class="adminbody">

@yield('contentAdmin')

</body>

</html>
