<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <title>
        Horse Simulator 2015 (R) Home Premium Edition ## RESTRICTED ALPHA
    </title>
    <meta name="description" content="The world's premiere horse simulation experience.">
    <script type="text/javascript">
        @if(Auth::check())
            var INIT_USER = {{{ json_encode(Auth::user()) }}};
            var INIT_HORSES = {{ json_encode(Horse::with('user')->get()) }};
        @else
            var INIT_USER = null;
            var INIT_HORSES = null;
        @endif
    </script>
    {{ HTML::script('js/vendor.js'); }}
    {{ HTML::script('js/templates.js'); }}
    {{ HTML::script('js/horse.js'); }}
    {{ HTML::style('css/style.css'); }}
</head>
<body>
    <section id="top">
        <span class="logo">
            Horse Simulator
            <span class="logo-year">2015</span>
            <span class="logo-beta">(beta)</span>
        </span>
        <span class="logout">
            <span class="logout">Log Out</span>
        </span>
    </section>
    <section id="content">
    </section>
</body>
</html>