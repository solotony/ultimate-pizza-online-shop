<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        .cart_status { background-color:#FCC; border:solid 1px #000; padding:5px; margin-top:5px;margin-bottom:5px; }
        .cart-table { border-top: solid 1px #777; border-right: solid 1px #777;  border-spacing: 0; border-collapse: collapse; margin-top:5px; margin-bottom:5px;}
        .cart-table th, .cart-table td { border-bottom: solid 1px #777; border-left: solid 1px #777; padding:4px; }
        .cart-table__total { background-color: #ccc; }
    </style>

</head>
    <body>
        <div id="app">
            <header>
                <h1>@yield('title')</h1>
                <nav>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/1/">Pizza</a></li>
                        <li><a href="/3/">Pie</a></li>
                        <li><a href="/2/">Drinks</a></li>
                        @if(Auth::check())
                            <li><a href="/home/">Cabinet</a></li>
                            <li><a href="#" onclick="forms.logout.submit()">Logout</a></li>
                            <form id="logout" name="logout" method="post" action="{{route('logout')}}">@csrf</form>
                        @endif
                    </ul>
                </nav>

                <div class="order_status">
                    <form action="{{route('show_order')}}" method="post" id="show_order_form">@csrf
                        <label for="order_id">Order ID</label><input name="order_id" id="order_id">
                        <button>show</button>
                    </form>
                </div>

                @if(!Auth::check())
                <div class="login_form">
                    <form action="{{route('login')}}" method="post" id="login_form">@csrf
                        <label for="email">E-mail</label><input name="email" id="email">
                        <label for="password"> Password</label><input name="password" id="password">
                        <button>login</button>
                    </form>
                </div>
                @endif

                <div class="currencies">
                    <form action="{{route('set_currency')}}" method="post" id="currency_form">
                        @csrf
                        Currency:
                        <select name="currency" onchange="forms.currency_form.submit()">
                            @foreach($currencies as $currency)
                                <option value="{{$currency->id}}" @if($sel_currency_id==$currency->id) selected @endif>
                                    {{$currency->name}}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <cart-status></cart-status>
            </header>

            <section class="content">
                @yield('content')
            </section>

            <footer></footer>
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>
