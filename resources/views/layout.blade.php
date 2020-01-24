<html>
<head>
    <title>@yield('title')</title>
    <style>
        header { max-width: 1000px; margin-left:auto; margin-right:auto; }
        footer { max-width: 1000px; margin-left:auto; margin-right:auto; }
        .content { max-width: 1000px; margin-left:auto; margin-right:auto; }
        .categories { display:flex; margin:10px; padding:20px; border:solid 1px #000; }
        .categories__item { flex:1; width:250px; height:250px; background-color: #ccc; margin:10px; padding:20px; border:solid 1px #000; }
        .menutable { padding:20px; border:solid 1px #000; background-color:#ccc; }
        .menutable__subcategory { padding:20px; margin:10px; border:solid 1px #000; background-color:#fff;   }
        .menutable__container { display: flex; flex-wrap: wrap; }
        .menutable__item { flex:1; margin:10px; padding:10px; min-width:150px; max-width:150px;  width:150px; height:150px; border: 2px solid #ac0; background-color:#7a0; color:#fff;   }
        .menutable__item a { color:#fff; }
    </style>

</head>
    <body>
        <header>
            <h1>@yield('title')</h1>
        </header>

        <section class="content">
            @yield('content')
        </section>

        <footer></footer>
    </body>
</html>
