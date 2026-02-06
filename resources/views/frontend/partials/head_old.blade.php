<!DOCTYPE html>
<html lang="zxx">
        
<head>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <meta name="title" content="{{ getInfo('seo_title') }}">
        <meta name="description" content="{{ getInfo('seo_description') }}">
        <meta name="keywords" content="{{ getInfo('keyword') }}">
        <meta name="google-site-verification" content="WjDFG88i1pWsb2It4rUeF0xIcaUa209W8htJfk8lWx0" />
        <link rel="canonical" href="https://www.penciledu.com/"/>
        <meta name="author" content="">
        <!-- Favicon and touch Icons -->
        <link href="{{ getImage('settings',getInfo('favicon'))}}" rel="shortcut icon" type="image/png">
        <link href="assets/img/apple-touch-icon.html" rel="apple-touch-icon">
        <link href="assets/img/apple-touch-icon-72x72.html" rel="apple-touch-icon" sizes="72x72">
        <link href="assets/img/apple-touch-icon-114x114.html" rel="apple-touch-icon" sizes="114x114">
        <link href="assets/img/apple-touch-icon-144x144.html" rel="apple-touch-icon" sizes="144x144">

        <!-- Page Title -->
        <title>@yield('title', getInfo('name'))</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <!-- Styles Include -->
        <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/main.css') }}">
        
</head>